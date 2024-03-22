<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function showForm()
    {
        // return view('creator.uploadfile');
        $user = auth()->user();
        $uploadedFiles = $user->uploadedFiles ?? [];
        return view('creator.uploadfile', compact('uploadedFiles'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:doc,docx,pdf|max:2048',
            'description' => 'required|string',
        ]);

        $user = auth()->user();
        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $storedName = $file->store('uploads');

        // Ensure to set the 'user_id' during file creation
        $uploadedFile = $user->uploadedFiles()->create([
            'original_name' => $originalName,
            'stored_name' => $storedName,
            'description' => $request->input('description'),
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully.');
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


    public function userUploadedFiles()
    {
        $user = auth()->user();
        $uploadedFiles = $user->uploadedFiles ?? [];
        return view('creator.uploadfile', compact('uploadedFiles'));
    }


    public function deleteFile($id)
{
    $user = auth()->user();
    $file = $user->uploadedFiles()->find($id);

    if ($file) {
        Storage::delete($file->stored_name);
        $file->delete();

        return redirect()->route('upload-form')->with('success', 'File deleted successfully.');
    } else {
        return redirect()->route('upload-form')->with('error', 'File not found.');
    }
}

}
