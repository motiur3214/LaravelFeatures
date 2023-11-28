<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\ArticleLog;


class ArticleObserver
{

    /**
     * Handle the Article "created" event.
     */
    public function created(Article $article): void
    {
        if (isset($article->id)) {
            $log = new ArticleLog();
            $log->user_id = auth()->id();
            $log->article_id = $article->id;
            $log->save();
        }
    }

    /**
     * Handle the Article "updated" event.
     */
    public function updated(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "restored" event.
     */
    public function restored(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     */
    public function forceDeleted(Article $article): void
    {
        //
    }
}
