<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Project;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        return view('portfolio', [
            'profile'      => config('portfolio.profile'),
            'nav'          => config('portfolio.nav'),
            'education'    => config('portfolio.education'),
            'experience'   => config('portfolio.experience'),
            'achievements' => config('portfolio.achievements'),
            'projects'     => Project::all(),
            'skills'       => config('portfolio.skills'),
            'certificates' => Certificate::all(),
            'socials'      => config('portfolio.socials'),
            'contact'      => config('portfolio.contact'),
        ]);
    }
}
