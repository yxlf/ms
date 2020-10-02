<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MessageServer
 *
 * @property int $id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageServer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MessageServer extends Model
{
    protected $guarded=[];
}
