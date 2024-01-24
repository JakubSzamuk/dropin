<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

use \App\Models\drop_file;

class FileCreatorController extends Controller
{
    public function index()
    {
        return Inertia::render('File');
    }
    public function create(Request $request)
    {
        $file = new drop_file();
        $file->file_title = $request->input('file_title');
        $file->file_content = $request->input('file_content');
        $file->file_password = $request->input('file_password');
        $file->save();
        return json_encode(['success' => true, 'file_id' => $file->id]);
    }
    public function get_file($id) {
        $file = drop_file::find($id);
        if ($file->file_password != null) {
            return Inertia::render('File', [
                'file_id' => $file->id,
                'needs_password' => true
            ]);
        } else {
            unset($file->file_password);
            return Inertia::render('File', [
                'file' => $file
            ]);
        }
    }

    public function get_secure(Request $request, string $id) {
        $file = drop_file::find($id);
        if ($file == null) {
            return json_encode(['success' => false]);
        }
        if ($file->file_password == $request->input('file_password')) {
            unset($file->file_password);
            return json_encode(['success' => true, 'file' => $file]);
        } else {
            return json_encode(['success' => false]);
        }
    }
}
