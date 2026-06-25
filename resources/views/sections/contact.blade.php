@php($profile = config('portfolio.profile'))

<section id="contact" class="mx-auto max-w-6xl px-6 py-16 sm:py-24">
    <div class="reveal">
        <p class="text-sm font-semibold uppercase tracking-widest text-accent-cyan">Contact</p>
        <h2 class="section-title mt-2">Get in touch</h2>
    </div>

    <div class="mt-10 grid gap-10 lg:grid-cols-[1fr_1.2fr]">
        {{-- Contact details --}}
        <div class="reveal space-y-6">
            <p class="text-lg leading-relaxed text-slate-300">
                Have an opportunity or just want to say hello? Feel free to reach out, I'd love to connect.
            </p>
            <div class="space-y-4">
                <a href="mailto:{{ $profile['email'] }}"
                   class="glass-glow flex items-center gap-4 p-4">
                    <span class="grid h-10 w-10 place-items-center rounded-full bg-accent-cyan/10 text-accent-cyan">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                            <path d="m22 7-10 5L2 7"></path>
                        </svg>
                    </span>
                    <span>
                        <span class="block text-xs text-slate-400">Email</span>
                        <span class="text-slate-200">{{ $profile['email'] }}</span>
                    </span>
                </a>
                <div class="glass flex items-center gap-4 p-4">
                    <span class="grid h-10 w-10 place-items-center rounded-full bg-accent-purple/10 text-accent-purple">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </span>
                    <span>
                        <span class="block text-xs text-slate-400">Location</span>
                        <span class="text-slate-200">{{ $profile['location'] }}</span>
                    </span>
                </div>
            </div>
        </div>

        {{-- Form --}}
        <form id="contact-form" action="{{ route('contact.store') }}" method="POST"
              class="glass reveal space-y-5 p-6 sm:p-8">
            @csrf

            @if (session('success'))
                <div class="rounded-xl border border-green-500/30 bg-green-500/10 p-4 text-sm text-green-400">
                    {{ session('success') }}
                </div>
            @endif

            <div>
                <label for="name" class="mb-2 block text-sm font-medium text-slate-200">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       class="w-full rounded-xl border-white/10 bg-white/5 text-slate-100 placeholder:text-slate-500 focus:border-accent-cyan focus:ring-accent-cyan/30 @error('name') border-red-400/50 @enderror"
                       placeholder="Your name">
                @error('name')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-slate-200">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="w-full rounded-xl border-white/10 bg-white/5 text-slate-100 placeholder:text-slate-500 focus:border-accent-cyan focus:ring-accent-cyan/30 @error('email') border-red-400/50 @enderror"
                       placeholder="you@example.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="message" class="mb-2 block text-sm font-medium text-slate-200">Message</label>
                <textarea id="message" name="message" rows="5"
                          class="w-full rounded-xl border-white/10 bg-white/5 text-slate-100 placeholder:text-slate-500 focus:border-accent-cyan focus:ring-accent-cyan/30 @error('message') border-red-400/50 @enderror"
                          placeholder="Write your message...">{{ old('message') }}</textarea>
                @error('message')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" id="contact-submit" class="btn-primary w-full disabled:cursor-not-allowed disabled:opacity-60">
                <span data-btn-text>Send Message</span>
            </button>
        </form>
    </div>
</section>
