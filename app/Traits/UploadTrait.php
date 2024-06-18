<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UploadTrait
{
    public function uploadImage(Request $request, $folderName = null)
    {
        $image = $request->file('image');
        $originalName = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $newName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . date('Y.m.d_His') . '_' . uniqid() . '.' . $extension;

        // $path = $image->storeAs($folderName, $newName, 'images');

        $path = $image->storeAs($folderName, $newName, 'images');

        return $path;
    }

    public function uploadVideo(Request $request, $folderName = null)
    {
        $video = $request->file('video');
        $originalName = $video->getClientOriginalName();
        $extension = $video->getClientOriginalExtension();
        $newName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . date('Y.m.d_His') . '_' . uniqid() . '.' . $extension;

        // $path = $video->storeAs($folderName, $newName, 'videos');

        $path = $video->storeAs($folderName, $newName, 'videos');

        return $path;
    }

    public function uploadFile(Request $request, $folderName = null)
    {
        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $newName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . date('Y.m.d_His') . '_' . uniqid() . '.' . $extension;

        // $path = $file->storeAs($folderName, $newName, 'files');

        $path = $file->storeAs($folderName, $newName, 'files');

        return $path;
    }

    public function deleteFile($filePath, $disk)
    {
        if (Storage::disk($disk)->exists($filePath)) {
            Storage::disk($disk)->delete($filePath);
            return true;
        }
        return false;
    }
}
