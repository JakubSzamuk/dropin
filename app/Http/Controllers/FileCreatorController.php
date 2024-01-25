<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

use \App\Models\drop_file;

class FileCreatorController extends Controller
{
    public function index()
    {
        return Inertia::render('FileCreator');
    }


    public function share_file(Request $request) {
        // return Inertia::render('Success', ['file'=> $request->session()->remove('file')]);
        return Inertia::render('Success');
    }

    public function create(Request $request)
    {
        $file = new drop_file();
        $file->file_title = $request->input('file_title');
        $file->file_content = $request->input('file_content');
        $file->file_password = $request->input('file_password');

        $file->save();
        unset($file->file_password);
        $request->session()->put('file', $file);
        return to_route('saved_file');
    }
    public function get_file($id) {
        $file = drop_file::find($id);
        if ($file->file_password != null) {
            return Inertia::render('File', [
                'fileProp' => ['file_id' => $file->id, 'requiresPassword' => true],
            ]);
        } else {
            unset($file->file_password);
            return Inertia::render('File', [
                'fileProp' => $file
            ]);
        }
    }

    public function get_secure(Request $request, string $id) {
        $file = drop_file::find($id);
        if ($file == null) {
            return Inertia::render('File', [
                'needs_password' => true,

                'file_id' => $id
            ]);
        }
        if ($file->file_password == $request->input('file_password')) {
            unset($file->file_password);

            return inertia::render('File', [
                'file'=> $file
            ]);
        } else {
            return Inertia::render('File', [
                'needs_password' => true,

                'file_id' => $id
            ]);
        }
    }
}
