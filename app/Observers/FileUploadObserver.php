<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class FileUploadObserver
{
    public function saved(Post|Service $file): void
    {
        if ($file->isDirty('thumbnail') && !is_null($file->getOriginal('thumbnail'))) {
            Storage::disk('public')->delete($file->getOriginal('thumbnail'));
        }
    }

    public function deleted(Post|Service $file): void
    {
        if (!is_null($file->thumbnail)) {
            Storage::disk('public')->delete($file->thumbnail);
        }
    }
}
