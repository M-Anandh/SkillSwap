<?php

namespace App\Http\Controllers;

use App\Models\UploadedFile;
use Illuminate\Http\Request;

class FileListController extends Controller
{
    public function index()
    {
        $files = UploadedFile::all(); // Fetch all files

        return view('user.list', compact('files'));
    }
}
