<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Justin Plaatjies | Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
    <style> 
        /* ============================================
   ROOT VARIABLES & RESET
   ============================================ */
:root {
    /* ── NEW: Midnight Ice Palette ────────────────────── */
    --accent: #06b6d4;       /* Electric Cyan */
    --accent-dark: #0e7490;  /* Deep Teal */
    --accent-light: #cffafe; /* Icy Mist */

    /* ── COMPATIBILITY LAYER ─────────────────────────── */
    --yellow: var(--accent);
    --yellow-dark: var(--accent-dark);
    --yellow-light: var(--accent-light);

    /* ── Backgrounds (No more pure black/white) ──────── */
    --black: #111111;         /* Deep charcoal */
    --white: #fafafa;         /* Off-white */
    --light-bg: #f4f4f5;      /* Cool light gray */

    /* ── Grays (Zinc Scale - optimized for typography) ─── */
    --gray-100: #f4f4f5;
    --gray-200: #e4e4e7;
    --gray-300: #d4d4d8;
    --gray-500: #71717a;
    --gray-700: #3f3f46;
    --gray-900: #18181b;

    /* ── Dark Mode Text Colors ──────────────────────────── */
    --dark-text-primary: #e4e4e7;   
    --dark-text-secondary: #a1a1aa; 
    --dark-text-muted: #71717a;     
    --dark-text-faint: #52525b;     
    
    /* ── Dark Mode Borders ───────────────────────────── */
    --dark-border: #27272a;          
    --dark-border-hover: #3f3f46;    

    /* ── Structural ──────────────────────────────────────── */
    --sidebar-width: 32rem;
    --border-bold: 0.4rem solid var(--gray-900);
    --border-light: 0.2rem solid var(--gray-300);
    --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
    --shadow-md: 0 4px 16px rgba(0,0,0,0.1);
    --shadow-lg: 0 8px 30px rgba(0,0,0,0.12);
    --shadow-xl: 0 20px 60px rgba(0,0,0,0.15);
    --radius: 0.8rem;
    --transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

*,
*::before,
*::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    font-size: 62.5%;
    scroll-behavior: smooth;
    overflow-x: hidden;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    color: var(--gray-900);
    background-color: var(--white);
    line-height: 1.6;
    text-decoration: none;
    overflow-x: hidden;
}

::selection {
    background-color: var(--black);
    color: var(--yellow);
}

::-webkit-scrollbar {
    width: 0.8rem;
}
::-webkit-scrollbar-track {
    background: transparent;
}
::-webkit-scrollbar-thumb {
    background-color: var(--yellow);
    border-radius: 10px;
}

img {
    display: block;
    max-width: 100%;
}

a {
    text-decoration: none;
    color: inherit;
}

/* ============================================
   SIDEBAR HEADER (Floating Glassmorphism)
   ============================================ */
.header {
    position: fixed;
    top: 0;
    left: calc(-1 * var(--sidebar-width));
    width: var(--sidebar-width);
    height: 100vh;
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-right: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 5px 0 30px rgba(0, 0, 0, 0.08);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    padding: 3rem 2rem;
    z-index: 1000;
    transition: left var(--transition);
}

.header.active {
    left: 0;
}

.header-top {
    text-align: center;
    width: 100%;
}

.header-avatar {
    width: 14rem;
    height: 14rem;
    margin: 0 auto 1.5rem;
    border-radius: 50%;
    overflow: hidden;
    border: var(--border-bold);
    background: var(--light-bg);
}

.header-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    background-color: var(--black);
}

.logo {
    display: inline-block;
    font-family: 'Playfair Display', serif;
    font-size: 5rem;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: -0.02em;
    border-bottom: var(--border-bold);
    line-height: 1.1;
    padding-bottom: 0.5rem;
}

.header-tagline {
    font-size: 1.3rem;
    font-weight: 500;
    color: var(--gray-500);
    margin-top: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.15em;
}

/* Hamburger Menu (Floating Pill) */
.menu-toggle {
    position: absolute;
    top: 1.5rem;
    right: -4.5rem;
    width: 4.5rem;
    height: 4.5rem;
    background-color: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: 100px;
    box-shadow: var(--shadow-md);
    cursor: pointer;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    z-index: 1001;
    transition: var(--transition);
}

.menu-toggle .bar {
    display: block;
    width: 1.8rem;
    height: 0.15rem;
    background-color: var(--gray-700);
    transition: var(--transition);
    border-radius: 2px;
}

.menu-toggle.active .bar:nth-child(1) {
    transform: rotate(45deg) translate(0.5rem, 0.5rem);
}
.menu-toggle.active .bar:nth-child(2) {
    opacity: 0;
}
.menu-toggle.active .bar:nth-child(3) {
    transform: rotate(-45deg) translate(0.5rem, -0.5rem);
}

/* Navbar (Soft Pills) */
.navbar a {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-size: 1.5rem;
    font-weight: 500;
    padding: 0.9rem 1.2rem;
    margin: 0.2rem 0;
    border-radius: 0.6rem;
    color: var(--gray-500);
    transition: var(--transition);
    text-transform: none;
}

.navbar a i {
    font-size: 1.3rem;
    width: 2rem;
    text-align: center;
}

.navbar a:hover,
.navbar a.active {
    background: rgba(6, 182, 212, 0.06);
    color: var(--gray-900);
    transform: translateX(0);
}

/* Social Links */
.follow {
    display: flex;
    gap: 1.5rem;
}

.follow a {
    font-size: 2rem;
    color: var(--gray-700);
    transition: var(--transition);
}

.follow a:hover {
    color: var(--black);
    transform: rotate(15deg) scale(1.15);
}

/* Overlay (Soft Wash + Blur) */
.overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
    z-index: 999;
    opacity: 0;
    visibility: hidden;
    transition: var(--transition);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
}

.overlay.active {
    opacity: 1;
    visibility: visible;
}

/* MAIN CONTENT (No Shift) */
.main-content {
    transition: none;
}

body.sidebar-open .main-content {
    padding-left: 0; 
}

/* SECTION COMMON */
section {
    padding: 6rem 3rem;
    max-width: 1200px;
    margin: 0 auto;
}

.heading {
    margin-bottom: 4rem;
    text-align: center;
}

.heading span {
    font-family: 'Playfair Display', serif;
    font-size: 5rem;
    font-size: clamp(3rem, 5vw, 5rem);
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: -0.02em;
    border-bottom: var(--border-bold);
    display: inline-block;
    padding-bottom: 0.5rem;
}

.heading-light span {
    color: var(--dark-text-primary);
    border-bottom-color: var(--accent);
}

/* BUTTONS */
.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    padding: 1.2rem 3rem;
    font-family: 'Inter', sans-serif;
    font-size: 1.5rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    cursor: pointer;
    border: var(--border-light);
    background: transparent;
    color: var(--black);
    transition: var(--transition);
    border-radius: 2rem;
}

.btn-primary {
    background-color: var(--black);
    color: var(--white);
    border-color: var(--black);
}

.btn-primary:hover {
    background-color: var(--accent);
    color: var(--black);
    border-color: var(--accent);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.btn-outline {
    border-color: var(--black);
}

.btn-outline:hover {
    background-color: var(--black);
    color: var(--white);
    transform: translateY(-2px);
}

.btn-full {
    width: 100%;
    justify-content: center;
}

/* HOME SECTION */
.home {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding-top: 4rem;
    padding-bottom: 2rem;
}

.home-inner {
    display: flex;
    align-items: center;
    gap: 5rem;
    flex-wrap: wrap;
}

.home .image {
    flex: 1 1 38rem;
}

.home .image img {
    width: 100%;
    max-height: 60rem;
    object-fit: cover;
    border: var(--border-bold);
    padding: 1rem;
    background: var(--black);
}

.home .content {
    flex: 1 1 38rem;
}

.home .greeting {
    font-size: 1.6rem;
    font-weight: 500;
    color: var(--gray-500);
    text-transform: uppercase;
    letter-spacing: 0.2em;
    margin-bottom: 0.5rem;
}

.home .content h1 {
    font-family: 'Playfair Display', serif;
    font-size: 5.5rem;
    font-size: clamp(3.5rem, 5.5vw, 5.5rem);
    font-weight: 900;
    line-height: 1.05;
    text-transform: uppercase;
    letter-spacing: -0.02em;
    margin-bottom: 1.5rem;
}

.role-wrapper {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 2rem;
}

.role-tag {
    display: inline-block;
    padding: 0.6rem 1.5rem;
    background-color: var(--accent);
    font-size: 1.3rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.role-divider {
    font-size: 1.5rem;
    color: var(--gray-300);
    font-weight: 300;
}

.home .description {
    font-size: 1.55rem;
    line-height: 1.8;
    color: var(--gray-700);
    margin-bottom: 2.5rem;
    max-width: 50rem;
}

.home-actions {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
    margin-bottom: 3rem;
}

.home-stats {
    display: flex;
    gap: 3rem;
    flex-wrap: wrap;
    padding-top: 2rem;
    border-top: var(--border-light);
}

.stat {
    text-align: center;
}

.stat-number {
    display: block;
    font-family: 'Playfair Display', serif;
    font-size: 2.8rem;
    font-weight: 800;
    color: var(--black);
    line-height: 1.2;
}

.stat-label {
    font-size: 1.1rem;
    color: var(--gray-500);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    font-weight: 500;
}

.scroll-indicator {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.8rem;
    margin-top: 3rem;
    color: var(--gray-500);
    font-size: 1.2rem;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    font-weight: 500;
}

.scroll-indicator i {
    animation: bounceDown 1.5s infinite;
}

@keyframes bounceDown {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(6px); }
}

/* ============================================
   ABOUT SECTION (Grounded White)
   ============================================ */
.about {
    background-color: #ffffff;
    max-width: 100%;
    padding-left: calc((100% - 1200px) / 2 + 3rem);
    padding-right: calc((100% - 1200px) / 2 + 3rem);
    box-shadow: 0 -0.1rem 0 0 rgba(6, 182, 212, 0.15);
    border-top: 0.2rem solid rgba(6, 182, 212, 0.08);
}

.bio-text {
    font-size: 1.6rem;
    line-height: 1.9;
    color: var(--gray-900);
    max-width: 75rem;
    margin: 0 auto 3rem;
    text-align: left;
}

.bio-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
    gap: 1.2rem;
    max-width: 80rem;
    margin: 0 auto;
}

.bio-item {
    display: flex;
    align-items: center;
    gap: 1.2rem;
    padding: 1.5rem;
    background: var(--white);
    border: 0.1rem solid var(--gray-200);
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
}

.bio-item:hover {
    border-color: var(--gray-300);
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
}

.bio-item i {
    font-size: 1.8rem;
    color: var(--accent-dark);
    width: 3rem;
    text-align: center;
    flex-shrink: 0;
}

.bio-label {
    display: block;
    font-size: 1.1rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--gray-500);
    margin-bottom: 0.2rem;
}

.bio-value {
    font-size: 1.45rem;
    font-weight: 500;
    color: var(--gray-900);
}

/* ============================================
   SKILLS SECTION
   ============================================ */
.skills-section {
    max-width: 100%;
    background-color: var(--white);
    padding-left: calc((100% - 1200px) / 2 + 3rem);
    padding-right: calc((100% - 1200px) / 2 + 3rem);
}

.skills-categories {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
    gap: 2.5rem;
    max-width: 1000px;
    margin: 0 auto;
}

.skill-category {
    padding: 2rem;
    border: 0.1rem solid var(--gray-200);
    transition: var(--transition);
}

.skill-category:hover {
    border-color: var(--gray-400);
    box-shadow: var(--shadow-md);
}

.category-title {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.8rem;
    text-transform: none;
}

.category-title i {
    color: var(--accent-dark);
    font-size: 1.8rem;
}

.skill-bars {
    display: flex;
    flex-direction: column;
    gap: 1.2rem;
}

.skill-bar {
    width: 100%;
}

.skill-info {
    display: flex;
    justify-content: space-between;
    font-size: 1.35rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.skill-info span:last-child {
    color: var(--gray-500);
    font-weight: 600;
}

.bar-track {
    width: 100%;
    height: 0.8rem;
    background-color: var(--gray-200);
    overflow: hidden;
}

.bar-fill {
    height: 100%;
    width: 0;
    background: linear-gradient(90deg, var(--accent), var(--accent-dark));
    transition: width 1.2s cubic-bezier(0.4, 0, 0.2, 1);
}

.bar-fill.animated {
    /* width set by JS via data-width */
}

.skill-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.8rem;
}

.tag {
    display: inline-block;
    padding: 0.6rem 1.2rem;
    font-size: 1.3rem;
    font-weight: 500;
    background-color: var(--accent-light);
    border: 0.1rem solid var(--accent-dark);
    color: var(--gray-900);
    transition: var(--transition);
}

.tag:hover {
    background-color: var(--accent);
    transform: translateY(-1px);
}

/* ============================================
   EDUCATION & EXPERIENCE
   ============================================ */
.edu-exp {
    background-color: var(--light-bg);
    max-width: 100%;
    padding-left: calc((100% - 1200px) / 2 + 3rem);
    padding-right: calc((100% - 1200px) / 2 + 3rem);
}

.timeline-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
}

.timeline-column {
    min-width: 0;
}

.timeline-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.4rem;
    font-weight: 700;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 0.8rem;
    text-transform: none;
}

.timeline-title i {
    color: var(--accent-dark);
}

.timeline {
    position: relative;
    padding-left: 2.5rem;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 0.5rem;
    top: 0;
    bottom: 0;
    width: 0.2rem;
    background-color: var(--gray-300);
}

.timeline-item {
    position: relative;
    margin-bottom: 2.5rem;
}

.timeline-item:last-child {
    margin-bottom: 0;
}

.timeline-dot {
    position: absolute;
    left: -2.1rem;
    top: 0.5rem;
    width: 1.2rem;
    height: 1.2rem;
    border-radius: 50%;
    background-color: var(--white);
    border: 0.3rem solid var(--gray-500);
    z-index: 1;
}

.timeline-item.featured .timeline-dot {
    background-color: var(--accent);
    border-color: var(--black);
    width: 1.4rem;
    height: 1.4rem;
    left: -2.2rem;
}

.timeline-content {
    background: var(--white);
    border: 0.1rem solid var(--gray-200);
    padding: 2rem;
    transition: var(--transition);
}

.timeline-content:hover {
    border-color: var(--gray-400);
    box-shadow: var(--shadow-md);
}

.timeline-date {
    display: inline-block;
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--accent-dark);
    background: var(--accent-light);
    padding: 0.3rem 1rem;
    margin-bottom: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.timeline-content h4 {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-transform: none;
}

.timeline-content .institution {
    font-weight: 600;
    color: var(--gray-900);
}

.qualification-detail {
    font-size: 1.25rem;
    color: var(--gray-500);
    font-style: italic;
    margin-top: 0.3rem;
}

.timeline-content p {
    font-size: 1.4rem;
    color: var(--gray-700);
    line-height: 1.6;
}

.role {
    font-weight: 600;
    font-size: 1.3rem;
    color: var(--gray-500);
    margin-bottom: 0.8rem;
}

.experience-list {
    list-style: none;
    padding: 0;
    margin-top: 0.8rem;
}

.experience-list li {
    font-size: 1.35rem;
    color: var(--gray-700);
    line-height: 1.6;
    padding: 0.4rem 0;
    padding-left: 1.5rem;
    position: relative;
}

.experience-list li::before {
    content: '▸';
    position: absolute;
    left: 0;
    color: var(--accent-dark);
    font-weight: 700;
}

/* Key Modules */
.key-modules {
    margin-top: 3rem;
    padding: 2rem;
    background: var(--white);
    border: 0.1rem solid var(--gray-200);
}

.modules-title {
    font-size: 1.5rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 1.2rem;
    text-transform: none;
}

.module-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.6rem;
}

.module-tags span {
    display: inline-block;
    padding: 0.5rem 1rem;
    font-size: 1.2rem;
    font-weight: 500;
    background: var(--gray-100);
    color: var(--gray-700);
    border-left: 0.3rem solid var(--accent);
}

/* ============================================
   SERVICES SECTION (Dark Mode Optimized)
   ============================================ */
.services {
    max-width: 100%;
    background-color: var(--black);
    padding-left: calc((100% - 1200px) / 2 + 3rem);
    padding-right: calc((100% - 1200px) / 2 + 3rem);
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(28rem, 1fr));
    gap: 2rem;
}

.service-card {
    padding: 3rem 2rem;
    border-color: var(--dark-border);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.service-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 0.3rem;
    background: var(--accent);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.4s ease;
}

.service-card:hover::before {
    transform: scaleX(1);
}

.service-card:hover {
    border-color: var(--accent);
    transform: translateY(-4px);
    box-shadow: 0 8px 30px rgba(6, 182, 212, 0.08);
}

.service-icon {
    font-size: 3rem;
    color: var(--accent);
    margin-bottom: 1.5rem;
}

.service-card h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--dark-text-primary);
    margin-bottom: 1rem;
    text-transform: none;
}

.service-card p {
    font-size: 1.4rem;
    color: var(--dark-text-secondary);
    line-height: 1.7;
}

/* ============================================
   PORTFOLIO SECTION
   ============================================ */
.portfolio {
    background-color: var(--white);
}

.portfolio-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(26rem, 1fr));
    gap: 2rem;
}

/* PROJECTS CATEGORY STYLES */
.projects-category {
    margin-bottom: 5rem;
}

.category-heading {
    font-family: 'Playfair Display', serif;
    font-size: 3rem;
    font-size: clamp(2.2rem, 3vw, 3rem);
    text-transform: uppercase;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 1.5rem;
    color: var(--black);
}

.category-heading i {
    font-size: 3rem;
    color: var(--accent);
    background-color: var(--black);
    width: 6rem;
    height: 6rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

.category-subtext {
    font-size: 1.5rem;
    color: var(--gray-500);
    margin-bottom: 3rem;
    max-width: 600px;
    line-height: 1.6;
}

.academic-placeholder {
    width: 100%;
    height: 100%;
    min-height: 25rem; 
    background-color: var(--light-bg);
    border: 0.2rem dashed var(--gray-300); /* FIXED: Was hardcoded #ccc */
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--gray-500); /* FIXED: Was hardcoded #bbb */
}

.academic-placeholder i {
    font-size: 6rem;
    transition: all .3s ease;
}

.academic-card:hover .academic-placeholder {
    background-color: var(--black);
    border-color: var(--accent);
}

.academic-card:hover .academic-placeholder i {
    color: var(--accent);
    transform: scale(1.1);
}

.project-badge {
    padding: .8rem 2rem;
    background-color: var(--accent);
    color: var(--black);
    font-size: 1.2rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .1rem;
}

.project-card {
    border: 0.1rem solid var(--gray-200);
    overflow: hidden;
    transition: var(--transition);
    background: var(--white);
}

.project-card:hover {
    border-color: var(--gray-400);
    box-shadow: var(--shadow-lg);
    transform: translateY(-4px);
}

.project-image {
    position: relative;
    overflow: hidden;
    height: 25rem;
    background: var(--light-bg);
}

.project-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.project-card:hover .project-image img {
    transform: scale(1.05);
}

.project-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition);
}

.project-card:hover .project-overlay {
    opacity: 1;
}

.project-btn {
    padding: 1.2rem 2.5rem;
    background: var(--accent);
    color: var(--black);
    border: none;
    border-radius: 1rem;
    font-size: 1.4rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.8rem;
    transition: var(--transition);
    transform: translateY(1rem);
}

.project-card:hover .project-btn {
    transform: translateY(0);
}

.project-btn:hover {
    background: var(--white);
    color: var(--black);
    box-shadow: var(--shadow-md);
}

.project-info {
    padding: 1.5rem;
}

.project-info h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.7rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-transform: none;
}

.project-type {
    font-size: 1.25rem;
    color: var(--gray-500);
    font-weight: 500;
}

/* ============================================
   CONTACT SECTION (Grounded White)
   ============================================ */
.contact {
    background-color: #ffffff;
    max-width: 100%;
    padding-left: calc((100% - 1200px) / 2 + 3rem);
    padding-right: calc((100% - 1200px) / 2 + 3rem);
    box-shadow: 0 -0.1rem 0 0 rgba(6, 182, 212, 0.15);
    border-top: 0.2rem solid rgba(6, 182, 212, 0.08);
}

.contact-wrapper {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 4rem;
    align-items: start;
}

.contact-info h3 {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
    text-transform: none;
}

.contact-info > p {
    font-size: 1.5rem;
    color: var(--gray-900);
    line-height: 1.7;
    margin-bottom: 2.5rem;
}

.contact-details {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 1.2rem;
}

.contact-item i {
    font-size: 1.6rem;
    color: var(--accent-dark);
    width: 2.5rem;
    height: 2.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--accent-light);
    flex-shrink: 0;
    margin-top: 0.2rem;
}

.contact-item span {
    display: block;
    font-size: 1.1rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--black);
    margin-bottom: 0.2rem;
}

.contact-item a,
.contact-item p {
    font-size: 1.4rem;
    color: var(--gray-900);
    font-weight: 500;
    transition: var(--transition);
}

.contact-item a:hover {
    color: var(--accent-dark);
}

/* Contact Form */
.contact-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.form-row {
    display: flex;
    gap: 1rem;
}

.form-box {
    width: 100%;
    padding: 1.3rem 1.5rem;
    font-family: 'Inter', sans-serif;
    font-size: 1.5rem;
    border: 0.1rem solid var(--gray-300); /* FIXED: Was var(--black) */
    background: var(--white);
    color: var(--black);
    transition: var(--transition);
    resize: none;
}

.form-box:focus {
    border-color: var(--accent-dark);
    box-shadow: inset 0 0 0 0.1rem var(--accent-dark);
    outline: none;
}

.form-box::placeholder {
    color: var(--gray-500); /* FIXED: Was var(--gray-300) */
    text-transform: none;
    font-weight: 400;
}

/* FOOTER (Dark Mode Optimized) */
.footer {
    background-color: var(--black);
    padding: 2.5rem 3rem;
    border-top: 0.1rem solid var(--dark-border); /* FIXED: Had none */
}

.footer-inner {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.footer p {
    font-size: 1.3rem;
    color: var(--dark-text-muted);
}

.footer span {
    color: var(--accent); /* FIXED: Was var(--yellow) */
    font-weight: 600;
}

/* REVEAL ANIMATION */
.reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.7s ease, transform 0.7s ease;
}

.reveal.visible {
    opacity: 1;
    transform: translateY(0);
}

/* ============================================
   RESPONSIVE
   ============================================ */
@media (max-width: 991px) {
    html {
        font-size: 55%;
    }

    body.sidebar-open .main-content {
        padding-left: 0;
    }

    .home .content h1 {
        font-size: 4.5rem;
    }

    .heading span {
        font-size: 4rem;
    }

    .timeline-grid {
        grid-template-columns: 1fr;
        gap: 3rem;
    }

    .contact-wrapper {
        grid-template-columns: 1fr;
        gap: 3rem;
    }
}

@media (max-width: 768px) {
    /* Drop the glass effect on mobile, use solid dark theme for better performance & contrast */
    .header {
        background-color: var(--black);
        backdrop-filter: none;
        -webkit-backdrop-filter: none;
        border-right: none;
        box-shadow: 5px 0 30px rgba(0,0,0,0.4);
    }

    /* Ensure text stays visible on the dark mobile sidebar */
    .logo,
    .navbar a,
    .navbar a:hover,
    .navbar a.active {
        color: var(--white);
    }
    
    .navbar a:hover,
    .navbar a.active {
        background: rgba(255, 255, 255, 0.08);
        color: var(--accent);
    }

    .menu-toggle {
        background-color: var(--gray-900);
        border-color: var(--gray-700);
    }

    .menu-toggle .bar {
        background-color: var(--white);
    }

    .header-tagline {
        color: var(--dark-text-muted);
    }

    .follow a {
        color: var(--dark-text-secondary);
    }
    .follow a:hover {
        color: var(--accent);
    }

    section {
        padding: 5rem 2rem;
    }

    .about,
    .skills-section,
    .edu-exp,
    .services,
    .contact {
        padding-left: 2rem;
        padding-right: 2rem;
    }

    .home-inner {
        flex-direction: column-reverse;
        text-align: center;
    }

    .home .description {
        margin-left: auto;
        margin-right: auto;
    }

    .home-actions {
        justify-content: center;
    }

    .home-stats {
        justify-content: center;
    }

    .role-wrapper {
        justify-content: center;
    }

    .bio-grid {
        grid-template-columns: 1fr;
    }

    .skills-categories {
        grid-template-columns: 1fr;
    }

    .portfolio-grid {
        grid-template-columns: 1fr;
    }

    .form-row {
        flex-direction: column;
    }

    .footer-inner {
        flex-direction: column;
        text-align: center;
    }
}

@media (max-width: 450px) {
    html {
        font-size: 50%;
    }

    .heading span {
        font-size: 3.2rem;
    }

    .home .content h1 {
        font-size: 3.5rem;
    }

    .home .image img {
        max-height: 30rem;
    }

    .home-stats {
        gap: 2rem;
    }
}
    </style>
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
            <a href="/api/suggestions/suggestions.php">    <i class="fas fa-comments"></i> 
            <span>Suggestions</span></a>
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
                    I am a motivated Information Technology graduate from the IIE Varsity College in Nelson Mandela Bay Campus in Gqeberha, 
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
            <div class="project-card">
                <div class="project-image">
                    <img src="assets/projects_logos/hubify.png" alt="Portfolio Project">
                    <div class="project-overlay">
                        <button class="project-btn" onclick="window.location.href='/api/views/project_5.php'">
                            View Project <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <div class="project-info">
                    <h3>Hubidy</h3>
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

    <script > 
        /* PORTFOLIO JS — Menu, Scroll, Animations */

document.addEventListener('DOMContentLoaded', () => {

    // ---- Elements ----
    const header = document.getElementById('header');
    const menuBtn = document.getElementById('menu-btn');
    const overlay = document.getElementById('overlay');
    const navbar = document.getElementById('navbar');
    const navLinks = navbar.querySelectorAll('a');
    const sections = document.querySelectorAll('section');
    const revealElements = document.querySelectorAll('.reveal');
    const skillBars = document.querySelectorAll('.bar-fill');
    const yearSpan = document.getElementById('year');

    // ---- Set current year ----
    if (yearSpan) yearSpan.textContent = new Date().getFullYear();

    // ---- Sidebar Toggle ----
    function openSidebar() {
        header.classList.add('active');
        menuBtn.classList.add('active');
        overlay.classList.add('active');
        document.body.classList.add('sidebar-open');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        header.classList.remove('active');
        menuBtn.classList.remove('active');
        overlay.classList.remove('active');
        document.body.classList.remove('sidebar-open');
        document.body.style.overflow = '';
    }

    menuBtn.addEventListener('click', () => {
        if (header.classList.contains('active')) {
            closeSidebar();
        } else {
            openSidebar();
        }
    });

    overlay.addEventListener('click', closeSidebar);

    // Close sidebar on nav link click
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            closeSidebar();
        });
    });

    // ---- Active Nav Link on Scroll ----
    function updateActiveNav() {
        let current = '';
        const scrollY = window.scrollY;

        sections.forEach(section => {
            const sectionTop = section.offsetTop - 150;
            const sectionHeight = section.offsetHeight;
            if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            const href = link.getAttribute('href');
            if (href === '#' + current) {
                link.classList.add('active');
            }
        });
    }

    // ---- Scroll Reveal ----
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');

                // Animate skill bars inside this element
                const bars = entry.target.querySelectorAll('.bar-fill');
                bars.forEach(bar => {
                    const width = bar.getAttribute('data-width');
                    bar.style.width = width + '%';
                    bar.classList.add('animated');
                });
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    });

    revealElements.forEach(el => revealObserver.observe(el));

    // Also observe skill section for bar animations
    const skillSection = document.getElementById('skills-section');
    if (skillSection) {
        const skillObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    skillBars.forEach(bar => {
                        const width = bar.getAttribute('data-width');
                        setTimeout(() => {
                            bar.style.width = width + '%';
                        }, 200);
                    });
                    skillObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
        skillObserver.observe(skillSection);
    }

    // ---- Scroll Event (throttled) ----
    let scrollTicking = false;
    window.addEventListener('scroll', () => {
        if (!scrollTicking) {
            window.requestAnimationFrame(() => {
                updateActiveNav();
                scrollTicking = false;
            });
            scrollTicking = true;
        }
    });

    // ---- Initial call ----
    updateActiveNav();
    

     // ---- Contact Form (Real AJAX) ----
    if (contactForm && contactBtn && contactMsg) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            if (!contactForm.checkValidity()) {
                contactForm.reportValidity();
                return;
            }

            contactBtn.classList.add('is-loading');
            contactBtn.disabled = true;
            contactMsg.style.display = 'none';

            const formData = new FormData(contactForm);

            fetch('/api/handler/contact_handler.php', {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                body: formData,
            })
            .then((res) => {
                if (!res.ok) throw new Error('Server error');
                return res.json();
            })
            .then((data) => {
                showContactMessage(data.success, data.message);
                if (data.success) contactForm.reset();
            })
            .catch(() => {
                showContactMessage(false, 'Something went wrong. Please try again.');
            })
            .finally(() => {
                contactBtn.classList.remove('is-loading');
                contactBtn.disabled = false;
            });
        });

        function showContactMessage(isSuccess, text) {
            contactMsg.style.display = 'flex';
            contactMsg.className = 'form-message form-message--' + (isSuccess ? 'success' : 'error');
            contactMsg.innerHTML =
                '<i class="fas fa-' + (isSuccess ? 'check-circle' : 'exclamation-circle') + '"></i>' +
                '<span>' + text + '</span>';

            contactMsg.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

            if (isSuccess) {
                setTimeout(() => { contactMsg.style.display = 'none'; }, 6000);
            }
        }
    }

});
    </script>
</body>
</html>