<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(Request $request){
        $user = auth()->user();
        $files = Storage::disk('s3')->files($user->id);
        return view('pages.user.file.index', compact('files'));
    }
    public function upload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,mp4|max:10240', // Adjust max file size as needed
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // Save the file to the user's S3 folder
        $filePath = $user->id . '/' . $request->file('file')->getClientOriginalName();
        Storage::disk('s3')->put($filePath, file_get_contents($request->file('file')));

        // Optionally, you can update the user's storage usage here
        // $user->update(['storage_used' => $user->storage_used + $request->file('file')->getSize()]);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
}
