<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use app\models\drop_file;

class FileCreatorController extends Controller
{
    public function index()
    {
        return Inertia::render('File');
    }
    public function create()
    {
        $file = new drop_file();
        $file->file_title = request('file_title');
        $file->file_content= request('file_content');
        $file->file_password = request('file_password');
    }
    public function get_file($id) {
//        $file = drop_file::find()
    }
}
