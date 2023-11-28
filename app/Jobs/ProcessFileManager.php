<?php

namespace App\Jobs;

use App\Models\FileManager;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class ProcessFileManager implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(Product $fileManager): void
    {
        $count_list = FileManager::count() ?? 0;
        $list_redis = json_decode(Redis::get('file_managers')) ?? [];

        if (empty($list_redis) || $count_list != count($list_redis)) {
            $list = $fileManager->orderBy('id', 'desc')->get();
            Redis::set('file_managers', json_encode($list));
        }
    }
}
