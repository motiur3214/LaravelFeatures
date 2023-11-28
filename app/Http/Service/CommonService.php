<?php

namespace App\Http\Service;

use App\Models\Article;
use App\Models\FileManager;
use App\Models\Product;
use Illuminate\Database\QueryException;
use  Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redis;

class CommonService
{
    protected function FileUpload($file, $originType, $originTd, $folder): void
    {
        $fileManager = new FileManager();
        $fileDetails = $fileManager->fileDataMaping($file, $originType, $originTd, $folder);
        $fileManager->upload($fileDetails);
    }

    protected function FileUpdate($newFile, $originType, $originId, $folder): void
    {
        $fileManager = FileManager::where('origin_type', $originType)->where('origin_id', $originId)->get()->first();
        if (!$fileManager) {
            $fileManager = new FileManager();
        }
        $fileDetails = $fileManager->fileDataMaping($newFile, $originType, $originId, $folder);
        $fileDetails['storage_path'] = $fileManager->file_link;
        $fileManager->updateFile($fileDetails);
    }
}
