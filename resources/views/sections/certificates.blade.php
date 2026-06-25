<section id="certificates" class="mx-auto max-w-6xl px-6 py-16 sm:py-24">
    <div class="reveal">
        <p class="text-sm font-semibold uppercase tracking-widest text-accent-cyan">Certificates</p>
        <h2 class="section-title mt-2">Certifications</h2>
    </div>

    <div class="relative mt-12 pl-8">
        <div class="absolute left-2 top-2 h-full w-px bg-gradient-to-b from-accent-cyan via-accent-purple to-transparent"></div>

        @foreach ($certificates as $cert)
            <article class="reveal relative mb-8">
                <span class="absolute -left-[1.6rem] top-1.5 grid h-4 w-4 place-items-center rounded-full bg-accent-purple shadow-glow-purple">
                    <span class="h-1.5 w-1.5 rounded-full bg-ink-950"></span>
                </span>

                <div class="glass-glow flex flex-wrap items-center justify-between gap-4 p-6">
                    <div>
                        <h3 class="font-bold text-white">{{ $cert->title }}</h3>
                        <p class="mt-1 text-sm text-slate-300">{{ $cert->issuer }} &middot; {{ $cert->year }}</p>
                    </div>
                    <button type="button"
                            data-file-path="{{ $cert->image_path }}"
                            data-file-title="{{ $cert->title }}"
                            class="inline-flex items-center gap-2 rounded-full border border-accent-cyan/30 px-4 py-2 text-sm font-medium text-accent-cyan transition hover:bg-accent-cyan/10 hover:shadow-glow open-pdf-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <line x1="10" y1="14" x2="21" y2="3"></line>
                        </svg>
                        Lihat Sertifikat
                    </button>
                </div>
            </article>
        @endforeach
    </div>
</section>
