<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Title
 *
 * @property int $id
 * @property string $name 类别名称
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commodity[] $commodities
 * @property-read int|null $commodities_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Title newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Title newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Title query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Title whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Title whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Title whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Title whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Title extends Model
{
    //
    protected $guarded = [];

    public function commodities()
    {
        return $this->hasMany(Commodity::class);
    }
}
