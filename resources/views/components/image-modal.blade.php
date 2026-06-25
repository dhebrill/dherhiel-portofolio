<div id="image-modal"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 backdrop-blur-sm"
     role="dialog" aria-modal="true" aria-label="Image preview">
    <div class="relative mx-4 flex h-[90vh] w-[95vw] max-w-6xl flex-col animate-modal-in">
        <button type="button" id="image-modal-close"
                class="absolute -right-3 -top-3 z-10 grid h-8 w-8 place-items-center rounded-full bg-ink-800 text-white shadow-lg transition hover:bg-ink-700"
                aria-label="Close modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <img id="image-modal-img"
             class="max-h-full max-w-full flex-1 rounded-lg object-contain shadow-2xl"
             src="" alt="">
        <iframe id="image-modal-pdf"
                class="flex-1 rounded-lg shadow-2xl"
                src=""
                style="width:100%;border:none;display:none;">
        </iframe>
        <p id="image-modal-title" class="mt-3 text-center text-sm text-white/80 shrink-0"></p>
    </div>
</div>
