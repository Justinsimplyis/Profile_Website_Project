<?php
// You can add any backend logic here (e.g., handling suggestion form submission)
// For now this file serves as the project detail view
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gossip Website | Justin Plaatjies Portfolio</title>
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
                    <span class="project-label">Project Case Study</span>
                    <h1>Gossip Website</h1>
                    <p class="hero-subtitle">A light-to-medium social media platform built with PHP and MySQL, featuring user registrations, post creation, and real-time social interaction capabilities.</p>
                    <div class="hero-meta">
                        <div class="meta-item">
                            <i class="fas fa-code"></i>
                            <span>Web Development</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar"></i>
                            <span>2024</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-layer-group"></i>
                            <span>Academic Project</span>
                        </div>
                    </div>
                    <div class="hero-buttons">
                        <a href="https://github.com/Justinsimplyis" target="_blank" rel="noopener" class="btn btn-primary">
                            <i class="fab fa-github"></i> View Repository
                        </a>
                        <a href="#" class="btn btn-outline" id="demo-btn">
                            <i class="fas fa-globe"></i> Live Demo
                        </a>
                        <a href="https://github.com/Justinsimplyis/Portfolio-Project/archive/refs/heads/main.zip" class="btn btn-outline" download>
                            <i class="fas fa-download"></i> Download Source
                        </a>
                    </div>
                </div>
                <div class="hero-image reveal">
                    <div class="image-frame">
                        <img src="/assets/projects_logos/Gossip_Website_logo.png" alt="Gossip Website Logo">
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
                    <p>As part of the Web Development (Intermediate) module at IIE Varsity College, the brief required building a database-driven web application that demonstrates competency in server-side scripting, CRUD operations, and relational database management. The goal was to move beyond static pages into dynamic, user-interactive web systems.</p>
                </div>
                <div class="overview-card">
                    <div class="card-icon"><i class="fas fa-bullseye"></i></div>
                    <h3>The Objective</h3>
                    <p>Design and develop a functional social media-style website where users can create accounts, publish posts, interact with content, and manage their profiles — all powered by a MySQL backend with PHP handling server-side logic and session management.</p>
                </div>
                <div class="overview-card">
                    <div class="card-icon"><i class="fas fa-check-circle"></i></div>
                    <h3>The Outcome</h3>
                    <p>A fully operational social platform with user authentication, post creation and deletion, profile management, and a clean, responsive front-end. The project demonstrated practical application of the SDLC, from requirements gathering through to deployment-ready code.</p>
                </div>
            </div>
        </section>

        <!-- ========== PAGE VIEWS & SCREENSHOTS ========== -->
        <section class="project-section" id="views">
            <h2 class="section-heading reveal"><span>Page Views & Screenshots</span></h2>
            <p class="views-hint reveal"><i class="fas fa-expand"></i> Click any image to view fullscreen</p>
            
            <div class="views-grid reveal">
                
                <!-- Full Width: Main Feed -->
                <div class="view-card full-width">
                    <!-- TO ADD REAL IMAGE: Replace the view-placeholder div with: 
                         <img src="/assets/uploads/screenshots/gossip-feed.png" alt="Home Feed" data-view data-caption="Home Feed View">
                    -->
                    <div class="view-placeholder" data-view data-caption="Home Feed View">
                        <i class="fas fa-rss"></i>
                        <span>Home Feed View</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">Home Feed</span>
                        <span class="view-desc">Dynamic post feed displaying user content and interactions</span>
                    </div>
                </div>

                <!-- Half Width: Login/Register -->
                <div class="view-card">
                    <div class="view-placeholder" data-view data-caption="Login & Register View">
                        <i class="fas fa-lock"></i>
                        <span>Login Page</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">Login / Register</span>
                        <span class="view-desc">User authentication interface</span>
                    </div>
                </div>

                <!-- Half Width: User Profile -->
                <div class="view-card">
                    <div class="view-placeholder" data-view data-caption="User Profile View">
                        <i class="fas fa-user-circle"></i>
                        <span>Profile Page</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">User Profile</span>
                        <span class="view-desc">Individual user profile and post history</span>
                    </div>
                </div>

                <!-- Half Width: Create Post -->
                <div class="view-card">
                    <div class="view-placeholder" data-view data-caption="Create Post View">
                        <i class="fas fa-pen-to-square"></i>
                        <span>Create Post View</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">Create Post</span>
                        <span class="view-desc">Form for publishing new content</span>
                    </div>
                </div>

                <!-- Half Width: Backend/Database Visual -->
                <div class="view-card">
                    <div class="view-placeholder" data-view data-caption="Database Structure View">
                        <i class="fas fa-database"></i>
                        <span>Database / Backend</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">Backend Logic</span>
                        <span class="view-desc">PHP scripts and MySQL database structure</span>
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
                            <div class="tech-item-icon" style="background: #f7df1e20; color: #b8860b;"><i class="fab fa-html5"></i></div>
                            <div>
                                <span class="tech-name">HTML5</span>
                                <span class="tech-detail">Semantic markup, forms, accessibility</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #264de420; color: #264de4;"><i class="fab fa-css3-alt"></i></div>
                            <div>
                                <span class="tech-name">CSS3</span>
                                <span class="tech-detail">Responsive layouts, Flexbox, custom styling</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #777bb320; color: #777bb3;"><i class="fab fa-php"></i></div>
                            <div>
                                <span class="tech-name">PHP</span>
                                <span class="tech-detail">Server-side logic, sessions, CRUD operations</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #00758f20; color: #00758f;"><i class="fas fa-database"></i></div>
                            <div>
                                <span class="tech-name">MySQL</span>
                                <span class="tech-detail">Relational database, queries, data modelling</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #f0503220; color: #f05032;"><i class="fab fa-git-alt"></i></div>
                            <div>
                                <span class="tech-name">Git</span>
                                <span class="tech-detail">Version control, repository management</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Architecture -->
                <div class="tech-column">
                    <h3 class="tech-subtitle"><i class="fas fa-sitemap"></i> Architecture</h3>
                    <div class="architecture-diagram">
                        <div class="arch-layer frontend">
                            <span class="arch-label">Front-End</span>
                            <div class="arch-nodes">
                                <span class="arch-node">HTML5</span>
                                <span class="arch-node">CSS3</span>
                                <span class="arch-node">Forms</span>
                            </div>
                        </div>
                        <div class="arch-arrow"><i class="fas fa-exchange-alt"></i> HTTP Requests / Responses</div>
                        <div class="arch-layer backend">
                            <span class="arch-label">Back-End</span>
                            <div class="arch-nodes">
                                <span class="arch-node">PHP Scripts</span>
                                <span class="arch-node">Sessions</span>
                                <span class="arch-node">Validation</span>
                            </div>
                        </div>
                        <div class="arch-arrow"><i class="fas fa-exchange-alt"></i> SQL Queries</div>
                        <div class="arch-layer database">
                            <span class="arch-label">Database</span>
                            <div class="arch-nodes">
                                <span class="arch-node">Users Table</span>
                                <span class="arch-node">Posts Table</span>
                                <span class="arch-node">Comments Table</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Database Schema -->
            <div class="schema-section reveal">
                <h3 class="tech-subtitle center"><i class="fas fa-database"></i> Database Schema (Simplified)</h3>
                <div class="schema-grid">
                    <div class="schema-table">
                        <div class="schema-header">users</div>
                        <div class="schema-row"><span class="schema-key">PK</span> id — INT</div>
                        <div class="schema-row"><span class="schema-attr">UNIQUE</span> username — VARCHAR(50)</div>
                        <div class="schema-row"><span class="schema-attr">UNIQUE</span> email — VARCHAR(100)</div>
                        <div class="schema-row"><span class="schema-attr"></span> password_hash — VARCHAR(255)</div>
                        <div class="schema-row"><span class="schema-attr"></span> profile_pic — VARCHAR(255)</div>
                        <div class="schema-row"><span class="schema-attr"></span> created_at — TIMESTAMP</div>
                    </div>
                    <div class="schema-table">
                        <div class="schema-header">posts</div>
                        <div class="schema-row"><span class="schema-key">PK</span> id — INT</div>
                        <div class="schema-row"><span class="schema-fk">FK</span> user_id — INT</div>
                        <div class="schema-row"><span class="schema-attr"></span> content — TEXT</div>
                        <div class="schema-row"><span class="schema-attr"></span> image — VARCHAR(255)</div>
                        <div class="schema-row"><span class="schema-attr"></span> created_at — TIMESTAMP</div>
                    </div>
                    <div class="schema-table">
                        <div class="schema-header">comments</div>
                        <div class="schema-row"><span class="schema-key">PK</span> id — INT</div>
                        <div class="schema-row"><span class="schema-fk">FK</span> post_id — INT</div>
                        <div class="schema-row"><span class="schema-fk">FK</span> user_id — INT</div>
                        <div class="schema-row"><span class="schema-attr"></span> comment_text — TEXT</div>
                        <div class="schema-row"><span class="schema-attr"></span> created_at — TIMESTAMP</div>
                    </div>
                </div>
            </div>

            <!-- Key Features -->
            <div class="features-grid reveal">
                <h3 class="tech-subtitle center"><i class="fas fa-star"></i> Key Features Implemented</h3>
                <div class="feature-card">
                    <div class="feature-number">01</div>
                    <h4>User Authentication</h4>
                    <p>Registration and login system with password hashing, session management, and protected routes to ensure only authenticated users can post and comment.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">02</div>
                    <h4>CRUD Operations</h4>
                    <p>Full Create, Read, Update, and Delete functionality for posts. Users can create new posts, view a feed of all posts, edit their own content, and delete posts they authored.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">03</div>
                    <h4>Comment System</h4>
                    <p>Relational comment system allowing users to engage with posts. Comments are linked to both the user and the post via foreign keys, maintaining data integrity.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">04</div>
                    <h4>Profile Management</h4>
                    <p>Users can view and update their profile information including username, email, and profile picture, with form validation on the server side.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">05</div>
                    <h4>Responsive Design</h4>
                    <p>The entire interface adapts to different screen sizes using CSS Flexbox, media queries, and fluid layouts — ensuring usability on mobile, tablet, and desktop.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">06</div>
                    <h4>Input Validation & Security</h4>
                    <p>Server-side validation on all form inputs, prepared SQL statements to prevent SQL injection, and XSS protection through output escaping.</p>
                </div>
            </div>
        </section>

        <!-- ========== PROJECT TIMELINE / GANTT ========== -->
        <section class="project-section" id="timeline">
            <h2 class="section-heading reveal"><span>Project Timeline</span></h2>

            <!-- Gantt Chart -->
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
                        </div>
                    </div>

                    <div class="gantt-row">
                        <div class="gantt-task-label">Requirements & Planning</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 1 / 3; background: var(--yellow);"><span>Weeks 1–2</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">Database Design</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 2 / 4; background: #f59e0b;"><span>Weeks 2–3</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">UI / Front-End Build</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 3 / 6; background: #f97316;"><span>Weeks 3–5</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">PHP Back-End Logic</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 4 / 7; background: #ef4444;"><span>Weeks 4–6</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">Integration & Testing</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 6 / 8; background: #ec4899;"><span>Weeks 6–7</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">Documentation & Submission</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 7 / 9; background: #8b5cf6;"><span>Weeks 7–8</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Phase Details -->
            <div class="phase-details reveal">
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 1 – 2</span>
                        <h4>Requirements & Planning</h4>
                    </div>
                    <ul>
                        <li>Analysed project brief and defined functional requirements</li>
                        <li>Identified key features: authentication, posting, commenting, profiles</li>
                        <li>Created wireframes for main pages (login, feed, profile, post creation)</li>
                        <li>Established project folder structure and Git repository</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 2 – 3</span>
                        <h4>Database Design</h4>
                    </div>
                    <ul>
                        <li>Designed ER diagram mapping relationships between users, posts, and comments</li>
                        <li>Created MySQL database with normalised tables (3NF)</li>
                        <li>Defined primary keys, foreign keys, and constraints</li>
                        <li>Populated test data for development and testing purposes</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 3 – 5</span>
                        <h4>UI / Front-End Build</h4>
                    </div>
                    <ul>
                        <li>Built responsive HTML/CSS layouts for all pages</li>
                        <li>Implemented navigation bar, feed layout, and user profile page</li>
                        <li>Created all HTML forms with proper input types and labels</li>
                        <li>Applied consistent styling aligned with the site's social media theme</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 4 – 6</span>
                        <h4>PHP Back-End Logic</h4>
                    </div>
                    <ul>
                        <li>Implemented user registration with password hashing</li>
                        <li>Built login system using PHP sessions</li>
                        <li>Developed CRUD operations for posts using prepared statements</li>
                        <li>Created comment system linking users and posts via foreign keys</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 6 – 7</span>
                        <h4>Integration & Testing</h4>
                    </div>
                    <ul>
                        <li>Connected front-end forms to back-end PHP handlers</li>
                        <li>Conducted unit testing on individual functions</li>
                        <li>Tested all CRUD paths and edge cases (empty inputs, invalid data)</li>
                        <li>Fixed bugs related to session handling and query errors</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 7 – 8</span>
                        <h4>Documentation & Submission</h4>
                    </div>
                    <ul>
                        <li>Wrote technical documentation covering setup, features, and architecture</li>
                        <li>Prepared the final report aligning with module assessment criteria</li>
                        <li>Cleaned up code, added comments, and ensured Git history was organised</li>
                        <li>Submitted the complete project package for assessment</li>
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
                    <h4>SQL Injection Prevention</h4>
                    <p>Initially used raw SQL queries which exposed the application to injection risks. Researched and implemented PDO prepared statements across all database interactions, learning the critical importance of parameterised queries in production-grade code.</p>
                </div>
                <div class="learning-card solution">
                    <div class="learning-badge"><i class="fas fa-trophy"></i> Learning</div>
                    <h4>Secure Authentication Patterns</h4>
                    <p>Gained hands-on understanding of password hashing with <code>password_hash()</code> and <code>password_verify()</code>, session-based authentication flow, and the difference between authentication and authorisation in a multi-user system.</p>
                </div>
                <div class="learning-card challenge">
                    <div class="learning-badge"><i class="fas fa-exclamation-triangle"></i> Challenge</div>
                    <h4>Relational Data Management</h4>
                    <p>Managing the one-to-many relationships between users/posts and posts/comments required careful attention to foreign key constraints, JOIN queries, and ensuring referential integrity when deleting records.</p>
                </div>
                <div class="learning-card solution">
                    <div class="learning-badge"><i class="fas fa-trophy"></i> Learning</div>
                    <h4>Full-Stack Thinking</h4>
                    <p>This project was the first time I connected a front-end interface to a real database through server-side code. It solidified my understanding of the full request-response cycle and how each layer (HTML → PHP → MySQL) interacts.</p>
                </div>
            </div>
        </section>

        <!-- ========== MODULE ALIGNMENT ========== -->
        <section class="project-section" id="modules">
            <h2 class="section-heading reveal"><span>Academic Alignment</span></h2>
            <div class="alignment-content reveal">
                <p class="alignment-text">
                    This project was developed as part of the <strong>Web Development (Intermediate)</strong> module (WEDE6021) at IIE Varsity College. The module's purpose is to teach students to develop database-driven websites using appropriate server-side scripting and DBMS — which this project demonstrates end-to-end.
                </p>
                <div class="alignment-tags">
                    <div class="alignment-tag-item">
                        <span class="tag-code">WEDE6021</span>
                        <span>Web Development (Intermediate) — NQF Level 6, 15 Credits</span>
                    </div>
                    <div class="alignment-tag-item">
                        <span class="tag-code">DATA6211</span>
                        <span>Database (Introduction) — Relational design fundamentals</span>
                    </div>
                    <div class="alignment-tag-item">
                        <span class="tag-code">DATA6222</span>
                        <span>Database (Intermediate) — Advanced queries and management</span>
                    </div>
                    <div class="alignment-tag-item">
                        <span class="tag-code">WEDE5020</span>
                        <span>Web Development (Introduction) — HTML/CSS foundations</span>
                    </div>
                    <div class="alignment-tag-item">
                        <span class="tag-code">SQAT6322</span>
                        <span>Software Quality & Testing — Testing methodologies applied</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== SUGGESTION FORM ========== -->
        <section class="project-section dark-section" id="suggestions">
            <h2 class="section-heading heading-light reveal"><span>Suggestions & Feedback</span></h2>
            <div class="suggestion-wrapper reveal">
                <p class="suggestion-intro">Have feedback on this project or suggestions for improvement? I'd love to hear from you.</p>
                <form class="suggestion-form" id="suggestion-form">
                    <div class="form-row">
                        <input type="text" name="name" placeholder="Your Name" class="form-box" required>
                        <input type="email" name="email" placeholder="Your Email" class="form-box" required>
                    </div>
                    <select name="category" class="form-box" required>
                        <option value="" disabled selected>Select Feedback Category</option>
                        <option value="ui">UI / Design Feedback</option>
                        <option value="feature">Feature Suggestion</option>
                        <option value="bug">Bug Report</option>
                        <option value="general">General Comment</option>
                    </select>
                    <textarea name="message" class="form-box" rows="5" placeholder="Your feedback or suggestion..." required></textarea>
                    <button type="submit" class="btn btn-primary btn-full">
                        Submit Feedback <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
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

    <!-- Demo Modal -->
    <div class="modal-overlay" id="demo-modal">
        <div class="modal">
            <button class="modal-close" id="modal-close"><i class="fas fa-times"></i></button>
            <div class="modal-icon"><i class="fas fa-info-circle"></i></div>
            <h3>Demo Not Available</h3>
            <p>This project was developed as an academic submission and is not currently deployed to a live server. You can explore the full source code on GitHub.</p>
            <a href="https://github.com/Justinsimplyis" target="_blank" rel="noopener" class="btn btn-primary" style="margin-top: 1.5rem;">
                <i class="fab fa-github"></i> Go to Repository
            </a>
        </div>
    </div>

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
</body>
</html>