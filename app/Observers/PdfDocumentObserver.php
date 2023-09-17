<?php

namespace App\Observers;

use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class PdfDocumentObserver
{
    public function saved(Document $file): void
    {
        if ($file->isDirty('document') && !is_null($file->getOriginal('document'))) {
            Storage::disk('public')->delete($file->getOriginal('document'));
        }
    }

    public function deleted(Document $file): void
    {
        if (!is_null($file->document)) {
            Storage::disk('public')->delete($file->document);
        }
    }
}
