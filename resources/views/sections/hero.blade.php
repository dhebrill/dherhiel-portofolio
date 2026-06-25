@php($profile = config('portfolio.profile'))

<section id="home" class="hero-vignette relative flex min-h-screen items-center overflow-hidden pt-24">
    <div class="mx-auto grid w-full max-w-6xl items-center gap-8 px-6 lg:grid-cols-2 lg:gap-12">
        {{-- Left: text --}}
        <div class="reveal">
            <span class="pill">
                <span class="h-1.5 w-1.5 rounded-full bg-accent-cyan"></span>
                {{ $profile['badge'] }}
            </span>

            <h1 class="mt-6 text-4xl font-extrabold leading-tight tracking-tight text-white text-balance sm:text-5xl lg:text-6xl">
                Hi, I'm <span class="gradient-text">{{ $profile['name'] }}</span>
            </h1>

            <p class="mt-6 max-w-xl text-base leading-relaxed text-slate-300">
                {{ $profile['summary'] }}
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="#projects" class="btn-primary">Lihat Proyek</a>
                <a href="#contact" class="btn-ghost">Hubungi Saya</a>
            </div>

            <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-2 text-sm text-slate-400">
                <a href="mailto:{{ $profile['email'] }}" class="transition hover:text-accent-cyan">
                    {{ $profile['email'] }}
                </a>
                <span class="hidden h-1 w-1 rounded-full bg-slate-600 sm:block"></span>
                <span>{{ $profile['location'] }}</span>
            </div>
        </div>

        {{-- Right: 3D particle sphere --}}
        <div class="reveal relative">
            <div id="hero-canvas"
                 class="mx-auto aspect-square w-full max-w-[460px]"
                 role="img"
                 aria-label="Interactive 3D particle sphere representing a data network"></div>
        </div>
    </div>
</section>
