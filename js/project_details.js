document.addEventListener('DOMContentLoaded', () => {

    // ---- Elements ----
    const yearSpan = document.getElementById('year');
    const demoBtn = document.getElementById('demo-btn');
    const demoModal = document.getElementById('demo-modal');
    const modalClose = document.getElementById('modal-close');
    const suggestionForm = document.getElementById('suggestion-form');
    const submitBtn = document.getElementById('submit-btn');
    const formMsgBox = document.getElementById('form-message-ajax');
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

    // ---- Suggestion Form (Real AJAX) ----
    if (suggestionForm && submitBtn && formMsgBox) {
        suggestionForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Basic client-side check
            if (!suggestionForm.checkValidity()) {
                suggestionForm.reportValidity();
                return;
            }

            // Loading state
            submitBtn.classList.add('is-loading');
            submitBtn.disabled = true;
            formMsgBox.style.display = 'none';

            const formData = new FormData(suggestionForm);

            fetch(window.location.href, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: formData,
            })
            .then((res) => {
                if (!res.ok) throw new Error('Server error');
                return res.json();
            })
            .then((data) => {
                showFormMessage(data.success, data.message);
                if (data.success) suggestionForm.reset();
            })
            .catch(() => {
                showFormMessage(false, 'Something went wrong. Please try again later.');
            })
            .finally(() => {
                submitBtn.classList.remove('is-loading');
                submitBtn.disabled = false;
            });
        });

        function showFormMessage(isSuccess, text) {
            formMsgBox.style.display = 'flex';
            formMsgBox.className = 'form-message form-message--' + (isSuccess ? 'success' : 'error');
            formMsgBox.innerHTML =
                '<i class="fas fa-' + (isSuccess ? 'check-circle' : 'exclamation-circle') + '"></i>' +
                '<span>' + text + '</span>';

            formMsgBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

            if (isSuccess) {
                setTimeout(() => {
                    formMsgBox.style.display = 'none';
                }, 6000);
            }
        }
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
        // ── File Upload Name Display ─────────────────────────
    const fileInput = document.getElementById('screenshot-input');
    const fileNameDisplay = document.getElementById('file-name-display');
    
    if (fileInput && fileNameDisplay) {
        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                fileNameDisplay.textContent = this.files[0].name;
                fileNameDisplay.style.display = 'block';
            } else {
                fileNameDisplay.style.display = 'none';
            }
        });
    }

});