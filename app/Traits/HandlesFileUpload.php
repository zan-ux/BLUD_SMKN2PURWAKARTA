<?php
// app/Traits/HandlesFileUpload.php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HandlesFileUpload
{
    protected function uploadFile(UploadedFile $file, $folder)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        
        return $file->storeAs($folder, $filename, 'public');
    }

    protected function deleteFile($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    protected function uploadMultipleFiles($files, $folder)
    {
        $paths = [];
        
        foreach ($files as $file) {
            $paths[] = $this->uploadFile($file, $folder);
        }
        
        return $paths;
    }
}