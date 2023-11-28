<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ArticleLog
 *
 * @property int $id
 * @property int $user_id
 * @property int $article_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ArticleLog newModelQuery()
 * @method static Builder|ArticleLog newQuery()
 * @method static Builder|ArticleLog query()
 * @method static Builder|ArticleLog whereArticleId($value)
 * @method static Builder|ArticleLog whereCreatedAt($value)
 * @method static Builder|ArticleLog whereId($value)
 * @method static Builder|ArticleLog whereUpdatedAt($value)
 * @method static Builder|ArticleLog whereUserId($value)
 * @mixin \Eloquent
 */
class ArticleLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'article_id'
    ];

}
