<?php

namespace App;

use App\Http\Controllers\Controller;

use Inertia\Inertia;


class FileCreatorController extends Controller
{
    public function index()
    {
        return Inertia::render('File');
    }
}
