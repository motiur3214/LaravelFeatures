<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ArticleLog
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
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
 * @method static Builder|ProductLog whereProductId($value)
 * @mixin Eloquent
 */
class ProductLog extends Model
{
    use HasFactory;

    /**
     * @var int|mixed|string|null
     */

    protected $fillable = [
        'user_id',
        'product_id'
    ];
}
