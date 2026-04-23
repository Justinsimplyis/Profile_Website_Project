<?php
// Detailed view for the Personal Portfolio Project
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio | Justin Plaatjies Portfolio</title>
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
                    <span class="project-label">Personal Case Study</span>
                    <h1>Personal<br>Portfolio Website</h1>
                    <p class="hero-subtitle">A custom-built, framework-free single-page application designed to serve as a dynamic digital resume. It showcases my technical skills, academic background, and project case studies through bold design and hand-coded interactions.</p>
                    <div class="hero-meta">
                        <div class="meta-item">
                            <i class="fas fa-code"></i>
                            <span>Front-End Development</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar"></i>
                            <span>2024 – 2025</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-layer-group"></i>
                            <span>Solo Project</span>
                        </div>
                    </div>
                    <div class="hero-buttons">
                        <a href="https://github.com/Justinsimplyis/Portfolio-Project.git" target="_blank" rel="noopener" class="btn btn-primary">
                            <i class="fab fa-github"></i> View Repository
                        </a>
                        <!-- Links directly to live site instead of triggering 'Not Available' modal -->
                        <a href="/index.php" class="btn btn-outline">
                            <i class="fas fa-globe"></i> Live Demo
                        </a>
                        <a href="https://github.com/Justinsimplyis/Portfolio-Project/archive/refs/heads/main.zip" class="btn btn-outline" download>
                            <i class="fas fa-download"></i> Download Source
                        </a>
                    </div>
                </div>
                <div class="hero-image reveal">
                    <div class="image-frame">
                        <img src="/assets/projects_logos/Portfolio logo.png" alt="Portfolio Project Logo">
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
                    <p>Standard text-based CVs often fail to capture the true capabilities of a software developer. I needed a professional online presence that didn't just *list* my skills, but actively *demonstrated* them through custom UI/UX, animations, and clean code structure.</p>
                </div>
                <div class="overview-card">
                    <div class="card-icon"><i class="fas fa-bullseye"></i></div>
                    <h3>The Objective</h3>
                    <p>Build a fast, lightweight, purely hand-coded portfolio from scratch—without relying on templates, page builders, or heavy frameworks. The goal was to prove mastery over vanilla HTML, CSS, and JavaScript.</p>
                </div>
                <div class="overview-card">
                    <div class="card-icon"><i class="fas fa-check-circle"></i></div>
                    <h3>The Outcome</h3>
                    <p>A bold, black-and-yellow themed single-page application featuring a fixed sidebar, animated progress bars, a categorized project grid, and dedicated project detail pages (like this one) for in-depth case studies.</p>
                </div>
            </div>
        </section>

        <!-- ========== PAGE VIEWS & SCREENSHOTS ========== -->
        <section class="project-section" id="views">
            <h2 class="section-heading reveal"><span>Page Views & Sections</span></h2>
            <p class="views-hint reveal"><i class="fas fa-expand"></i> Click any image to view fullscreen</p>
            
            <div class="views-grid reveal">
                <!-- Full Width: Home -->
                <div class="view-card full-width">
                    <div class="view-placeholder" data-view data-caption="Home & Hero Section">
                        <i class="fas fa-home"></i>
                        <span>Home & Hero Section</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">Home Section</span>
                        <span class="view-desc">Dynamic hero with role tags, stats, and call-to-action buttons</span>
                    </div>
                </div>

                <!-- Half Width: About -->
                <div class="view-card">
                    <div class="view-placeholder" data-view data-caption="Biography Section">
                        <i class="fas fa-user"></i>
                        <span>Biography View</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">Biography</span>
                        <span class="view-desc">Bio text and structured contact info grid</span>
                    </div>
                </div>

                <!-- Half Width: Skills -->
                <div class="view-card">
                    <div class="view-placeholder" data-view data-caption="Skills & Animations">
                        <i class="fas fa-cogs"></i>
                        <span>Skills View</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">Skills Section</span>
                        <span class="view-desc">Scroll-triggered animated skill bars and tool tags</span>
                    </div>
                </div>

                <!-- Half Width: Education/Experience -->
                <div class="view-card">
                    <div class="view-placeholder" data-view data-caption="Education & Experience Timeline">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Timeline View</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">Education & Experience</span>
                        <span class="view-desc">Dual-column vertical timeline layout</span>
                    </div>
                </div>

                <!-- Half Width: Projects Grid -->
                <div class="view-card">
                    <div class="view-placeholder" data-view data-caption="Projects Grid">
                        <i class="fas fa-th-large"></i>
                        <span>Projects View</span>
                    </div>
                    <div class="view-caption">
                        <span class="view-label">Projects Grid</span>
                        <span class="view-desc">Categorized current work and academic project cards</span>
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
                                <span class="tech-detail">Semantic elements, accessibility, SEO structure</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #264de420; color: #264de4;"><i class="fab fa-css3-alt"></i></div>
                            <div>
                                <span class="tech-name">CSS3</span>
                                <span class="tech-detail">Grid, Flexbox, Custom Properties, Animations</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #f0db4f20; color: #f0db4f;"><i class="fab fa-js-square"></i></div>
                            <div>
                                <span class="tech-name">Vanilla JavaScript</span>
                                <span class="tech-detail">Intersection Observer, DOM manipulation, state</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #528dd720; color: #528dd7;"><i class="fab fa-font-awesome"></i></div>
                            <div>
                                <span class="tech-name">Font Awesome 6</span>
                                <span class="tech-detail">Custom iconography for UI elements</span>
                            </div>
                        </div>
                        <div class="tech-item">
                            <div class="tech-item-icon" style="background: #4285f420; color: #4285f4;"><i class="fab fa-google"></i></div>
                            <div>
                                <span class="tech-name">Google Fonts</span>
                                <span class="tech-detail">Inter (Body) & Playfair Display (Headings)</span>
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
                                <span class="arch-node">HTML Structure</span>
                                <span class="arch-node">CSS Styling</span>
                                <span class="arch-node">JS Logic</span>
                            </div>
                        </div>
                        <div class="arch-arrow"><i class="fas fa-exchange-alt"></i> DOM Events & Rendering</div>
                        <div class="arch-layer backend">
                            <span class="arch-label">Core Features</span>
                            <div class="arch-nodes">
                                <span class="arch-node">Scroll Spy</span>
                                <span class="arch-node">Intersection API</span>
                                <span class="arch-node">State Toggle</span>
                            </div>
                        </div>
                        <div class="arch-arrow"><i class="fas fa-exchange-alt"></i> URL Routing</div>
                        <div class="arch-layer database">
                            <span class="arch-label">Sub-Pages</span>
                            <div class="arch-nodes">
                                <span class="arch-node">PHP Detail Views</span>
                                <span class="arch-node">Shared CSS</span>
                                <span class="arch-node">Lightbox Modals</span>
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
                    <h4>Fixed Sidebar Navigation</h4>
                    <p>A persistent sidebar that pushes the main content on desktop, and transforms into a slide-out drawer with a semi-transparent overlay on mobile devices.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">02</div>
                    <h4>Scroll-Triggered Animations</h4>
                    <p>Utilizing the vanilla JS Intersection Observer API to detect when elements enter the viewport, triggering CSS transitions for skill bars and content reveals without heavy libraries.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">03</div>
                    <h4>Project Case Studies</h4>
                    <p>Instead of a simple image grid, clicking a project routes the user to a fully detailed PHP case study page featuring Gantt charts, schema breakdowns, and image lightboxes.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">04</div>
                    <h4>Categorized Grid System</h4>
                    <p>Projects are split into "Current Work" and "Schooling Projects", utilizing CSS Grid with hover overlays to create an interactive, gallery-like experience.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">05</div>
                    <h4>Zero-Dependency Styling</h4>
                    <p>Achieved a complex, responsive layout with bold borders and typography using purely custom CSS Variables—no Bootstrap, no Tailwind, proving deep CSS mastery.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">06</div>
                    <h4>Custom Lightbox Modals</h4>
                    <p>Built custom image and video lightboxes from scratch with keyboard navigation (arrow keys, escape), dynamic indexing, and smooth CSS transitions.</p>
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
                        </div>
                    </div>

                    <div class="gantt-row">
                        <div class="gantt-task-label">UI/UX & Wireframing</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 1 / 3; background: var(--yellow);"><span>Weeks 1–2</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">HTML Structure</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 2 / 4; background: #f59e0b;"><span>Weeks 2–3</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">CSS Styling & Layout</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 3 / 6; background: #f97316;"><span>Weeks 3–5</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">JavaScript & Animations</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 5 / 7; background: #ef4444;"><span>Weeks 5–6</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">Detail Pages & Lightbox</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 6 / 8; background: #ec4899;"><span>Weeks 6–7</span></div>
                        </div>
                    </div>
                    <div class="gantt-row">
                        <div class="gantt-task-label">Responsive & Launch</div>
                        <div class="gantt-bars">
                            <div class="gantt-bar" style="grid-column: 7 / 9; background: #8b5cf6;"><span>Weeks 7–8</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="phase-details reveal">
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 1 – 2</span>
                        <h4>UI/UX & Wireframing</h4>
                    </div>
                    <ul>
                        <li>Decided on a bold, black-and-yellow minimalist aesthetic</li>
                        <li>Planned the fixed sidebar layout vs traditional top navbar</li>
                        <li>Selected typography pairing: Playfair Display for headings, Inter for body</li>
                        <li>Structured content hierarchy for resume sections</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 2 – 3</span>
                        <h4>HTML Structure</h4>
                    </div>
                    <ul>
                        <li>Built semantic HTML5 structure for all portfolio sections</li>
                        <li>Created forms with proper validation attributes</li>
                        <li>Set up Font Awesome icon integration</li>
                        <li>Ensured accessibility with ARIA labels and alt text</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 3 – 5</span>
                        <h4>CSS Styling & Layout</h4>
                    </div>
                    <ul>
                        <li>Implemented complex CSS Grid and Flexbox layouts</li>
                        <li>Designed the timeline component for Education/Experience</li>
                        <li>Built the categorized project grid with hover overlays</li>
                        <li>Created CSS custom properties for easy theming</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 5 – 6</span>
                        <h4>JavaScript & Animations</h4>
                    </div>
                    <ul>
                        <li>Wrote vanilla JS for the sidebar toggle and mobile overlay</li>
                        <li>Implemented Intersection Observer for scroll-reveal animations</li>
                        <li>Created dynamic width calculations for the skill progress bars</li>
                        <li>Managed active states for navigation scroll-spy</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 6 – 7</span>
                        <h4>Detail Pages & Lightbox</h4>
                    </div>
                    <ul>
                        <li>Developed the PHP architecture for individual project views</li>
                        <li>Built custom image lightbox with keyboard navigation</li>
                        <li>Created the Gantt chart component using CSS Grid</li>
                        <li>Integrated the suggestion/feedback form system</li>
                    </ul>
                </div>
                <div class="phase-card">
                    <div class="phase-header">
                        <span class="phase-week">Weeks 7 – 8</span>
                        <h4>Responsive & Launch</h4>
                    </div>
                    <ul>
                        <li>Wrote extensive media queries for tablets and mobile screens</li>
                        <li>Tested cross-browser compatibility</li>
                        <li>Optimized image assets and font loading for performance</li>
                        <li>Deployed via GitHub Pages / Local Server</li>
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
                    <h4>Framework-Free Responsiveness</h4>
                    <p>Building a complex layout with a fixed sidebar that pushes content on desktop, but transforms into an overlay drawer on mobile—without Bootstrap or Tailwind—required meticulous calculation of paddings, transitions, and z-index layering.</p>
                </div>
                <div class="learning-card solution">
                    <div class="learning-badge"><i class="fas fa-trophy"></i> Learning</div>
                    <h4>Advanced CSS Mastery</h4>
                    <p>Deepened my understanding of how CSS Grid and Flexbox interact. I learned how to use <code>calc()</code>, CSS custom properties, and relative units effectively to build a fluid, responsive UI from absolute scratch.</p>
                </div>
                <div class="learning-card challenge">
                    <div class="learning-badge"><i class="fas fa-exclamation-triangle"></i> Challenge</div>
                    <h4>Performance vs. Aesthetics</h4>
                    <p>Balancing bold design elements (thick borders, heavy fonts, large animations) with fast load times and smooth scrolling performance, particularly on lower-end mobile devices.</p>
                </div>
                <div class="learning-card solution">
                    <div class="learning-badge"><i class="fas fa-trophy"></i> Learning</div>
                    <h4>Vanilla JS Efficiency</h4>
                    <p>Instead of relying on jQuery or AOS (Animate On Scroll), I mastered the native <code>Intersection Observer API</code>. This dramatically reduced the JavaScript payload while achieving smooth, performant scroll-based animations.</p>
                </div>
            </div>
        </section>

        <!-- ========== MODULE ALIGNMENT ========== -->
        <section class="project-section" id="modules">
            <h2 class="section-heading reveal"><span>Skills Applied</span></h2>
            <div class="alignment-content reveal">
                <p class="alignment-text">
                    While this is a personal project, it serves as a practical culmination of multiple modules studied during my Diploma in IT. It applies theoretical concepts to a real-world, production-level artifact.
                </p>
                <div class="alignment-tags">
                    <div class="alignment-tag-item">
                        <span class="tag-code">WEDE6021</span>
                        <span>Web Development (Intermediate) — Advanced HTML/CSS structuring</span>
                    </div>
                    <div class="alignment-tag-item">
                        <span class="tag-code">HUCM6221</span>
                        <span>Human Computer Interaction — UI/UX design principles applied</span>
                    </div>
                    <div class="alignment-tag-item">
                        <span class="tag-code">PROG6011</span>
                        <span>Programming 2A — JavaScript DOM manipulation and logic</span>
                    </div>
                    <div class="alignment-tag-item">
                        <span class="tag-code">WILA6321</span>
                        <span>Work Integrated Learning — Professional presentation of work</span>
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

    <!-- Demo Modal (Kept for structure, but Live Demo button now links directly) -->
    <div class="modal-overlay" id="demo-modal">
        <div class="modal">
            <button class="modal-close" id="modal-close"><i class="fas fa-times"></i></button>
            <div class="modal-icon"><i class="fas fa-info-circle"></i></div>
            <h3>Demo Not Available</h3>
            <p>This project is not currently deployed to a live server. You can explore the full source code on GitHub.</p>
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