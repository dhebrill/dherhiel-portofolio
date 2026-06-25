import { initHero } from './three-hero.js';

document.addEventListener('DOMContentLoaded', () => {
    /* ---- 3D hero ---- */
    const heroCanvas = document.getElementById('hero-canvas');
    if (heroCanvas) {
        initHero(heroCanvas);
    }

    /* ---- Scroll reveal animations ---- */
    const revealEls = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12 }
    );
    revealEls.forEach((el) => revealObserver.observe(el));

    /* ---- Mobile nav toggle ---- */
    const navToggle = document.getElementById('nav-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    if (navToggle && mobileMenu) {
        navToggle.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        mobileMenu.querySelectorAll('a').forEach((link) =>
            link.addEventListener('click', () => mobileMenu.classList.add('hidden'))
        );
    }

    /* ---- Active nav link on scroll ---- */
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('[data-nav-link]');
    const navObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute('id');
                    navLinks.forEach((l) => {
                        l.classList.toggle('text-accent-cyan', l.dataset.navLink === id);
                        l.classList.toggle('text-slate-300', l.dataset.navLink !== id);
                    });
                }
            });
        },
        { rootMargin: '-45% 0px -50% 0px' }
    );
    sections.forEach((s) => navObserver.observe(s));

    /* ---- Image modal (generic - used for certificates & project screenshots) ---- */
    const imageModal = document.getElementById('image-modal');
    const imageModalImg = document.getElementById('image-modal-img');
    const imageModalPdf = document.getElementById('image-modal-pdf');
    const imageModalTitle = document.getElementById('image-modal-title');
    const imageModalClose = document.getElementById('image-modal-close');

    const openImageModal = (src, title) => {
        if (!imageModal || !imageModalImg || !imageModalPdf || !imageModalTitle) return;
        const isPdf = src.match(/\.pdf($|\?)/i);
        imageModalImg.style.display = isPdf ? 'none' : '';
        imageModalPdf.style.display = isPdf ? '' : 'none';
        imageModalImg.src = isPdf ? '' : src;
        imageModalImg.alt = isPdf ? '' : (title || '');
        imageModalPdf.src = isPdf ? src : '';
        imageModalTitle.textContent = title || '';
        imageModal.classList.remove('hidden');
        imageModal.classList.add('flex');
    };

    let _pdfBlobUrl = null;

    const closeImageModal = () => {
        if (!imageModal) return;
        imageModal.classList.add('hidden');
        imageModal.classList.remove('flex');
        imageModalImg.src = '';
        imageModalImg.alt = '';
        imageModalPdf.src = '';
        imageModalPdf.style.display = 'none';
        imageModalImg.style.display = '';
        imageModalTitle.textContent = '';
        if (_pdfBlobUrl) { URL.revokeObjectURL(_pdfBlobUrl); _pdfBlobUrl = null; }
    };

    if (imageModal && imageModalImg && imageModalPdf && imageModalTitle && imageModalClose) {
        document.addEventListener('click', (e) => {
            const trigger = e.target.closest('[data-image-src]');
            if (trigger) {
                e.preventDefault();
                openImageModal(trigger.dataset.imageSrc, trigger.dataset.imageTitle);
            }
        });

        imageModalClose.addEventListener('click', closeImageModal);

        imageModal.addEventListener('click', (e) => {
            if (e.target === imageModal) closeImageModal();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && imageModal && imageModal.classList.contains('flex')) {
                closeImageModal();
            }
        });
    }

    /* ---- PDF viewer: fetch as base64 JSON -> blob to bypass IDM ---- */
    document.querySelectorAll('.open-pdf-btn').forEach((btn) => {
        btn.addEventListener('click', async () => {
            const filePath = btn.dataset.filePath;
            const title = btn.dataset.fileTitle;
            if (!filePath) return;

            try {
                const res = await fetch(`/pdf-data?f=${encodeURIComponent(filePath)}`);
                const json = await res.json();

                const binary = atob(json.data);
                const bytes = new Uint8Array(binary.length);
                for (let i = 0; i < binary.length; i++) bytes[i] = binary.charCodeAt(i);

                const blob = new Blob([bytes], { type: 'application/pdf' });
                _pdfBlobUrl = URL.createObjectURL(blob);

                imageModalPdf.src = _pdfBlobUrl;
                imageModalImg.style.display = 'none';
                imageModalPdf.style.display = '';
                imageModalTitle.textContent = title || '';
                imageModal.classList.remove('hidden');
                imageModal.classList.add('flex');
            } catch (err) {
                console.error(err);
                imageModalTitle.textContent = 'Gagal memuat sertifikat. File mungkin tidak tersedia.';
                imageModalImg.style.display = 'none';
                imageModalPdf.style.display = 'none';
                imageModal.classList.remove('hidden');
                imageModal.classList.add('flex');
            }
        });
    });

    /* ---- Contact form submit (loading state) ---- */
    const form = document.getElementById('contact-form');
    if (form) {
        const submitBtn = document.getElementById('contact-submit');
        const btnText = submitBtn?.querySelector('[data-btn-text]');

        form.addEventListener('submit', () => {
            if (submitBtn && btnText) {
                submitBtn.disabled = true;
                btnText.textContent = 'Mengirim...';
            }
        });
    }
});
