<?php
require_once __DIR__ . '/../../database/db_connections.php';

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die(json_encode([
        'success' => false,
        'message' => 'Method not allowed.',
    ]));
}

// Detect AJAX vs traditional POST
 $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
          && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

// ── Route by action ───────────────────────────────────────
 $action = $_POST['action'] ?? '';

if ($action === 'delete_suggestion') {
    handleDelete($isAjax);
    exit; // handleDelete calls respond() which exits, but safety net
}

handleInsert($isAjax);

// ── Insert handler ────────────────────────────────────────
function handleInsert(bool $isAjax): void
{
    // Sanitize inputs
    $name     = trim(htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8'));
    $email    = trim(filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL));
    $category = trim($_POST['category'] ?? '');
    $message  = trim(htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8'));
    
    // NEW: Capture Project Data
    $project_slug  = trim(htmlspecialchars($_POST['project_slug'] ?? '', ENT_QUOTES, 'UTF-8'));
    $project_title = trim(htmlspecialchars($_POST['project_title'] ?? '', ENT_QUOTES, 'UTF-8'));

        // Handle File Upload
    $imagePath = null;
    if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['screenshot'];
        $maxSize = 5 * 1024 * 1024; // 5MB
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

        if ($file['size'] > $maxSize) {
            $errors[] = 'Screenshot must be under 5MB.';
        } elseif (!in_array($file['type'], $allowedTypes)) {
            $errors[] = 'Invalid file type. Only PNG, JPG, GIF, and WebP are allowed.';
        } else {
                        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $newName = uniqid('sugg_') . '.' . $ext;
            
            // Server path (for saving the file)
            $uploadDir = __DIR__ . '/../../assets/uploads/suggestions/';
            
            if (!is_dir($uploadDir)) { 
                mkdir($uploadDir, 0755, true); 
            }
            
            $destination = $uploadDir . $newName;
            
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                // Web path (for displaying in the browser)
                $imagePath = '/assets/uploads/suggestions/' . $newName;
            } else {
                $errors[] = 'Failed to save screenshot.';
            }
        }
    }

    // Server-side validation
    $errors = [];

    if ($name === '' || strlen($name) < 2 || strlen($name) > 100) {
        $errors[] = 'Name must be between 2 and 100 characters.';
    }

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }

    $allowedCategories = ['ui', 'feature', 'bug', 'general'];
    if (!in_array($category, $allowedCategories, true)) {
        $errors[] = 'Please select a valid feedback category.';
    }

    if ($message === '' || strlen($message) < 10 || strlen($message) > 5000) {
        $errors[] = 'Your message must be between 10 and 5 000 characters.';
    }

    // Honeypot check
    if (!empty($_POST['website'] ?? '')) {
        respond([
            'success' => true,
            'message' => 'Thank you! Your feedback has been submitted.',
        ], $isAjax);
    }

    if (!empty($errors)) {
        respond([
            'success' => false,
            'message' => implode(' ', $errors),
        ], $isAjax);
    }

    // Insert into database
    try {
        $db = getDB();

                $stmt = $db->prepare("
            INSERT INTO suggestions (name, email, category, message, project_slug, project_title, image)
            VALUES (:name, :email, :category, :message, :project_slug, :project_title, :image)
        ");

        $stmt->execute([
            ':name'          => $name,
            ':email'         => $email,
            ':category'      => $category,
            ':message'       => $message,
            ':project_slug'  => $project_slug,
            ':project_title' => $project_title,
            ':image'         => $imagePath,
        ]);

        respond([
            'success' => true,
            'message' => 'Thank you, ' . $name . '! Your feedback has been submitted successfully.',
        ], $isAjax);

    } catch (PDOException $e) {
        error_log("Suggestion Insert Error: " . $e->getMessage());
        respond([
            'success' => false,
            'message' => 'Something went wrong saving your feedback. Please try again later.',
        ], $isAjax);
    }
}

// ── Delete handler ────────────────────────────────────────
function handleDelete(bool $isAjax): void
{
    $id = filter_var($_POST['id'] ?? 0, FILTER_VALIDATE_INT);

    if (!$id) {
        respond(['success' => false, 'message' => 'Invalid suggestion ID.'], $isAjax);
    }

    try {
        $db = getDB();
        $stmt = $db->prepare("DELETE FROM suggestions WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);

        if ($stmt->rowCount() === 0) {
            respond(['success' => false, 'message' => 'Suggestion not found.'], $isAjax);
        }

        respond(['success' => true, 'message' => 'Suggestion deleted.'], $isAjax);

    } catch (PDOException $e) {
        error_log("Delete Error: " . $e->getMessage());
        respond(['success' => false, 'message' => 'Failed to delete suggestion.'], $isAjax);
    }
}

// ── Response helper ───────────────────────────────────────
function respond(array $data, bool $isAjax): void
{
    if ($isAjax) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        exit;
    }

    // Traditional POST: redirect back with query-string status
    $status  = $data['success'] ? 'success' : 'error';
    $msg     = urlencode($data['message']);
    $referer = $_SERVER['HTTP_REFERER'] ?? '/index.php';

    // Strip any existing status params from the referer
    $referer = preg_replace('/[?&]status=[^&]*/', '', $referer);
    $referer = preg_replace('/[?&]msg=[^&]*/', '', $referer);

    $separator = (parse_url($referer, PHP_URL_QUERY) !== null) ? '&' : '?';
    header("Location: {$referer}{$separator}status={$status}&msg={$msg}");
    exit;
}