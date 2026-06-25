@php($experience = config('portfolio.experience'))

<section id="experience" class="mx-auto max-w-6xl px-6 py-24">
    <div class="reveal">
        <p class="text-sm font-semibold uppercase tracking-widest text-accent-cyan">Experience</p>
        <h2 class="section-title mt-2">Work Experience</h2>
    </div>

    <div class="relative mt-12 pl-8">
        {{-- Timeline vertical line --}}
        <div class="absolute left-2 top-2 h-full w-px bg-gradient-to-b from-accent-cyan via-accent-purple to-transparent"></div>

        @foreach ($experience as $job)
            <article class="reveal relative mb-10">
                {{-- Timeline dot --}}
                <span class="absolute -left-[1.6rem] top-1.5 grid h-4 w-4 place-items-center rounded-full bg-accent-cyan shadow-glow">
                    <span class="h-1.5 w-1.5 rounded-full bg-ink-950"></span>
                </span>

                <div class="glass-glow p-6">
                    <div class="flex flex-wrap items-start justify-between gap-2">
                        <div>
                            <h3 class="text-lg font-bold text-white">{{ $job['position'] }}</h3>
                            <p class="text-accent-cyan">{{ $job['company'] }}</p>
                        </div>
                        <span class="rounded-full border border-white/10 px-3 py-1 text-xs text-slate-300">
                            {{ $job['period'] }}
                        </span>
                    </div>
                    <ul class="mt-4 space-y-2 text-sm text-slate-300">
                        @foreach ($job['points'] as $point)
                            <li class="flex gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-accent-purple"></span>
                                <span>{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </article>
        @endforeach
    </div>
</section>
