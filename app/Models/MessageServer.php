<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\MessageServer
 *
 * @property int $id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MessageServer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MessageServer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MessageServer withoutTrashed()
 * @mixin \Eloquent
 */
class MessageServer extends Model
{
    use SoftDeletes;
    protected $guarded = [];
}
