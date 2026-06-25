<section id="projects" class="mx-auto max-w-6xl px-6 py-24">
    <div class="reveal">
        <p class="text-sm font-semibold uppercase tracking-widest text-accent-cyan">Projects</p>
        <h2 class="section-title mt-2">Selected Work</h2>
    </div>

    <div class="mt-10 grid gap-6 md:grid-cols-2">
        @foreach ($projects as $project)
            @if ($project->type === 'web')
                <a href="{{ $project->link ?? '#' }}" target="_blank" rel="noopener noreferrer"
                   class="group glass reveal relative block overflow-hidden p-6 transition duration-300 hover:scale-[1.02] hover:border-accent-cyan/40 hover:shadow-glow">
            @else
                <button type="button"
                        data-image-src="{{ $project->image_path ? route('pdf-data', ['f' => $project->image_path]) : '#' }}"
                        data-image-title="{{ $project->title }}"
                        class="group glass reveal relative block w-full overflow-hidden p-6 text-left transition duration-300 hover:scale-[1.02] hover:border-accent-cyan/40 hover:shadow-glow">
            @endif
                <div class="pointer-events-none absolute -right-16 -top-16 h-40 w-40 rounded-full bg-accent-purple/20 blur-3xl transition group-hover:bg-accent-cyan/20"></div>

                <div class="relative flex items-center justify-between">
                    <div class="flex flex-wrap gap-2">
                        @foreach ($project->tags as $tag)
                            <span class="rounded-full border border-white/10 px-3 py-1 text-xs text-slate-300">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="text-slate-400 transition group-hover:-translate-y-1 group-hover:translate-x-1 group-hover:text-accent-cyan">
                        <line x1="7" y1="17" x2="17" y2="7"></line>
                        <polyline points="7 7 17 7 17 17"></polyline>
                    </svg>
                </div>

                <h3 class="relative mt-5 text-xl font-bold text-white">{{ $project->title }}</h3>
                <p class="relative mt-2 text-sm leading-relaxed text-slate-300">{{ $project->description }}</p>
            @if ($project->type === 'web')
                </a>
            @else
                </button>
            @endif
        @endforeach
    </div>
</section>
