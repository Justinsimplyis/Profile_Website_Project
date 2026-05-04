<?php
// You can add any backend logic here (e.g., handling suggestion form submission)
// For now this file serves as project detail view
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubify | Justin Plaatjies Portfolio</title>
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
                    <h1>Hubify</h1>
                    <p class="hero-subtitle">A modern, client-side personal knowledge hub built with HTML, CSS, and Vanilla JavaScript. It serves as a "Life Hub" for capturing Ideas, Links, and Media in a unified, space-themed interface without a backend.</p>
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
                            <span>Personal Project</span>
                        </div>
                    </div>
                    <div class="hero-buttons">
                        <a href="https://github.com/Justinsimplyis" target="_blank" rel="noopener" class="btn btn-primary">
                            <i class="fab fa-github"></i> View Repository
                        </a>
                        <a href="https://justinsimplyis.github.io/Hubify-test/" class="btn btn-outline" id="demo-btn">
                            <i class="fas fa-globe"></i> Live Demo
                        </a>
                        <a href="https://github.com/Justinsimplyis/Hubify-test/archive/refs/heads/main.zip" class="btn btn-outline" download>
                            <i class="fas fa-download"></i> Download Source
                        </a>
                    </div>
                </div>
                <div class="hero-image reveal">
                    <div class="image-frame">
                        <img src="/assets/projects_logos/hubify.png" alt="Hubify Logo">
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
                    <p>Modern productivity often requires switching between note-taking apps, bookmark managers, and media galleries. The challenge was to create a unified "Life Hub" where a user can capture, organize, and revisit diverse types of content (Ideas, Links, Media) without relying on a complex backend or multiple disparate services.</p>
                </div>
                <div class="overview-card">
                    <div class="card-icon"><i class="fas fa-bullseye"></i></div>
                    <h3>The Objective</h3>
                    <p>Design and develop a Single Page Application (SPA) using pure client-side technologies. The goal is a lightweight, instant-load application that persists data directly in the browser, featuring a sophisticated "Space" theme, responsive dual navigation (Desktop Sidebar / Mobile Bottom Bar), and a unified content system.</p>
                </div>
                <div class="overview-card">
                    <div class="card-icon"><i class="fas fa-check-circle"></i></div>
                    <h3>The Outcome</h3>
                    <p>A fully functional "Space Hub" interface. The app features card-based CRUD operations, tag-based filtering, multi-media attachments per item, real-time search, and a dynamic Dark/Light mode toggle. It demonstrates advanced state management in Vanilla JS and modern responsive CSS architecture.</p>
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
                    <img src="/assets/screenshots/p_5/Home.png" alt="Home Feed" data-view data-caption="Home Feed View">
                    
                    <div class="view-placeholder" data-view data-caption="Main Hub View">
                        <i class="fas fa-rss"></i>
                        <span>Main Hub View</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">Main Hub</span>
                        <span class="view-desc">Dynamic card grid displaying all content types (Notes, Links, Media)</span>
                    </div>
                </div>

                <!-- Half Width: Sidebar / Filters -->
                <div class="view-card">
                    <div class="view-placeholder" data-view data-caption="Sidebar Navigation">
                        <i class="fas fa-bars"></i>
                        <span>Sidebar View</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">Sidebar</span>
                        <span class="view-desc">Desktop navigation with category filters</span>
                    </div>
                </div>

                <!-- Half Width: Mobile Bottom Nav -->
                <div class="view-card">
                    <div class="view-placeholder" data-view data-caption="Mobile Navigation">
                        <i class="fas fa-mobile-alt"></i>
                        <span>Mobile Nav</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">Mobile Nav</span>
                        <span class="view-desc">iOS-style bottom navigation for mobile users</span>
                    </div>
                </div>

                <!-- Half Width: Modal Form -->
                <div class="view-card">
                    <div class="view-placeholder" data-view data-caption="Add Item Modal">
                        <i class="fas fa-plus-square"></i>
                        <span>Create Modal</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">Create Modal</span>
                        <span class="view-desc">Glassmorphism bottom sheet form</span>
                    </div>
                </div>

                <!-- Half Width: Dark Mode Toggle -->
                <div class="view-card">
                    <div class="view-placeholder" data-view data-caption="Theme Toggle">
                        <i class="fas fa-adjust"></i>
                        <span>Theme Toggle</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">Theme Toggle</span>
                        <span class="view-desc">Seamless switch between Deep Space and Light Hub modes</span>
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
                                <span class="tech-detail">Semantic markup, structure</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #264de420; color: #264de4;"><i class="fab fa-css3-alt"></i></div>
                            <div>
                                <span class="tech-name">CSS3</span>
                                <span class="tech-detail">Flexbox, Grid, CSS Variables, Glassmorphism, Animations</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #f7df1e20; color: #F0DB4F;"><i class="fab fa-js"></i></div>
                            <div>
                                <span class="tech-name">JavaScript (ES6+)</span>
                                <span class="tech-detail">State management, DOM manipulation, Event handling</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #f0503220; color: #f05032;"><i class="fab fa-git-alt"></i></div>
                            <div>
                                <span class="tech-name">LocalStorage API</span>
                                <span class="tech-detail">Client-side data persistence</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #777bb320; color: #777bb3;"><i class="fab fa-git-alt"></i></div>
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
                            <span class="arch-label">UI / View</span>
                            <div class="arch-nodes">
                                <span class="arch-node">HTML Structure</span>
                                <span class="arch-node">CSS (Glass/Space)</span>
                                <span class="arch-node">Responsive Grid</span>
                            </div>
                        </div>
                        <div class="arch-arrow"><i class="fas fa-exchange-alt"></i> DOM Manipulation</div>
                        <div class="arch-layer backend">
                            <span class="arch-label">Logic</span>
                            <div class="arch-nodes">
                                <span class="arch-node">State Object</span>
                                <span class="arch-node">Event Listeners</span>
                                <span class="arch-node">Render Functions</span>
                            </div>
                        </div>
                        <div class="arch-arrow"><i class="fas fa-exchange-alt"></i> JSON Serialization</div>
                        <div class="arch-layer database">
                            <span class="arch-label">Storage</span>
                            <div class="arch-nodes">
                                <span class="arch-node">LocalStorage</span>
                                <span class="arch-node">Browser Cache</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Structure -->
            <div class="schema-section reveal">
                <h3 class="tech-subtitle center"><i class="fas fa-database"></i> Data Structure (JSON)</h3>
                <div class="schema-grid">
                    <div class="schema-table">
                        <div class="schema-header">Item Object</div>
                        <div class="schema-row"><span class="schema-key">PK</span> id — String (Timestamp)</div>
                        <div class="schema-row"><span class="schema-attr">STRING</span> type — (note, link, media)</div>
                        <div class="schema-row"><span class="schema-attr">STRING</span> title — String</div>
                        <div class="schema-row"><span class="schema-attr">STRING</span> content — Text</div>
                        <div class="schema-row"><span class="schema-attr">ARRAY</span> media — [Objects]</div>
                        <div class="schema-row"><span class="schema-attr">ARRAY</span> tags — [Strings]</div>
                        <div class="schema-row"><span class="schema-attr">BOOL</span> pinned — Boolean</div>
                        <div class="schema-row"><span class="schema-attr">STRING</span> createdAt — ISO-8601</div>
                    </div>
                </div>
            </div>

            <!-- Key Features -->
            <div class="features-grid reveal">
                <h3 class="tech-subtitle center"><i class="fas fa-star"></i> Key Features Implemented</h3>
                <div class="feature-card">
                    <div class="feature-number">01</div>
                    <h4>Unified Content System</h4>
                    <p>All content (Notes, Links, Media) exists as a single "Item" type. This allows for unified tagging and filtering across different data formats within a single card.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">02</div>
                    <h4>Client-Side CRUD</h4>
                    <p>Full Create, Read, Update, and Delete operations managed purely in JavaScript. Changes are instantly reflected in the UI and persisted to LocalStorage without page reloads.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">03</div>
                    <h4>Tagging System</h4>
                    <p>Dynamic tag generation per item. Clicking a tag triggers a global filter, allowing users to organize and retrieve content by context (e.g., "work", "ideas").</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">04</div>
                    <h4>Multi-Media Support</h4>
                    <p>Users can attach multiple URLs, images, or video links to a single item. The app renders previews appropriately (images, video embeds, external links).</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">05</div>
                    <h4>Responsive Dual Navigation</h4>
                    <p>Adaptive layout that uses a "Space" Sidebar on desktop and an iOS-style Bottom Tab Bar on mobile, ensuring optimal usability across all device sizes.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">06</div>
                    <h4>Dark / Light Modes</h4>
                    <p>Advanced theming using CSS Variables. Switches between "Deep Space" (dark) and "Light Hub" (light) modes, persisting user preference in LocalStorage.</p>
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
                        </div>
                    </div>

                    <div class="gantt-row">
                        <div class="gantt-task-label">Concept & Wireframe</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 1 / 2; background: var(--yellow);"><span>Weeks 1–2</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">HTML & Space UI</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 2 / 4; background: #f59e0b;"><span>Weeks 2–3</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">JS Logic & State</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 3 / 5; background: #f7df1e;"><span>Weeks 3–4</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">LocalStorage & Refine</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 4 / 5; background: #ef4444;"><span>Weeks 4–5</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Phase Details -->
            <div class="phase-details reveal">
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 1 – 2</span>
                        <h4>Concept & Wireframe</h4>
                    </div>
                    <ul>
                        <li>Defined the "Hubify" concept: a second brain for digital life.</li>
                        <li>Designed the unified data model: Items with multiple attachments.</li>
                        <li>Created wireframes for Sidebar, Grid, and Modal views.</li>
                        <li>Planned the "Space" theme colors and CSS Variable structure.</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 2 – 3</span>
                        <h4>HTML & Space UI</h4>
                    </div>
                    <ul>
                        <li>Built the semantic HTML structure for all sections.</li>
                        <li>Implemented the "H" Orbit Logo using SVG.</li>
                        <li>Created the CSS Grid layout and Glassmorphism card styles.</li>
                        <li>Developed the responsive navigation logic (Sidebar vs Bottom Bar).</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 3 – 4</span>
                        <h4>JS Logic & State</h4>
                    </div>
                    <ul>
                        <li>Implemented the `App` object with centralized State management.</li>
                        <li>Wrote CRUD functions (`saveItem`, `deleteItem`, `updateItem`).</li>
                        <li>Developed the render loop to dynamically inject cards based on filters.</li>
                        <li>Handled tag filtering and search query matching.</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 4 – 5</span>
                        <h4>LocalStorage & Refine</h4>
                    </div>
                    <ul>
                        <li>Implemented `localStorage` persistence to save data between sessions.</li>
                        <li>Added JSON serialization for complex objects (media arrays).</li>
                        <li>Refined the Dark/Light mode toggle to update CSS variables.</li>
                        <li>Polished animations and hover effects for the space theme.</li>
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
                    <h4>State Management</h4>
                    <p>Managing complex state (items, filters, media arrays) without a framework like React or Vue required careful manual DOM updates. Ensuring the UI stayed in sync with the data object was the primary difficulty.</p>
                </div>
                <div class="learning-card solution">
                    <div class="learning-badge"><i class="fas fa-trophy"></i> Learning</div>
                    <h4>Vanilla JS Power</h4>
                    <p>Learned that with modern JavaScript (ES6 arrow functions, template literals, Array methods), you can build reactive, framework-feeling applications with significantly less bloat.</p>
                </div>
                <div class="learning-card challenge">
                    <div class="learning-badge"><i class="fas fa-exclamation-triangle"></i> Challenge</div>
                    <h4>CSS Complexity</h4>
                    <p>Implementing the "Glassmorphism" look and "Space" theme required mastering `backdrop-filter`, `rgba` colors, and responsive grid alignment across different mobile devices.</p>
                </div>
                <div class="learning-card solution">
                    <div class="learning-badge"><i class="fas fa-trophy"></i> Learning</div>
                    <h4>UI/UX Design</h4>
                    <p>Developed a stronger understanding of navigation patterns (Desktop Sidebar vs Mobile Bottom Tab Bar) and how to provide consistent user experiences across form factors.</p>
                </div>
            </div>
        </section>

        <!-- ========== MODULE ALIGNMENT ========== -->
        <section class="project-section" id="modules">
            <h2 class="section-heading reveal"><span>Project Alignment</span></h2>
            <div class="alignment-content reveal">
                <p class="alignment-text">
                    This project evolved from a database-driven assignment into a showcase of <strong>Advanced Frontend Engineering</strong>. It demonstrates the ability to build sophisticated, state-driven applications using pure client-side technologies, focusing on performance (no server latency), aesthetics (Space Glassmorphism), and usability.
                </p>
                <div class="alignment-tags">
                    <div class="alignment-tag-item">
                        <span class="tag-code">HTML5</span>
                        <span>Advanced Semantic Markup</span>
                    </div>
                    <div class="alignment-tag-item">
                        <span class="tag-code">CSS3</span>
                        <span>Variables, Flexbox, Grid, Glassmorphism</span>
                    </div>
                    <div class="alignment-tag-item">
                        <span class="tag-code">JS ES6</span>
                        <span>DOM Manipulation & LocalStorage</span>
                    </div>
                    <div class="alignment-tag-item">
                        <span class="tag-code">UI/UX</span>
                        <span>Responsive Design & Theming</span>
                    </div>
                    <div class="alignment-tag-item">
                        <span class="tag-code">SPA</span>
                        <span>Single Page Application Architecture</span>
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
            <p>This project was developed as a personal portfolio piece. You can explore the full source code and run it locally on GitHub.</p>
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