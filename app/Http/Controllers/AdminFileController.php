<?php

// app/Http/Controllers/AdminFileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AdminFileController extends Controller
{
    public function showForm()
    {
        $files = UploadedFile::all();
        return view('admin.uploadfile', compact('files'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:doc,docx,pdf|max:2048',
            'name' => 'required|string',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $storedName = $file->store('uploads');

        UploadedFile::create([
            'original_name' => $originalName,
            'stored_name' => $storedName,
        ]);

        return redirect()->route('admin.showform')->with('success', 'File uploaded successfully.');
    }

    public function download($id)
    {
        $file = UploadedFile::find($id);

        if ($file) {
            $filePath = storage_path("app/{$file->stored_name}");

            return response()->download($filePath, $file->original_name);
        } else {
            abort(404);
        }
    }

    public function delete($id)
    {
        $file = UploadedFile::find($id);

        if ($file) {
            // Delete file from storage
            Storage::delete($file->stored_name);

            // Delete record from the database
            $file->delete();

            return redirect()->route('admin.showform')->with('success', 'File deleted successfully.');
        } else {
            abort(404);
        }
    }
}
