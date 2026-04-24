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