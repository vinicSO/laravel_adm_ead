<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadFileService
{

    public function store ( UploadedFile $file, string $path ): string
    {
        return $file->store($path);
    }

    public function storeAs ( UploadedFile $file, string $path, string $customName ): string
    {
        return $file->storeAs($path, $customName);
    }

    public function remove ( string $filePath, string $customName ): bool
    {
        if (Storage::exists($filePath)) return Storage::delete($filePath);

        return false;
    }
}