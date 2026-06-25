@php($skills = config('portfolio.skills'))

<section id="skills" class="mx-auto max-w-6xl px-6 py-24">
    <div class="reveal">
        <p class="text-sm font-semibold uppercase tracking-widest text-accent-cyan">Skills</p>
        <h2 class="section-title mt-2">What I bring</h2>
    </div>

    <div class="mt-10 grid gap-8 lg:grid-cols-2">
        {{-- Hard skills as progress bars --}}
        <div class="glass-glow reveal p-6">
            <h3 class="text-lg font-bold text-white">Hard Skills</h3>
            <div class="mt-6 space-y-5">
                @foreach ($skills['hard'] as $skill)
                    <div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="font-medium text-slate-200">{{ $skill['name'] }}</span>
                            <span class="text-slate-400">{{ $skill['level'] }}%</span>
                        </div>
                        <div class="mt-2 h-2 w-full overflow-hidden rounded-full bg-white/5">
                            <div class="h-full rounded-full bg-gradient-to-r from-accent-cyan to-accent-purple"
                                 style="width: {{ $skill['level'] }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Soft skills as chips --}}
        <div class="glass-glow reveal p-6">
            <h3 class="text-lg font-bold text-white">Soft Skills</h3>
            <div class="mt-6 flex flex-wrap gap-3">
                @foreach ($skills['soft'] as $soft)
                    <span class="inline-flex items-center gap-2 rounded-full border border-accent-cyan/20 bg-accent-cyan/5 px-4 py-2 text-sm text-slate-200">
                        <span class="h-1.5 w-1.5 rounded-full bg-accent-cyan"></span>
                        {{ $soft }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>
</section>
