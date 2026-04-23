/* PROJECT DETAIL PAGE JS */

document.addEventListener('DOMContentLoaded', () => {

    // ---- Elements ----
    const yearSpan = document.getElementById('year');
    const demoBtn = document.getElementById('demo-btn');
    const demoModal = document.getElementById('demo-modal');
    const modalClose = document.getElementById('modal-close');
    const suggestionForm = document.getElementById('suggestion-form');
    const revealElements = document.querySelectorAll('.reveal');

    // ---- Set year ----
    if (yearSpan) yearSpan.textContent = new Date().getFullYear();

    // ---- Demo Modal ----
    function openModal() {
        demoModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        demoModal.classList.remove('active');
        document.body.style.overflow = '';
    }

    if (demoBtn) demoBtn.addEventListener('click', (e) => {
        e.preventDefault();
        openModal();
    });

    if (modalClose) modalClose.addEventListener('click', closeModal);

    if (demoModal) demoModal.addEventListener('click', (e) => {
        if (e.target === demoModal) closeModal();
    });

    // ---- Scroll Reveal ----
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -40px 0px'
    });

    revealElements.forEach(el => revealObserver.observe(el));

    // ---- Suggestion Form ----
    if (suggestionForm) {
        suggestionForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const btn = suggestionForm.querySelector('button[type="submit"]');
            const originalHTML = btn.innerHTML;

            // Success state
            btn.innerHTML = 'Feedback Submitted! <i class="fas fa-check"></i>';
            btn.style.backgroundColor = '#22c55e';
            btn.style.borderColor = '#22c55e';
            btn.disabled = true;
            suggestionForm.reset();

            // Reset after 3 seconds
            setTimeout(() => {
                btn.innerHTML = originalHTML;
                btn.style.backgroundColor = '';
                btn.style.borderColor = '';
                btn.disabled = false;
            }, 3000);
        });
    }

    // ---- Screenshot / View Lightbox ----
    const viewLightbox = document.getElementById('view-lightbox');
    const viewLightboxImg = document.getElementById('view-lightbox-img');
    const viewLightboxCaption = document.getElementById('view-lightbox-caption');
    const viewLightboxCounter = document.getElementById('view-lightbox-counter');
    const viewLightboxCloseBtn = document.getElementById('view-lightbox-close');
    const viewLightboxPrevBtn = document.getElementById('view-lightbox-prev');
    const viewLightboxNextBtn = document.getElementById('view-lightbox-next');

    let viewImages = [];
    let currentViewIndex = 0;

    function collectViewImages() {
        viewImages = [];
        document.querySelectorAll('[data-view]').forEach(el => {
            const img = el.tagName === 'IMG' ? el : el.querySelector('img');
            if (img && img.src) {
                viewImages.push({
                    src: img.src,
                    caption: el.getAttribute('data-caption') || ''
                });
            }
        });
    }

    function openViewLightbox(index) {
        collectViewImages();
        if (index < 0) index = 0;
        if (index >= viewImages.length) index = viewImages.length - 1;
        currentViewIndex = index;
        updateViewLightbox();
        viewLightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeViewLightbox() {
        viewLightbox.classList.remove('active');
        document.body.style.overflow = '';
    }

    function updateViewLightbox() {
        const item = viewImages[currentViewIndex];
        viewLightboxImg.src = item.src;
        viewLightboxImg.alt = item.caption;
        viewLightboxCaption.textContent = item.caption;
        viewLightboxCounter.textContent = (currentViewIndex + 1) + ' / ' + viewImages.length;
    }

    document.addEventListener('click', (e) => {
        const target = e.target.closest('[data-view]');
        if (target) {
            e.preventDefault();
            collectViewImages();
            const img = target.tagName === 'IMG' ? target : target.querySelector('img');
            if (img) {
                for (let i = 0; i < viewImages.length; i++) {
                    if (viewImages[i].src === img.src) {
                        openViewLightbox(i);
                        return;
                    }
                }
            }
            openViewLightbox(0);
        }
    });

    if (viewLightboxCloseBtn) viewLightboxCloseBtn.addEventListener('click', closeViewLightbox);
    
    if (viewLightboxPrevBtn) viewLightboxPrevBtn.addEventListener('click', () => {
        currentViewIndex = (currentViewIndex - 1 + viewImages.length) % viewImages.length;
        updateViewLightbox();
    });
    
    if (viewLightboxNextBtn) viewLightboxNextBtn.addEventListener('click', () => {
        currentViewIndex = (currentViewIndex + 1) % viewImages.length;
        updateViewLightbox();
    });

    if (viewLightbox) viewLightbox.addEventListener('click', (e) => {
        if (e.target === viewLightbox) closeViewLightbox();
    });

    // Global keyboard shortcuts
    document.addEventListener('keydown', (e) => {
        // Close lightboxes on Escape
        if (e.key === 'Escape') {
            if (viewLightbox && viewLightbox.classList.contains('active')) {
                closeViewLightbox();
                return;
            }
            if (demoModal && demoModal.classList.contains('active')) {
                closeModal();
                return;
            }
        }
        
        // Navigate lightbox images with arrows
        if (viewLightbox && viewLightbox.classList.contains('active')) {
            if (e.key === 'ArrowLeft') {
                currentViewIndex = (currentViewIndex - 1 + viewImages.length) % viewImages.length;
                updateViewLightbox();
            }
            if (e.key === 'ArrowRight') {
                currentViewIndex = (currentViewIndex + 1) % viewImages.length;
                updateViewLightbox();
            }
        }
    });

});