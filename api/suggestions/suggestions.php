<?php
require_once __DIR__ . '/../../database/db_connections.php';  

// ── Fetch suggestions ──────────────────────────────────────
 $suggestions     = [];
 $filteredCount   = 0;
 $totalCount      = 0;
 $activeFilter    = 'all';
 $activeSearch    = '';

try {
    $db = getDB();

    // Total count
    $totalStmt = $db->query("SELECT COUNT(*) FROM suggestions");
    $totalCount = (int) $totalStmt->fetchColumn();

    // Build dynamic query
    $where  = [];
    $params = [];

    // Category filter
    if (isset($_GET['filter']) && in_array($_GET['filter'], ['ui', 'feature', 'bug', 'general'], true)) {
        $activeFilter = $_GET['filter'];
        $where[]      = 'category = :category';
        $params[':category'] = $activeFilter;
    }

    // Search filter
    if (isset($_GET['search']) && trim($_GET['search']) !== '') {
        $activeSearch         = trim($_GET['search']);
        $where[]              = '(message LIKE :search OR name LIKE :search2)';
        $params[':search']    = '%' . $activeSearch . '%';
        $params[':search2']   = '%' . $activeSearch . '%';
    }

    $whereSQL = !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';

    // Filtered count
    $countSQL = "SELECT COUNT(*) FROM suggestions {$whereSQL}";
    $countStmt = $db->prepare($countSQL);
    $countStmt->execute($params);
    $filteredCount = (int) $countStmt->fetchColumn();

    // Fetch rows
    $sql  = "SELECT * FROM suggestions {$whereSQL} ORDER BY created_at DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    $suggestions = $stmt->fetchAll();

} catch (PDOException $e) {
    error_log("Suggestions Fetch Error: " . $e->getMessage());
    $dbError = true;
}

// ── Category label map ─────────────────────────────────────
 $categoryLabels = [
    'ui'      => 'UI / Design',
    'feature' => 'Feature Suggestion',
    'bug'     => 'Bug Report',
    'general' => 'General Comment',
];

 $categoryColors = [
    'ui'      => ['#8b5cf6', '#a78bfa'],
    'feature' => ['#f59e0b', '#fbbf24'],
    'bug'     => ['#ef4444', '#f87171'],
    'general' => ['#10b981', '#34d399'],
];
function getTimeAgo(string $datetime): string
{
    $now  = new DateTime();
    $past = new DateTime($datetime);
    $diff = $now->diff($past);

    if ($diff->y > 0) return $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
    if ($diff->m > 0) return $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
    if ($diff->d > 0) return $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
    if ($diff->h > 0) return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
    if ($diff->i > 0) return $diff->i . ' min' . ($diff->i > 1 ? 's' : '') . ' ago';
    return 'Just now';
}

// ── Helper: Category Icon ──────────────────────────────────
function getCategoryIcon(string $category): string
{
    return match ($category) {
        'ui'      => 'palette',
        'feature' => 'lightbulb',
        'bug'     => 'bug',
        'general' => 'comment',
        default   => 'circle',
    };
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/suggestions.css">
    <title>All Suggestions | Justin Plaatjies Portfolio</title>
    
</head>
<body>

    <!-- ========== TOP NAV BAR ========== -->
    <header class="top-bar">
        <div class="top-bar-inner">
            <a href="/index.php" class="back-link">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Portfolio</span>
            </a>
            <a href="/index.php" class="top-logo">JP</a>
        </div>
    </header>

    <main class="suggestions-main">

        <!-- ========== PAGE HEADER ========== -->
        <div class="page-header">
            <h1>All <span>Suggestions</span></h1>
            <p>A complete view of all feedback and suggestions submitted through the project pages.</p>
        </div>

        <!-- ========== STATS BAR ========== -->
        <div class="stats-bar">
            <div class="stat-chip">
                <i class="fas fa-inbox"></i>
                <span>Total:</span>
                <span class="stat-num"><?= number_format($totalCount) ?></span>
            </div>
            <?php foreach ($categoryLabels as $key => $label): ?>
                <?php
                    try {
                        $cStmt = $db->prepare("SELECT COUNT(*) FROM suggestions WHERE category = :c");
                        $cStmt->execute([':c' => $key]);
                        $cCount = (int) $cStmt->fetchColumn();
                    } catch (Exception $e) { $cCount = 0; }
                ?>
                <?php if ($cCount > 0): ?>
                    <div class="stat-chip">
                        <i class="fas fa-circle" style="color: <?= $categoryColors[$key][0] ?>; font-size: 0.5rem;"></i>
                        <span><?= $label ?>:</span>
                        <span class="stat-num"><?= number_format($cCount) ?></span>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if ($activeFilter !== 'all' || $activeSearch !== ''): ?>
                <div class="stat-chip" style="border-color: var(--yellow); color: var(--yellow);">
                    <i class="fas fa-filter"></i>
                    <span>Showing:</span>
                    <span class="stat-num"><?= number_format($filteredCount) ?></span>
                </div>
            <?php endif; ?>
        </div>

        <!-- ========== CONTROLS ========== -->
        <div class="controls-row">
            <form class="search-box" method="GET" action="">
                <i class="fas fa-search"></i>
                <input
                    type="text"
                    name="search"
                    placeholder="Search by name or message..."
                    value="<?= htmlspecialchars($activeSearch, ENT_QUOTES, 'UTF-8') ?>"
                    aria-label="Search suggestions"
                >
                <?php if ($activeFilter !== 'all'): ?>
                    <input type="hidden" name="filter" value="<?= htmlspecialchars($activeFilter) ?>">
                <?php endif; ?>
            </form>

            <div class="filter-pills">
                <a href="?<?= $activeSearch ? 'search=' . urlencode($activeSearch) . '&' : '' ?>" class="filter-pill <?= $activeFilter === 'all' ? 'active' : '' ?>">
                    All
                </a>
                <?php foreach ($categoryLabels as $key => $label): ?>
                    <a href="?filter=<?= $key ?><?= $activeSearch ? '&search=' . urlencode($activeSearch) : '' ?>" class="filter-pill <?= $activeFilter === $key ? 'active' : '' ?>">
                        <?= $label ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ========== SUGGESTIONS LIST ========== -->
        <?php if (isset($dbError)): ?>
            <div class="error-state">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>Database Error</h3>
                <p>Could not retrieve suggestions. Please check your database connection and try again.</p>
            </div>

        <?php elseif (empty($suggestions)): ?>
            <div class="suggestions-grid">
                <div class="empty-state">
                    <i class="fas fa-comment-slash"></i>
                    <h3><?= $activeFilter !== 'all' || $activeSearch !== '' ? 'No matching suggestions' : 'No suggestions yet' ?></h3>
                    <p><?= $activeFilter !== 'all' || $activeSearch !== '' ? 'Try adjusting your filters or search terms.' : 'Feedback submitted through the project pages will appear here.' ?></p>
                </div>
            </div>

        <?php else: ?>
            <div class="suggestions-grid">
                <?php foreach ($suggestions as $i => $s):
                    $colors = $categoryColors[$s['category']] ?? ['#666', '#888'];
                    $label  = $categoryLabels[$s['category']] ?? ucfirst($s['category']);
                    $initials = strtoupper(mb_substr($s['name'], 0, 2));
                    $timeAgo  = getTimeAgo($s['created_at']);
                    
                    // NEW: Project link data
                    $pSlug  = !empty($s['project_slug']) ? $s['project_slug'] : '';
                    $pTitle = !empty($s['project_title']) ? $s['project_title'] : 'General';
                    $pUrl   = $pSlug ? '/api/views/' . $pSlug . '.php' : '';
                ?>
                    <div class="suggestion-card" style="animation-delay: <?= min($i * 0.06, 0.5) ?>s;" data-id="<?= $s['id'] ?>">
                        <button class="delete-btn" title="Delete suggestion" data-delete="<?= $s['id'] ?>" aria-label="Delete suggestion">
                            <i class="fas fa-trash-alt"></i>
                        </button>

                        <div class="card-top">
                            <div class="card-author">
                                <div class="author-avatar" style="background: linear-gradient(135deg, <?= $colors[0] ?>, <?= $colors[1] ?>);">
                                    <?= $initials ?>
                                </div>
                                <div class="author-info">
                                    <div class="author-name"><?= htmlspecialchars($s['name'], ENT_QUOTES, 'UTF-8') ?></div>
                                    <div class="author-email"><?= htmlspecialchars($s['email'], ENT_QUOTES, 'UTF-8') ?></div>
                                </div>
                            </div>
                            <span class="category-badge" style="background: <?= $colors[0] ?>18; color: <?= $colors[0] ?>; border: 1px solid <?= $colors[0] ?>33;">
                                <i class="fas fa-<?= getCategoryIcon($s['category']) ?>"></i>
                                <?= $label ?>
                            </span>
                        </div>

                        <!-- NEW: Project Context Link -->
                        <?php if ($pSlug): ?>
                            <a href="<?= htmlspecialchars($pUrl) ?>" class="card-project-link">
                                <i class="fas fa-folder-open"></i>
                                <span><?= htmlspecialchars($pTitle) ?></span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        <?php endif; ?>

                        <div class="card-message"><?= nl2br(htmlspecialchars($s['message'], ENT_QUOTES, 'UTF-8')) ?></div>
                                                <!-- NEW: Display Screenshot -->
                        <?php if (!empty($s['image'])): ?>
                            <div class="card-image-wrapper">
                                <a href="<?= htmlspecialchars($s['image']) ?>" target="_blank" rel="noopener">
                                    <img src="<?= htmlspecialchars($s['image']) ?>" alt="Suggestion screenshot" loading="lazy">
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="card-footer">
                            <i class="far fa-clock"></i>
                            <span><?= $timeAgo ?></span>
                            <span style="margin: 0 0.3rem;">·</span>
                            <span><?= date('d M Y, H:i', strtotime($s['created_at'])) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </main>

    <!-- ========== DELETE CONFIRM MODAL ========== -->
    <div class="modal-overlay" id="delete-modal">
        <div class="modal-box">
            <i class="fas fa-trash-alt modal-icon"></i>
            <h3>Delete Suggestion?</h3>
            <p>This action cannot be undone. The suggestion will be permanently removed.</p>
            <div class="modal-actions">
                <button class="btn-cancel" id="delete-cancel">Cancel</button>
                <button class="btn-danger" id="delete-confirm">
                    <i class="fas fa-trash-alt"></i> Delete
                </button>
            </div>
        </div>
    </div>

    <!-- ========== TOAST ========== -->
    <div class="toast" id="toast"></div>

    <!-- ========== FOOTER ========== -->
    <footer class="project-footer">
        <div class="footer-inner">
            <p>&copy; <span id="year"></span> <span>Justin Plaatjies</span>. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        // ── Year ─────────────────────────────────────────────
        document.getElementById('year').textContent = new Date().getFullYear();

        // ── Delete Flow ─────────────────────────────────────
        const deleteModal  = document.getElementById('delete-modal');
        const deleteCancel = document.getElementById('delete-cancel');
        const deleteConfirm = document.getElementById('delete-confirm');
        let pendingDeleteId = null;

        document.querySelectorAll('[data-delete]').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.stopPropagation();
                pendingDeleteId = this.getAttribute('data-delete');
                deleteModal.classList.add('active');
            });
        });

        deleteCancel.addEventListener('click', function () {
            deleteModal.classList.remove('active');
            pendingDeleteId = null;
        });

        deleteModal.addEventListener('click', function (e) {
            if (e.target === deleteModal) {
                deleteModal.classList.remove('active');
                pendingDeleteId = null;
            }
        });

        deleteConfirm.addEventListener('click', function () {
            if (!pendingDeleteId) return;

            var btn = this;
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Deleting...';

            var formData = new FormData();
            formData.append('action', 'delete_suggestion');
            formData.append('id', pendingDeleteId);

            fetch('/api/handler/suggestions_handler.php', {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                body: formData,
            })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.success) {
                    var card = document.querySelector('.suggestion-card[data-id="' + pendingDeleteId + '"]');
                    if (card) {
                        card.style.transition = 'opacity 0.3s, transform 0.3s';
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.95)';
                        setTimeout(function () { card.remove(); checkEmpty(); }, 300);
                    }
                    showToast('Suggestion deleted successfully.', 'success');
                } else {
                    showToast(data.message || 'Failed to delete.', 'error');
                }
            })
            .catch(function () {
                showToast('Something went wrong.', 'error');
            })
            .finally(function () {
                deleteModal.classList.remove('active');
                pendingDeleteId = null;
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-trash-alt"></i> Delete';
            });
        });

        function checkEmpty() {
            var grid = document.querySelector('.suggestions-grid');
            if (grid && grid.querySelectorAll('.suggestion-card').length === 0) {
                grid.innerHTML =
                    '<div class="empty-state">' +
                    '<i class="fas fa-comment-slash"></i>' +
                    '<h3>No suggestions yet</h3>' +
                    '<p>Feedback submitted through the project pages will appear here.</p>' +
                    '</div>';
            }
        }

        // ── Toast ───────────────────────────────────────────
        var toastTimer;
        function showToast(message, type) {
            var toast = document.getElementById('toast');
            clearTimeout(toastTimer);
            toast.className = 'toast toast--' + type;
            toast.innerHTML = '<i class="fas fa-' + (type === 'success' ? 'check-circle' : 'exclamation-circle') + '"></i>' + message;
            // Force reflow for re-trigger
            void toast.offsetWidth;
            toast.classList.add('show');
            toastTimer = setTimeout(function () {
                toast.classList.remove('show');
            }, 3500);
        }

        // ── Keyboard: Escape closes modal ───────────────────
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && deleteModal.classList.contains('active')) {
                deleteModal.classList.remove('active');
                pendingDeleteId = null;
            }
        });
    </script>

</body>
</html>
