<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Justin Plaatjies | Software Developer Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
</head>
<body>

    <!-- ========== SIDEBAR HEADER ========== -->
    <header class="header" id="header">
        <div id="menu-btn" class="menu-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <div class="header-top">
            <div class="header-avatar">
                <img src="assets/projects_logos/Portfolio logo.png" alt="Justin Plaatjies">
            </div>
            <a href="#home" class="logo">JP</a>
            <p class="header-tagline"> Junior Software Developer</p>
        </div>

        <nav class="navbar" id="navbar">
            <a href="#home" class="active"><i class="fas fa-home"></i> Home</a>
            <a href="#about"><i class="fas fa-user"></i> About Me</a>
            <a href="#skills-section"><i class="fas fa-cogs"></i> Skills</a>
            <a href="#services"><i class="fas fa-briefcase"></i> Services</a>
            <a href="#portfolio"><i class="fas fa-folder-open"></i> Projects</a>
            <a href="#contact"><i class="fas fa-envelope"></i> Contact</a>
            <a href="/api/suggestions/suggestions.php"><i class="fas fa-suggestion">Suggestions</i></a>
        </nav>

        <div class="follow">
            <a href="https://github.com/Justinsimplyis" target="_blank" rel="noopener" aria-label="GitHub">
                <i class="fab fa-github"></i>
            </a>
            <a href="https://linkedin.com/in/" target="_blank" rel="noopener" aria-label="LinkedIn">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://mail.google.com/mail/u/0/#inbox/FMfcgzQgLPQtWLgWfQLbBMkcqDkSBrhM?compose=CllgCJNwfTrLCcJWtmTGlDsmhJBqzpZZjLQWGnjNFPfBwbcnRWnCZGhgRkzwMrlztFzPWNXzqrg" target="_blank" rel="noopener" aria-label="Email">
                <i class="fas fa-envelope"></i>
            </a>
        </div>
    </header>

    <!-- ========== OVERLAY (mobile) ========== -->
    <div class="overlay" id="overlay"></div>

    <!-- ========== MAIN CONTENT ========== -->
    <main class="main-content">

        <!-- HOME -->
        <section class="home" id="home">
            <div class="home-inner">
                <div class="image reveal">
                    <img src="assets/projects_logos/Portfolio logo.png" alt="Justin Plaatjies - Software Developer">
                </div>
                <div class="content reveal">
                    <p class="greeting">Hello, I'm</p>
                    <h1>Justin Plaatjies</h1>
                    <div class="role-wrapper">
                        <span class="role-tag">IT Graduate</span>
                        <span class="role-divider">|</span>
                        <span class="role-tag">Junior Software Developer</span>
                    </div>
                    <p class="description">
                        Information Technology graduate specializing in Software Development, with a solid foundation in 
                        programming, database design, and system analysis. Skilled in designing and developing mobile 
                        and web applications, with hands-on experience in UI/UX, project coordination, and software 
                        lifecycle processes.
                    </p>
                    <div class="home-actions">
                        <a href="#about" class="btn btn-primary">About Me <i class="fas fa-arrow-right"></i></a>
                        <a href="#contact" class="btn btn-outline">Get In Touch</a>
                    </div>
                    <div class="home-stats">
                        <div class="stat">
                            <span class="stat-number">360</span>
                            <span class="stat-label">Qualification Credits</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">22</span>
                            <span class="stat-label">Modules Completed</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">NQF 6</span>
                            <span class="stat-label">Diploma Level</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll-indicator">
                <span>Scroll Down</span>
                <i class="fas fa-chevron-down"></i>
            </div>
        </section>

        <!-- ABOUT / BIOGRAPHY -->
        <section class="about" id="about">
            <h2 class="heading"><span>Biography</span></h2>
            <div class="biography reveal">
                <p class="bio-text">
                    I am a motivated Information Technology graduate from the IIE Varsity College in Nelson Mandela Bay Campus inGqeberha, 
                    Eastern Cape. My academic journey has equipped me with comprehensive knowledge across the 
                    full software development lifecycle — from requirements gathering and systems analysis 
                    through to coding, testing, and deployment. During my Work Integrated Learning. 
                    I am proficient in Java, C#, .NET, web technologies (HTML, CSS, PHP), 
                    mobile development (Android, Kotlin), and database management (MySQL, SQL Server, Azure). 
                    I am eager to apply my technical expertise and contribute to innovative solutions in a 
                    dynamic IT environment.
                </p>
                <div class="bio-grid">
                    <div class="bio-item">
                        <i class="fas fa-user"></i>
                        <div>
                            <span class="bio-label">Full Name</span>
                            <span class="bio-value">Justin Plaatjies</span>
                        </div>
                    </div>
                    <div class="bio-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <span class="bio-label">Email</span>
                            <span class="bio-value">j.plaatjies08@gmail.com</span>
                        </div>
                    </div>
                    <div class="bio-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <span class="bio-label">Location</span>
                            <span class="bio-value">Jeffrey's Bay, 6330, Eastern Cape</span>
                        </div>
                    </div>
                    <div class="bio-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <span class="bio-label">Phone</span>
                            <span class="bio-value">072 426 1880</span>
                        </div>
                    </div>
                    <div class="bio-item">
                        <i class="fas fa-language"></i>
                        <div>
                            <span class="bio-label">Languages</span>
                            <span class="bio-value">Afrikaans, English</span>
                        </div>
                    </div>
                    <div class="bio-item">
                        <i class="fab fa-github"></i>
                        <div>
                            <span class="bio-label">GitHub</span>
                            <span class="bio-value">github.com/Justinsimplyis</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SKILLS -->
        <section class="skills-section" id="skills-section">
            <h2 class="heading"><span>Skills</span></h2>

            <div class="skills-categories reveal">
                <!-- Programming -->
                <div class="skill-category">
                    <h3 class="category-title"><i class="fas fa-code"></i> Programming</h3>
                    <div class="skill-bars">
                        <div class="skill-bar">
                            <div class="skill-info"><span>Java</span><span>75%</span></div>
                            <div class="bar-track"><div class="bar-fill" data-width="75"></div></div>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-info"><span>C# / .NET</span><span>70%</span></div>
                            <div class="bar-track"><div class="bar-fill" data-width="70"></div></div>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-info"><span>Kotlin</span><span>60%</span></div>
                            <div class="bar-track"><div class="bar-fill" data-width="60"></div></div>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-info"><span>PHP</span><span>55%</span></div>
                            <div class="bar-track"><div class="bar-fill" data-width="55"></div></div>
                        </div>
                    </div>
                </div>

                <!-- Web Development -->
                <div class="skill-category">
                    <h3 class="category-title"><i class="fas fa-globe"></i> Web Development</h3>
                    <div class="skill-bars">
                        <div class="skill-bar">
                            <div class="skill-info"><span>HTML5</span><span>85%</span></div>
                            <div class="bar-track"><div class="bar-fill" data-width="85"></div></div>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-info"><span>CSS3</span><span>75%</span></div>
                            <div class="bar-track"><div class="bar-fill" data-width="75"></div></div>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-info"><span>Responsive Design</span><span>70%</span></div>
                            <div class="bar-track"><div class="bar-fill" data-width="70"></div></div>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-info"><span>REST APIs</span><span>60%</span></div>
                            <div class="bar-track"><div class="bar-fill" data-width="60"></div></div>
                        </div>
                    </div>
                </div>

                <!-- Database -->
                <div class="skill-category">
                    <h3 class="category-title"><i class="fas fa-database"></i> Database</h3>
                    <div class="skill-bars">
                        <div class="skill-bar">
                            <div class="skill-info"><span>MySQL</span><span>75%</span></div>
                            <div class="bar-track"><div class="bar-fill" data-width="75"></div></div>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-info"><span>SQL Server</span><span>65%</span></div>
                            <div class="bar-track"><div class="bar-fill" data-width="65"></div></div>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-info"><span>Azure Database</span><span>55%</span></div>
                            <div class="bar-track"><div class="bar-fill" data-width="55"></div></div>
                        </div>
                    </div>
                </div>

                <!-- Tools & Practices -->
                <div class="skill-category">
                    <h3 class="category-title"><i class="fas fa-tools"></i> Tools & Practices</h3>
                    <div class="skill-tags">
                        <span class="tag">Git</span>
                        <span class="tag">OOP Programmin</span>
                        <span class="tag">Azure DevOps</span>
                        <span class="tag">Android Studio</span>
                        <span class="tag">Visual Studio | Visual Studio Code</span>
                        <span class="tag">SDLC</span>
                        <span class="tag">Agile / Scrum</span>
                        <span class="tag">IT Project Management</span>
                        <span class="tag">Information Security</span>
                        <span class="tag">Software Testing</span>
                        <span class="tag">Problem Solving</span>
                        <span class="tag">Open Source Frameworks</span>                        
                    </div>
                </div>
            </div>
        </section>

        <!-- EDUCATION & EXPERIENCE -->
        <section class="edu-exp" id="edu-exp">
            <h2 class="heading"><span>Education & Experience</span></h2>
            <div class="timeline-grid reveal">
                <!-- Education Column -->
                <div class="timeline-column">
                    <h3 class="timeline-title"><i class="fas fa-graduation-cap"></i> Education</h3>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <span class="timeline-date">Jan 2014 – Dec 2016</span>
                                <h4>National Senior Certificate</h4>
                                <p>Humansdorp Senior Secondary School, Humansdorp, Eastern Cape</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <span class="timeline-date">Feb 2019 – Feb 2020</span>
                                <h4>Diploma in Management Skills</h4>
                                <p>Jeffrey's Bay Learning Academy, Jeffrey's Bay, Eastern Cape</p>
                            </div>
                        </div>
                        <div class="timeline-item featured">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <span class="timeline-date">Mar 2021 – Dec 2024</span>
                                <h4>Diploma in Information Technology<br>in Software Development</h4>
                                <p class="institution">IIE Varsity College, Gqeberha, Eastern Cape</p>
                                <p class="qualification-detail">NQF Level 6 · SAQA 74651 · 360 Credits</p>
                            </div>
                        </div>
                    </div>

                    <!-- Key Modules -->
                    <div class="key-modules">
                        <h4 class="modules-title">Key Modules Completed</h4>
                        <div class="module-tags">
                            <span>Programming 1A–2B</span>
                            <span>Applied Programming</span>
                            <span>Database Intro–Advanced</span>
                            <span>Web Dev Intro–Intermediate</span>
                            <span>Open Source Coding Intro–Intermediate</span>
                            <span>System Analysis & Design</span>
                            <span>Human Computer Interaction</span>
                            <span>Software Quality & Testing</span>
                            <span>IT Project Management</span>
                            <span>Information Security</span>
                            <span>Business Information Systems</span>
                            <span>Work Integrated Learning 3A & 3B</span>
                        </div>
                    </div>
                </div>

                <!-- Experience Column -->
                <div class="timeline-column">
                    <h3 class="timeline-title"><i class="fas fa-briefcase"></i> Experience</h3>
                    <div class="timeline">
                        <div class="timeline-item featured">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <span class="timeline-date">Feb 2024 – Nov 2024</span>
                                <h4>Mugged By Courteney</h4>
                                <p class="role">UI/UX Developer · Business Analyst · Secretary</p>
                                <ul class="experience-list">
                                    <li>Bridged communication between stakeholders, developers, and design teams to ensure project alignment and smooth execution</li>
                                    <li>Conducted in-depth business analysis, gathering and documenting functional and non-functional requirements to drive effective software development</li>
                                    <li>Designed and optimized user interfaces (UI/UX) with a focus on usability, accessibility, and intuitive user experience</li>
                                    <li>Managed project documentation, meeting minutes, and key deliverables to ensure clear tracking of progress and decisions</li>
                                    <li>Facilitated feedback collection and usability testing, translating insights into actionable improvements for product refinement</li>
                                    <li>Supported administrative functions, coordinating meetings, managing schedules, and ensuring efficient workflow within the team</li>
                                </ul>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <span class="timeline-date">2019 – 2020</span>
                                <h4>Jeffrey's Bay Learning Academy</h4>
                                <p class="role">Content Instructor</p>
                                <ul class="experience-list">
                                    <li>Delivered instructional content and facilitated learning sessions for management skills diploma students</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICES -->
        <section class="services" id="services">
            <h2 class="heading heading-light"><span>Services</span></h2>
            <div class="services-grid reveal">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-laptop-code"></i></div>
                    <h3>Software Development</h3>
                    <p>Building robust applications using Java, C#, and .NET with clean, maintainable code following industry best practices and OOP principles.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-globe"></i></div>
                    <h3>Web Development</h3>
                    <p>Creating responsive, database-driven websites using HTML, CSS, PHP, and JavaScript with a focus on performance and user experience.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-database"></i></div>
                    <h3>Database Development</h3>
                    <p>Designing, implementing, and optimizing relational databases using MySQL, SQL Server, and Azure Database for scalable data solutions.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-mobile-alt"></i></div>
                    <h3>Mobile App Development</h3>
                    <p>Developing native Android applications using Kotlin and open-source frameworks, integrating REST APIs for dynamic functionality.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-paint-brush"></i></div>
                    <h3>UI/UX Design</h3>
                    <p>Designing intuitive, accessible, and responsive user interfaces grounded in Human-Computer Interaction principles and usability testing.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-chart-line"></i></div>
                    <h3>Business Analysis</h3>
                    <p>Gathering and documenting functional and non-functional requirements, bridging the gap between business needs and technical solutions.</p>
                </div>
            </div>
        </section>

        <!-- PORTFOLIO / PROJECTS -->
<section class="portfolio" id="portfolio">
    <h2 class="heading"><span>Projects</span></h2>

    <!-- ===== CATEGORY 1: CURRENT WORK ===== -->
    <div class="projects-category reveal">
        <h3 class="category-heading"><i class="fas fa-briefcase"></i> Current Work</h3>
        <div class="portfolio-grid">
            
            <div class="project-card">
                <div class="project-image">
                    <img src="assets/projects_logos/Gossip_Website_logo.png" alt="Gossip Website Project">
                    <div class="project-overlay">
                        <button class="project-btn" onclick="window.location.href='/api/views/project_1.php'">
                            View Project <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <div class="project-info">
                    <h3>Gossip Website</h3>
                    <span class="project-type">Web Development · HTML, CSS, PHP</span>
                </div>
            </div>

            <div class="project-card">
                <div class="project-image">
                    <img src="assets/projects_logos/Hatties logo.png" alt="Hatties Project">
                    <div class="project-overlay">
                        <button class="project-btn" onclick="window.location.href='/api/views/project_2.php'">
                            View Project <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <div class="project-info">
                    <h3>Hatties</h3>
                    <span class="project-type">Web Development · HTML, CSS, PHP</span>
                </div>
            </div>

            <div class="project-card">
                <div class="project-image">
                    <img src="assets/projects_logos/k-drama logo.png" alt="K-Drama Project">
                    <div class="project-overlay">
                        <button class="project-btn" onclick="window.location.href='/api/views/project_3.php'">
                            View Project <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <div class="project-info">
                    <h3>K-Drama Platform</h3>
                    <span class="project-type">Web Development · HTML, CSS, PHP</span>
                </div>
            </div>

            <div class="project-card">
                <div class="project-image">
                    <img src="assets/projects_logos/Portfolio logo.png" alt="Portfolio Project">
                    <div class="project-overlay">
                        <button class="project-btn" onclick="window.location.href='/api/views/project_4.php'">
                            View Project <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <div class="project-info">
                    <h3>Personal Portfolio</h3>
                    <span class="project-type">Web Development · HTML, CSS, JavaScript</span>
                </div>
            </div>

        </div>
    </div>

    <!-- ===== CATEGORY 2: SCHOOLING PROJECTS ===== -->
    <div class="projects-category reveal">
        <h3 class="category-heading"><i class="fas fa-graduation-cap"></i> Schooling Projects</h3>
        <p class="category-subtext">A selection of academic assignments and practical projects completed during my Diploma in IT at IIE Varsity College.</p>
        
        <div class="portfolio-grid academic-grid">

            <!-- School Project 1: Java -->
            <div class="project-card academic-card">
                <div class="project-image">
                    <!-- Replace this placeholder div with an <img> tag when you have a screenshot -->
                    <div class="academic-placeholder">
                        <i class="fab fa-java"></i>
                    </div>
                    <div class="project-overlay">
                        <span class="project-badge">Academic</span>
                    </div>
                </div>
                <div class="project-info">
                    <h3>Student Management System</h3>
                    <span class="project-type">Software Development · Java, OOP Principles</span>
                </div>
            </div>

            <!-- School Project 2: Android/Kotlin -->
            <div class="project-card academic-card">
                <div class="project-image">
                    <div class="academic-placeholder">
                        <i class="fab fa-android"></i>
                    </div>
                    <div class="project-overlay">
                        <span class="project-badge">Academic</span>
                    </div>
                </div>
                <div class="project-info">
                    <h3>Task Manager App</h3>
                    <span class="project-type">Mobile Development · Android, Kotlin</span>
                </div>
            </div>

            <!-- School Project 3: C# / .NET -->
            <div class="project-card academic-card">
                <div class="project-image">
                    <div class="academic-placeholder">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <div class="project-overlay">
                        <span class="project-badge">Academic</span>
                    </div>
                </div>
                <div class="project-info">
                    <h3>Inventory Management System</h3>
                    <span class="project-type">Application Dev · C#, .NET, SQL Server</span>
                </div>
            </div>

            <!-- School Project 4: Databases -->
            <div class="project-card academic-card">
                <div class="project-image">
                    <div class="academic-placeholder">
                        <i class="fas fa-database"></i>
                    </div>
                    <div class="project-overlay">
                        <span class="project-badge">Academic</span>
                    </div>
                </div>
                <div class="project-info">
                    <h3>Library Database Design</h3>
                    <span class="project-type">Database Design · MySQL, ERD, SQL Queries</span>
                </div>
            </div>

        </div>
    </div>
</section>

        <!-- CONTACT -->
        <section class="contact" id="contact">
            <h2 class="heading"><span>Get In Touch</span></h2>
            <div class="contact-wrapper reveal">
                <div class="contact-info">
                    <h3>Let's work together</h3>
                    <p>Have a project in mind or looking for a junior developer? I'd love to hear from you. Reach out through any of the channels below or fill in the form.</p>
                    <div class="contact-details">
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <span>Email</span>
                                <a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJNwfTrLCcJWtmTGlDsmhJBqzpZZjLQWGnjNFPfBwbcnRWnCZGhgRkzwMrlztFzPWNXzqrg" target="_blank" rel="noopener">j.plaatjies08@gmail.com</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <span>Phone</span>
                                <a href="tel:+27724261880">072 426 1880</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <span>Location</span>
                                <p>Jeffrey's Bay, Eastern Cape, South Africa</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fab fa-github"></i>
                            <div>
                                <span>GitHub</span>
                                <a href="https://github.com/Justinsimplyis" target="_blank" rel="noopener">github.com/Justinsimplyis</a>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="contact-form" id="contact-form" novalidate>
                    <input type="hidden" name="action" value="send_contact">
                    
                    <!-- Honeypot anti-spam (invisible to users) -->
                    <input type="text" name="website" style="display:none;" tabindex="-1" autocomplete="off">

                    <div class="form-row">
                        <input type="text" name="name" placeholder="Your Name" class="form-box" required>
                        <input type="email" name="email" placeholder="Your Email" class="form-box" required>
                    </div>
                    <input type="text" name="subject" placeholder="Subject" class="form-box" required>
                    <textarea name="message" class="form-box" rows="6" placeholder="Your Message" required></textarea>
                    <button type="submit" class="btn btn-primary btn-full" id="contact-submit-btn">
                        Send Message <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
                
                <!-- AJAX Response Message -->
                <div class="form-message" id="contact-message-ajax" style="display:none;" role="alert"></div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-inner">
            <p>&copy; <span id="year"></span> <span>Justin Plaatjies</span>. All Rights Reserved.</p>            
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>