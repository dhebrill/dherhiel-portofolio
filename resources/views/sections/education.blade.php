@php($education = config('portfolio.education'))

<section id="education" class="mx-auto max-w-6xl px-6 py-24">
    <div class="reveal">
        <p class="text-sm font-semibold uppercase tracking-widest text-accent-cyan">Education</p>
        <h2 class="section-title mt-2">Academic Background</h2>
    </div>

    <div class="mt-10 grid gap-6 md:grid-cols-2">
        @foreach ($education as $edu)
            <article class="glass-glow reveal p-6">
                <div class="flex items-start justify-between gap-4">
                    <h3 class="text-lg font-bold text-white">{{ $edu['school'] }}</h3>
                    <span class="shrink-0 rounded-full border border-accent-purple/30 bg-accent-purple/10 px-3 py-1 text-xs font-medium text-accent-purple">
                        {{ $edu['period'] }}
                    </span>
                </div>
                <p class="mt-2 text-slate-300">{{ $edu['program'] }}</p>
            </article>
        @endforeach
    </div>
</section>
