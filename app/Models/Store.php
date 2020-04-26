<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Store
 *
 * @property int $id
 * @property string $name 门店名称
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commodity[] $commodities
 * @property-read int|null $commodities_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Store extends Model
{
    //
    protected $guarded = [];

    public function commodities()
    {
        return $this->hasMany(Commodity::class);
    }
}
