# Dherhiel — Personal Portfolio (Laravel + Blade)

A dark-mode, glassmorphism portfolio for **Muhammad Dherhiel Ar Ramidza**, built with
Laravel 11 + Blade + Tailwind CSS, featuring an interactive 3D particle sphere ("data
network") in the hero, rendered with **vanilla Three.js** (no React).

> Note: This environment (v0/Vercel Sandbox) is Node-only and cannot run PHP, so the
> app was authored here but must be installed and run on your own machine / PHP host.

## Tech stack

- **Laravel 11** (PHP 8.2+)
- **Blade** templates (one partial per section)
- **Tailwind CSS 3** via Vite
- **Three.js** for the hero 3D sphere
- **Formspree** for the contact form

## Project structure

```
config/portfolio.php                 # ALL content lives here (edit this to update the site)
routes/web.php                       # single "/" route
app/Http/Controllers/PortfolioController.php
resources/views/
  layouts/app.blade.php              # base layout (grid bg, nav, footer)
  portfolio.blade.php                # includes all sections in order
  partials/navbar.blade.php
  partials/footer.blade.php
  sections/{hero,about,education,experience,achievements,projects,skills,certificates,contact}.blade.php
resources/css/app.css                # Tailwind + custom utilities (gradient text, glass, reveal)
resources/js/app.js                  # scroll reveal, nav, contact form
resources/js/three-hero.js           # the 3D particle sphere
public/images/profile-placeholder.svg
```

## Setup

This repo contains the custom application files. To get a runnable app:

### Option A — drop into a fresh Laravel app (recommended)

```bash
# 1. Create a clean Laravel 11 project
composer create-project laravel/laravel dherhiel-portfolio
cd dherhiel-portfolio

# 2. Copy the files from this folder over the new project, overwriting:
#    composer.json, package.json, vite.config.js, tailwind.config.js,
#    postcss.config.js, routes/, app/Http/Controllers/, config/portfolio.php,
#    resources/, public/images/

# 3. Install deps
composer install
npm install

# 4. Generate app key
php artisan key:generate

# 5. Run dev servers (two terminals)
npm run dev
php artisan serve
```

Visit http://localhost:8000

### Option B — use these files directly

If you already have Laravel's framework files (artisan, bootstrap/, public/index.php),
just run `composer install && npm install && npm run dev && php artisan serve`.

## Editing content

Everything is data-driven. Open **`config/portfolio.php`** and edit profile info,
education, experience, projects, skills, certificates, and social links. No need to
touch the Blade files.

## Contact form (Formspree)

1. Create a form at https://formspree.io and copy your endpoint
   (e.g. `https://formspree.io/f/abcdwxyz`).
2. Paste it into `config/portfolio.php` → `contact.formspree_endpoint`.

The form submits via `fetch` with loading / success / error states.

## Profile photo

Replace `public/images/profile-placeholder.svg` with your photo and update
`config/portfolio.php` → `profile.photo` to e.g. `images/profile.jpg`.

## Production build

```bash
npm run build
php artisan config:cache route:cache view:cache
```

## A note on Vercel

Vercel does not host PHP/Laravel out of the box like it does Next.js. To deploy this
Laravel app, use a PHP-friendly host (Laravel Forge, Ploi, Hostinger, Railway, Render,
or a VPS). If you specifically need Vercel hosting, the same design can be rebuilt as a
Next.js app — just ask.
