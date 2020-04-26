<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rcordout
 *
 * @property int $id
 * @property string $name 商品名称
 * @property int $count 数量
 * @property float $price 价格
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $commodity_id
 * @property-read \App\Models\Commodity $commodity
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout whereCommodityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Rcordout extends Model
{
    //
    protected $guarded = [];

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }
}
