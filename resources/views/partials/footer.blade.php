@php($profile = config('portfolio.profile'))
@php($socials = config('portfolio.socials'))

<footer class="border-t border-white/10 py-10">
    <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-6 px-6 sm:flex-row">
        <p class="text-sm text-slate-400">
            &copy; {{ date('Y') }} {{ $profile['name'] }}. All rights reserved.
        </p>

        <div class="flex items-center gap-4">
            @foreach ($socials as $social)
                <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                   aria-label="{{ $social['label'] }}"
                   class="grid h-10 w-10 place-items-center rounded-full border border-white/10 text-slate-300 transition hover:border-accent-cyan/50 hover:text-accent-cyan hover:shadow-glow">
                    @if ($social['icon'] === 'linkedin')
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.25 8.5h4.5V24H.25V8.5zM8.5 8.5h4.31v2.11h.06c.6-1.14 2.07-2.34 4.26-2.34 4.56 0 5.4 3 5.4 6.9V24h-4.5v-6.86c0-1.64-.03-3.75-2.28-3.75-2.28 0-2.63 1.78-2.63 3.63V24H8.5V8.5z"/>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 .5C5.37.5 0 5.87 0 12.5c0 5.3 3.44 9.8 8.21 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.55-1.39-1.34-1.76-1.34-1.76-1.09-.75.08-.73.08-.73 1.21.09 1.84 1.24 1.84 1.24 1.07 1.84 2.81 1.31 3.5 1 .11-.78.42-1.31.76-1.61-2.67-.3-5.47-1.34-5.47-5.96 0-1.32.47-2.39 1.24-3.23-.12-.3-.54-1.52.12-3.17 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 0 1 6 0c2.29-1.55 3.3-1.23 3.3-1.23.66 1.65.24 2.87.12 3.17.77.84 1.24 1.91 1.24 3.23 0 4.63-2.81 5.65-5.49 5.95.43.37.81 1.1.81 2.22v3.29c0 .32.22.7.83.58A12 12 0 0 0 24 12.5C24 5.87 18.63.5 12 .5z"/>
                        </svg>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</footer>
