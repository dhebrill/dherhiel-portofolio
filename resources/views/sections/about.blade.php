@php($profile = config('portfolio.profile'))

<section id="about" class="mx-auto max-w-6xl px-6 py-16 sm:py-24">
    <div class="reveal">
        <p class="text-sm font-semibold uppercase tracking-widest text-accent-cyan">About</p>
        <h2 class="section-title mt-2">Who I am</h2>
    </div>

    <div class="mt-10 grid items-center gap-10 lg:grid-cols-[360px_1fr]">
        {{-- Profile photo --}}
        <div class="reveal">
            <div class="relative mx-auto w-full max-w-sm">
                <img src="{{ asset($profile['photo']) }}"
                     alt="Portrait of {{ $profile['name'] }}"
                     class="h-auto w-full -translate-y-2">
            </div>
        </div>

        <div class="reveal">
            <p class="text-lg leading-relaxed text-slate-300">
                {{ $profile['about'] }}
            </p>
            <div class="mt-6 grid grid-cols-2 gap-4 sm:max-w-md">
                <div class="glass rounded-2xl p-4">
                    <p class="text-2xl font-bold text-white">1+</p>
                    <p class="text-xs text-slate-400">Year of data admin experience</p>
                </div>
                <div class="glass rounded-2xl p-4">
                    <p class="text-2xl font-bold text-white">Data</p>
                    <p class="text-xs text-slate-400">Analytics focused</p>
                </div>
            </div>
        </div>
    </div>
</section>
