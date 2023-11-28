<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FileManagerLog
 *
 * @property int $id
 * @property int $user_id
 * @property int $file_manager_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FileManagerLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FileManagerLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FileManagerLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|FileManagerLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileManagerLog whereFileManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileManagerLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileManagerLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileManagerLog whereUserId($value)
 * @mixin \Eloquent
 */
class FileManagerLog extends Model
{
    use HasFactory;
}
