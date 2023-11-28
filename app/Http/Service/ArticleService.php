<?php

namespace App\Http\Service;

use App\Models\Article;
use Illuminate\Database\QueryException;
use  Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redis;

class ArticleService
{

    public function getList(): Collection
    {
        $list_redis = json_decode(Redis::get('articles'));
        return collect($list_redis);
    }

    public function store($request): int
    {
        try {
            $article = new Article();
            $article->name = $request->name;
            $article->description = $request->description;
            $article->save();
            return 200;
        } catch (QueryException $exception) {
            return (int)$exception->getCode();
        }
    }

}
