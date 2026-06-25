@php($achievements = config('portfolio.achievements'))

<section id="achievements" class="mx-auto max-w-6xl px-6 py-24">
    <div class="reveal">
        <p class="text-sm font-semibold uppercase tracking-widest text-accent-cyan">Achievements</p>
        <h2 class="section-title mt-2">Honors & Awards</h2>
    </div>

    <ul class="mt-10 space-y-4">
        @foreach ($achievements as $achievement)
            <li class="glass-glow reveal flex items-center gap-4 p-5">
                <span class="grid h-11 w-11 shrink-0 place-items-center rounded-full bg-gradient-to-br from-accent-cyan to-accent-purple text-ink-950">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="6"></circle>
                        <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"></path>
                    </svg>
                </span>
                <span class="font-medium text-slate-200">{{ $achievement }}</span>
            </li>
        @endforeach
    </ul>
</section>
