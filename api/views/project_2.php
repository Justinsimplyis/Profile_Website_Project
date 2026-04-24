<?php
require_once __DIR__ . '/../../database/db_connections.php';

 $formMessage = [
    'type'    => '',
    'text'    => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'submit_suggestion') {

    $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
              && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

    $name     = trim(htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8'));
    $email    = trim(filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL));
    $category = trim($_POST['category'] ?? '');
    $message  = trim(htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8'));
    
    $project_slug  = trim(htmlspecialchars($_POST['project_slug'] ?? '', ENT_QUOTES, 'UTF-8'));
    $project_title = trim(htmlspecialchars($_POST['project_title'] ?? '', ENT_QUOTES, 'UTF-8'));

    $errors = [];

    // --- Handle File Upload ---
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
            
            $uploadDir = __DIR__ . '/../../assets/uploads/suggestions/';
            
            if (!is_dir($uploadDir)) { 
                mkdir($uploadDir, 0755, true); 
            }
            
            $destination = $uploadDir . $newName;
            
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $imagePath = '/assets/uploads/suggestions/' . $newName;
            } else {
                $errors[] = 'Failed to save screenshot.';
            }
        }
    }

    if (strlen($name) < 2 || strlen($name) > 100) {
        $errors[] = 'Name must be between 2 and 100 characters.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }

    $allowedCategories = ['ui', 'feature', 'bug', 'general'];
    if (!in_array($category, $allowedCategories, true)) {
        $errors[] = 'Please select a valid feedback category.';
    }

    if (strlen($message) < 10 || strlen($message) > 5000) {
        $errors[] = 'Your message must be between 10 and 5 000 characters.';
    }

    if (!empty($errors)) {
        $response = [
            'success' => false,
            'message' => implode(' ', $errors),
        ];
    } else {
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

            $response = [
                'success' => true,
                'message' => 'Thank you, ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '! Your feedback has been submitted successfully.',
            ];
        } catch (PDOException $e) {
            error_log("Suggestion Insert Error: " . $e->getMessage());
            $response = [
                'success' => false,
                'message' => 'Something went wrong saving your feedback. Please try again later.',
            ];
        }
    }

    if ($isAjax) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
        exit;
    }

    $formMessage['type'] = $response['success'] ? 'success' : 'error';
    $formMessage['text'] = $response['message'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hattie's Hat'istical Hats | Justin Plaatjies Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/project_details.css">
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

    <main class="project-main">

        <!-- ========== HERO SECTION ========== -->
        <section class="project-hero">
            <div class="hero-inner">
                <div class="hero-text reveal">
                    <span class="project-label">Full-Stack Case Study</span>
                    <h1>Hattie's Hat'istical<br>Hats E-Commerce</h1>
                    <p class="hero-subtitle">A custom-built, zero-framework e-commerce platform designed for a South African hat boutique. It features dynamic inventory management, bespoke custom request handling with image uploads, and role-based dashboards for both users and administrators.</p>
                    <div class="hero-meta">
                        <div class="meta-item">
                            <i class="fas fa-layer-group"></i>
                            <span>Full-Stack Development</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar"></i>
                            <span>2024 – 2025</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <span>Solo Project</span>
                        </div>
                    </div>
                    <div class="hero-buttons">
                        <a href="https://github.com/Justinsimplyis/Hatties-Ecommerce.git" target="_blank" rel="noopener" class="btn btn-primary">
                            <i class="fab fa-github"></i> View Repository
                        </a>
                        <a href="/public/index.php" class="btn btn-outline">
                            <i class="fas fa-globe"></i> Live Demo
                        </a>
                        <a href="https://github.com/Justinsimplyis/Hatties-Ecommerce/archive/refs/heads/main.zip" class="btn btn-outline" download>
                            <i class="fas fa-download"></i> Download Source
                        </a>
                    </div>
                </div>
                <div class="hero-image reveal">
                    <div class="image-frame">
                        <img src="/assets/projects_logos/Hatties logo.png" alt="Hattie's Hat'istical Hats Project Logo">
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== PROJECT OVERVIEW ========== -->
        <section class="project-section" id="overview">
            <h2 class="section-heading reveal"><span>Project Overview</span></h2>
            <div class="overview-grid reveal">
                <div class="overview-card">
                    <div class="card-icon"><i class="fas fa-lightbulb"></i></div>
                    <h3>The Problem</h3>
                    <p>Local boutique hat makers often rely on social media or generic platforms like WooCommerce, which carry heavy plugin bloat and fail to capture the bespoke, premium nature of their brand. Hattie's needed a lightweight, custom system tailored specifically to handling custom millinery requests.</p>
                </div>
                <div class="overview-card">
                    <div class="card-icon"><i class="fas fa-bullseye"></i></div>
                    <h3>The Objective</h3>
                    <p>Build a complete full-stack e-commerce ecosystem from scratch using core PHP and vanilla JavaScript. The system needed to handle standard inventory, a specialized "Custom Request" engine with image uploads, and distinct control panels for shoppers and store admins.</p>
                </div>
                <div class="overview-card">
                    <div class="card-icon"><i class="fas fa-check-circle"></i></div>
                    <h3>The Outcome</h3>
                    <p>A warm, elegant, cream-and-red themed storefront featuring a dynamic product catalog with AJAX filtering, a drag-and-drop custom request modal, a fully functional shopping cart, and secure, role-based backend dashboards for order and user management.</p>
                </div>
            </div>
        </section>

        <!-- ========== PAGE VIEWS & SCREENSHOTS ========== -->
        <section class="project-section" id="views">
            <h2 class="section-heading reveal"><span>Page Views & Interfaces</span></h2>
            <p class="views-hint reveal"><i class="fas fa-expand"></i> Click any image to view fullscreen</p>
            
            <div class="views-grid reveal">
                <!-- Full Width: Storefront -->
                <div class="view-card full-width">
                    <img src="/assets/screenshots/p_3/storefront_hero.png"
                    alt="Hattie's storefront hero section displaying elegant hats and navigation" class="view-image" data-view data-caption="Storefront Hero"/>
                    <img src="/assets/screenshots/p_3/storefront_catalog.png"
                    alt="Product catalog grid showing hat categories and filter chips" class="view-image" data-view data-caption="Product Catalog"/>
                    <div class="view-caption">
                        <span class="view-label">Public Storefront</span>
                        <span class="view-desc">Elegant hero section and dynamic product catalog with filtering</span>
                    </div>
                </div>

                <!-- Half Width: Product Modal & Custom Request -->
                <div class="view-card">
                    <img src="/assets/screenshots/p_3/product_carousel.png"
                    alt="Product detail modal showing image carousel and add to cart options" class="view-image" data-view data-caption="Product Detail Modal"/>
                    <div class="view-caption">
                        <span class="view-label">Product Details</span>
                        <span class="view-desc">Autoplay image carousel with dynamic pricing and stock status</span>
                    </div>
                </div>

                <div class="view-card">
                    <img src="/assets/screenshots/p_3/custom_request.png"
                    alt="Custom hat request form featuring drag and drop image uploads" class="view-image" data-view data-caption="Custom Request Engine"/>
                    <div class="view-caption">
                        <span class="view-label">Custom Request Engine</span>
                        <span class="view-desc">Drag-and-drop image uploads tied to specific products for bespoke orders</span>
                    </div>
                </div>

                <!-- Half Width: Dashboards -->
                <div class="view-card">
                    <img src="/assets/screenshots/p_3/admin_dashboard.png"
                    alt="Admin dashboard showing sales metrics, new customers, and request management tables" class="view-image" data-view data-caption="Admin Dashboard"/>
                    <div class="view-caption">
                        <span class="view-label">Admin Dashboard</span>
                        <span class="view-desc">Centralized hub for inventory, customer, and custom request management</span>
                    </div>
                </div>

                <div class="view-card">
                    <img src="/assets/screenshots/p_3/user_dashboard.png"
                    alt="User dashboard showing active cart, order history, and profile management" class="view-image" data-view data-caption="User Dashboard"/>
                    <div class="view-caption">
                        <span class="view-label">User Dashboard</span>
                        <span class="view-desc">Secure client portal for cart management, order tracking, and profile settings</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== TECHNICAL BREAKDOWN ========== -->
        <section class="project-section dark-section" id="technical">
            <h2 class="section-heading heading-light reveal"><span>Technical Breakdown</span></h2>

            <div class="tech-grid reveal">
                <!-- Tech Stack -->
                <div class="tech-column">
                    <h3 class="tech-subtitle"><i class="fas fa-cubes"></i> Tech Stack</h3>
                    <div class="tech-list">
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #777bb320; color: #777bb3;"><i class="fab fa-php"></i></div>
                            <div>
                                <span class="tech-name">Core PHP</span>
                                <span class="tech-detail">Session management, CRUD APIs, dynamic routing</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #00758f20; color: #00758f;"><i class="fas fa-database"></i></div>
                            <div>
                                <span class="tech-name">MySQL</span>
                                <span class="tech-detail">Relational schema for users, products, orders, and requests</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #f0db4f20; color: #f0db4f;"><i class="fab fa-js-square"></i></div>
                            <div>
                                <span class="tech-name">Vanilla JavaScript</span>
                                <span class="tech-detail">Complex state management, AJAX Fetch, DOM rendering</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #264de420; color: #264de4;"><i class="fab fa-css3-alt"></i></div>
                            <div>
                                <span class="tech-name">Custom CSS</span>
                                <span class="tech-detail">Variables, Grid/Flexbox layouts, glassmorphism, custom animations</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #f7df1e20; color: #b8860b;"><i class="fab fa-html5"></i></div>
                            <div>
                                <span class="tech-name">Semantic HTML5</span>
                                <span class="tech-detail">Accessible modals, ARIA roles, keyboard navigation</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Architecture -->
                <div class="tech-column">
                    <h3 class="tech-subtitle"><i class="fas fa-sitemap"></i> Architecture</h3>
                    <div class="architecture-diagram">
                        <div class="arch-layer frontend">
                            <span class="arch-label">Client-Side (Browser)</span>
                            <div class="arch-nodes">
                                <span class="arch-node">Vanilla JS State</span>
                                <span class="arch-node">AJAX Fetch API</span>
                                <span class="arch-node">DOM Manipulation</span>
                            </div>
                        </div>
                        <div class="arch-arrow"><i class="fas fa-exchange-alt"></i> JSON / FormData Requests</div>
                        <div class="arch-layer backend">
                            <span class="arch-label">API & Server Logic</span>
                            <div class="arch-nodes">
                                <span class="arch-node">PHP REST Handlers</span>
                                <span class="arch-node">Session Auth</span>
                                <span class="arch-node">File Upload I/O</span>
                            </div>
                        </div>
                        <div class="arch-arrow"><i class="fas fa-exchange-alt"></i> Prepared Statements</div>
                        <div class="arch-layer database">
                            <span class="arch-label">Data & Storage</span>
                            <div class="arch-nodes">
                                <span class="arch-node">MySQL Database</span>
                                <span class="arch-node">User Upload Dir</span>
                                <span class="arch-node">Product Images</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Key Features -->
            <div class="features-grid reveal">
                <h3 class="tech-subtitle center"><i class="fas fa-star"></i> Key Features Implemented</h3>
                <div class="feature-card">
                    <div class="feature-number">01</div>
                    <h4>Zero-Framework State Management</h4>
                    <p>Managed complex UI states (cart, filters, modals) purely in vanilla JavaScript without React or Vue. Used centralized state objects and targeted DOM rendering functions to keep the UI perfectly in sync with the data.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">02</div>
                    <h4>Context-Aware Custom Requests</h4>
                    <p>Built an engine where clicking "Request Custom" pre-fills a modal with the specific product's details. Users can drag-and-drop up to 5 reference images, which are securely validated and uploaded via PHP.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">03</div>
                    <h4>Autoplay Image Carousel</h4>
                    <p>Developed a lightweight image carousel from scratch for product modals, complete with thumbnail navigation, autoplay timers that pause on hover, and keyboard arrow key support.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">04</div>
                    <h4>Role-Based Access Control</h4>
                    <p>Architected distinct experiences for three user types: public storefront (unauthenticated), customer dashboard (user role), and admin dashboard (admin role), all secured via PHP sessions.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">05</div>
                    <h4>Dynamic Global Search</h4>
                    <p>Implemented a command-palette style search (Ctrl+K) that queries the product catalog in real-time as the user types, displaying rich results with thumbnails and prices.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">06</div>
                    <h4>Robust Frontend Validation</h4>
                    <p>Created a reusable validation system for all forms (contact, custom requests, profile updates) that displays inline errors, highlights invalid fields, and prevents submission without round-trip server errors.</p>
                </div>
            </div>
        </section>

        <!-- ========== PROJECT TIMELINE ========== -->
        <section class="project-section" id="timeline">
            <h2 class="section-heading reveal"><span>Project Timeline</span></h2>

            <div class="gantt-wrapper reveal">
                <div class="gantt-chart">
                    <div class="gantt-header">
                        <div class="gantt-task-label">Phase</div>
                        <div class="gantt-bars">
                            <div class="gantt-week">W1</div>
                            <div class="gantt-week">W2</div>
                            <div class="gantt-week">W3</div>
                            <div class="gantt-week">W4</div>
                            <div class="gantt-week">W5</div>
                            <div class="gantt-week">W6</div>
                            <div class="gantt-week">W7</div>
                            <div class="gantt-week">W8</div>
                            <div class="gantt-week">W9</div>
                            <div class="gantt-week">W10</div>
                        </div>
                    </div>

                    <div class="gantt-row">
                        <div class="gantt-task-label">UI/UX & Database Schema</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 1 / 3; background: var(--accent);"><span>Weeks 1–2</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">Public Storefront & API</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 2 / 5; background: #0891b2;"><span>Weeks 2–4</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">Cart & Custom Request Engine</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 4 / 7; background: #0e7490;"><span>Weeks 4–6</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">User Dashboard</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 6 / 8; background: #155e75;"><span>Weeks 6–7</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">Admin Dashboard & Polish</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 8 / 11; background: #164e63;"><span>Weeks 8–10</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="phase-details reveal">
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 1 – 2</span>
                        <h4>UI/UX & Database Schema</h4>
                    </div>
                    <ul>
                        <li>Designed a warm, elegant aesthetic (cream/red) suitable for a boutique brand</li>
                        <li>Planned the relational database mapping users, products, categories, and custom requests</li>
                        <li>Structured the file directory for API separation and secure file uploads</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 2 – 4</span>
                        <h4>Public Storefront & API</h4>
                    </div>
                    <ul>
                        <li>Built semantic HTML structure for hero, catalog, about, and contact sections</li>
                        <li>Developed core PHP API endpoints for fetching products and categories dynamically</li>
                        <li>Implemented AJAX-powered catalog filtering and search overlay</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 4 – 6</span>
                        <h4>Cart & Custom Request Engine</h4>
                    </div>
                    <ul>
                        <li>Developed complex vanilla JS state management for the shopping cart sidebar</li>
                        <li>Built the drag-and-drop image upload modal with live previews</li>
                        <li>Created the image carousel component with autoplay and thumbnail syncing</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 6 – 7</span>
                        <h4>User Dashboard</h4>
                    </div>
                    <ul>
                        <li>Created a collapsible sidebar layout for the user control panel</li>
                        <li>Implemented sections for order history, active cart, and custom request tracking</li>
                        <li>Built the profile update form with avatar upload and password change logic</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 8 – 10</span>
                        <h4>Admin Dashboard & Polish</h4>
                    </div>
                    <ul>
                        <li>Developed the admin interface for managing inventory, viewing orders, and responding to custom requests</li>
                        <li>Implemented role-based session security to prevent unauthorized dashboard access</li>
                        <li>Finalized responsive design across all three distinct interfaces</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- ========== CHALLENGES & LEARNINGS ========== -->
        <section class="project-section dark-section" id="learnings">
            <h2 class="section-heading heading-light reveal"><span>Challenges & Learnings</span></h2>
            <div class="learnings-grid reveal">
                <div class="learning-card challenge">
                    <div class="learning-badge"><i class="fas fa-exclamation-triangle"></i> Challenge</div>
                    <h4>Complex State Without Frameworks</h4>
                    <p>Managing cart items, active filters, multiple open modals, and dynamic search results purely in vanilla JavaScript proved incredibly difficult. Keeping the UI synchronized without a virtual DOM led to highly complex DOM querying and rendering functions.</p>
                </div>
                <div class="learning-card solution">
                    <div class="learning-badge"><i class="fas fa-trophy"></i> Learning</div>
                    <h4>Advanced Vanilla JS Patterns</h4>
                    <p>I learned to simulate component-like behavior by creating centralized state objects and targeted render functions (e.g., <code>renderCart()</code>, <code>renderCatalog()</code>). This drastically reduced bugs and made the codebase surprisingly maintainable.</p>
                </div>
                <div class="learning-card challenge">
                    <div class="learning-badge"><i class="fas fa-exclamation-triangle"></i> Challenge</div>
                    <h4>Secure Multi-File Handling</h4>
                    <p>Allowing users to upload reference images for custom hats introduced significant security risks. I had to ensure files were strictly validated for MIME type, size, and sanitized filenames to prevent directory traversal or malicious uploads.</p>
                </div>
                <div class="learning-card solution">
                    <div class="learning-badge"><i class="fas fa-trophy"></i> Learning</div>
                    <h4>Robust Validation Architectures</h4>
                    <p>I developed a dual-layer validation system: instant frontend feedback using JS for UX, backed by strict server-side PHP validation for security. I also learned how to securely handle <code>FormData</code> payloads in Fetch API requests.</p>
                </div>
            </div>
        </section>

        <!-- ========== THOUGHT PROCESS / DIARY ========== -->
        <section class="project-section" id="thought-process">
            <h2 class="section-heading reveal"><span>Thought Process</span></h2>
            <div class="thought-process-wrapper reveal">
                <div class="diary-card">
                    <div class="diary-date">Early 2024 — Defining the Aesthetic</div>
                    <p>Most e-commerce sites look like WordPress templates. I wanted Hattie's site to feel like walking into a high-end boutique. I chose a warm cream palette with deep red accents to evoke feelings of craftsmanship, heritage, and femininity—completely distancing it from the standard cold, corporate blue layouts.</p>
                </div>
                <div class="diary-card">
                    <div class="diary-date">The "Anti-Plugin" Stance</div>
                    <p>When planning the dashboards, the easy route was WordPress + WooCommerce. But that imposes massive bloat and limits customizability. By writing custom PHP APIs and vanilla JS, the entire application loads in a fraction of a second, and the client isn't paying for server resources they don't need.</p>
                </div>
                <div class="diary-card full-width">
                    <div class="diary-date">Solving the "Bespoke" Problem</div>
                    <p>Hats aren't like t-shirts. People often want a specific hat, but in a different color, with a wider brim, or with a custom feather. Standard e-commerce "Add to Cart" flow doesn't work here. I designed the Custom Request engine to bridge this gap—allowing users to select a base product, upload inspiration photos via drag-and-drop, and submit a detailed brief directly to the admin. This transformed the site from a simple store into a collaborative design tool.</p>
                </div>
            </div>
        </section>

        <!-- ========== BEYOND STATIC PAGES ========== -->
        <section class="project-section dark-section" id="dynamic-features">
            <h2 class="section-heading heading-light reveal"><span>System Proof & Backend</span></h2>
            <p class="alignment-text dark-section-intro">Beyond the visual storefront lies a complex relational database and API structure. Below is evidence of the backend logic powering the dynamic interactions.</p>
            
            <div class="views-grid reveal">
                <div class="view-card">
                    <img src="/assets/screenshots/p_3/custom_request_data.png"
                    alt="Database schema showing the custom requests table linking users, images, and products" class="view-image" data-view data-caption="Custom Request Schema"/>
                    <div class="view-caption">
                        <span class="view-label">Custom Request Schema</span>
                        <span class="view-desc">Database structure linking bespoke requests to users and reference images</span>
                    </div>
                </div>

                <div class="view-card">
                    <img src="/assets/screenshots/p_3/api_payload.png"
                    alt="Browser network tab showing FormData payload including multi-part image uploads" class="view-image" data-view data-caption="Fetch API Payload"/>
                    <div class="view-caption">
                        <span class="view-label">API Payload Structure</span>
                        <span class="view-desc">Secure FormData transmission handling file arrays and JSON metadata</span>
                    </div>
                </div>

                <div class="view-card">
                    <img src="/assets/screenshots/p_3/admin_enquiries.png"
                    alt="Admin dashboard showing aggregated customer enquiries and custom requests" class="view-image" data-view data-caption="Admin Request Management"/>
                    <div class="view-caption">
                        <span class="view-label">Admin Request Management</span>
                        <span class="view-desc">Backend interface for reviewing, quoting, and updating bespoke orders</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== SUGGESTION FORM ========== -->
        <section class="project-section dark-section" id="suggestions">
            <h2 class="section-heading heading-light reveal"><span>Suggestions & Feedback</span></h2>
            <div class="suggestion-wrapper reveal">
                <p class="suggestion-intro">Have feedback on this project or suggestions for improvement? I'd love to hear from you.</p>

                <?php if (!empty($formMessage['text'])): ?>
                    <div class="form-message form-message--<?= $formMessage['type'] ?>">
                        <i class="fas fa-<?= $formMessage['type'] === 'success' ? 'check-circle' : 'exclamation-circle' ?>"></i>
                        <span><?= $formMessage['text'] ?></span>
                    </div>
                <?php endif; ?>

                <form class="suggestion-form" id="suggestion-form" novalidate enctype="multipart/form-data">
                    <input type="hidden" name="action" value="submit_suggestion">
                    <input type="hidden" name="project_slug" value="project_2">
                    <input type="hidden" name="project_title" value="Hattie's Hat'istical Hats | Justin Plaatjies Portfolio">

                    <div class="form-row">
                        <input type="text" name="name" placeholder="Your Name *" class="form-box" required minlength="2" maxlength="100" aria-label="Your Name">
                        <input type="email" name="email" placeholder="Your Email *" class="form-box" required aria-label="Your Email">
                    </div>
                    <select name="category" class="form-box" required aria-label="Feedback Category">
                        <option value="" disabled selected>Select Feedback Category *</option>
                        <option value="ui">UI / Design Feedback</option>
                        <option value="feature">Feature Suggestion</option>
                        <option value="bug">Bug Report</option>
                        <option value="general">General Comment</option>
                    </select>
                    <textarea name="message" class="form-box" rows="5" placeholder="Your feedback or suggestion... *" required minlength="10" maxlength="5000" aria-label="Your feedback"></textarea>
                    
                    <div class="file-upload-wrapper">
                        <input type="file" name="screenshot" id="screenshot-input" accept="image/png, image/jpeg, image/gif, image/webp">
                        <label for="screenshot-input" class="file-upload-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span class="file-upload-text">Attach a screenshot (optional)</span>
                            <span class="file-upload-hint">PNG, JPG, GIF or WebP — Max 5MB</span>
                        </label>
                        <span class="file-upload-name" id="file-name-display"></span>
                    </div>

                    <button type="submit" class="btn btn-primary btn-full" id="submit-btn">
                        Submit Feedback <i class="fas fa-paper-plane"></i>
                    </button>
                </form>

                <div class="form-message" id="form-message-ajax" style="display:none;" role="alert"></div>
            </div>
        </section>

    </main>

    <!-- ========== FOOTER ========== -->
    <footer class="project-footer">
        <div class="footer-inner">
            <p>&copy; <span id="year"></span> <span>Justin Plaatjies</span>. All Rights Reserved.</p>
            <div class="footer-links">
                <a href="/index.php"><i class="fas fa-arrow-left"></i> Portfolio</a>
            </div>
        </div>
    </footer>

    <!-- Screenshot Lightbox -->
    <div class="view-lightbox" id="view-lightbox">
        <button class="view-lightbox-close" id="view-lightbox-close" aria-label="Close"><i class="fas fa-times"></i></button>
        <button class="view-lightbox-nav view-lightbox-prev" id="view-lightbox-prev" aria-label="Previous"><i class="fas fa-chevron-left"></i></button>
        <img src="" alt="Screenshot" id="view-lightbox-img">
        <button class="view-lightbox-nav view-lightbox-next" id="view-lightbox-next" aria-label="Next"><i class="fas fa-chevron-right"></i></button>
        <div class="view-lightbox-caption" id="view-lightbox-caption"></div>
        <div class="view-lightbox-counter" id="view-lightbox-counter"></div>
    </div>

    <script src="/js/project_details.js"></script>
    <script>
        // Dynamic Year
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>
</html>