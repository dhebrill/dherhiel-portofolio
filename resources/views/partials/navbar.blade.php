@php($nav = config('portfolio.nav'))
@php($profile = config('portfolio.profile'))

<header class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-ink-950/70 backdrop-blur-xl">
    <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
        <a href="#home" class="text-2xl font-extrabold tracking-tight text-white">
            <span class="gradient-text">{{ $profile['logo'] }}</span>
        </a>

        {{-- Desktop menu --}}
        <ul class="hidden items-center gap-8 md:flex">
            @foreach ($nav as $item)
                <li>
                    <a href="#{{ $item['anchor'] }}"
                       data-nav-link="{{ $item['anchor'] }}"
                       class="text-sm font-medium text-slate-300 transition hover:text-accent-cyan">
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Mobile toggle --}}
        <button id="nav-toggle" type="button"
                class="inline-flex items-center justify-center rounded-lg border border-white/10 p-2 text-slate-200 md:hidden"
                aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>
    </nav>

    {{-- Mobile menu --}}
    <div id="mobile-menu" class="hidden border-t border-white/10 bg-ink-950/95 px-6 py-4 md:hidden">
        <ul class="flex flex-col gap-4">
            @foreach ($nav as $item)
                <li>
                    <a href="#{{ $item['anchor'] }}"
                       class="block text-sm font-medium text-slate-300 transition hover:text-accent-cyan">
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</header>
