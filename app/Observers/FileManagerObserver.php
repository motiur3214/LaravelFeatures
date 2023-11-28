<?php

namespace App\Observers;

use App\Models\FileManager;
use App\Models\FileManagerLog;
use App\Models\Product;

class FileManagerObserver
{

    /**
     * Handle the Article "created" event.
     */
    public function created(FileManager $fileManager): void
    {
        if (isset($fileManager->id)) {
            $log = new FileManagerLog();
            $log->user_id = auth()->id();
            $log->file_manager_id = $fileManager->id;
            $log->save();
        }
    }

    /**
     * Handle the Article "updated" event.
     */
    public function updated(FileManager $fileManager): void
    {
        if (isset($fileManager->id)) {
            $log = new FileManagerLog();
            $log->user_id = auth()->id();
            $log->file_manager_id = $fileManager->id;
            $log->save();
        }
    }

    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(FileManager $fileManager): void
    {
        //
    }

    /**
     * Handle the Article "restored" event.
     */
    public function restored(FileManager $fileManager): void
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     */
    public function forceDeleted(FileManager $fileManager): void
    {
        //
    }
}
