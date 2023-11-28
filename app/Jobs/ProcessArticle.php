<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class ProcessArticle implements ShouldQueue
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
    public function handle(Article $article): void
    {
        $count_list = Article::count() ?? 0;
        $list_redis = json_decode(Redis::get('articles')) ?? [];

        if (empty($list_redis) || $count_list != count($list_redis)) {
            $list = $article->orderBy('id', 'desc')->get();
            Redis::set('articles', json_encode($list));
        }
    }
}
