<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class ProcessProduct implements ShouldQueue
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
    public function handle(Product $product): void
    {
        $count_list = Product::count() ?? 0;
        $list_redis = json_decode(Redis::get('products')) ?? [];

        if (empty($list_redis) || $count_list != count($list_redis)) {
            $list = $product->orderBy('id', 'desc')->get();
            Redis::set('products', json_encode($list));
        }
    }
}
