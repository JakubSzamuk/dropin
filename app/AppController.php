<?php

namespace App;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

use Inertia\Response;
class AppController extends Controller
{
    public function index()
    {
        return Inertia::render('Index', [

            'title' => 'Laravel 10, Inertia.js, Svelte, Tailwind CSS',

        ]);
    }
}
