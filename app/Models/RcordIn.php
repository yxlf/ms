<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RcordIn
 *
 * @property int $id
 * @property string $name 商品名称
 * @property int $count 数量
 * @property float $price 价格
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $commodity_id
 * @property-read \App\Models\Commodity $commodity
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn whereCommodityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RcordIn extends Model
{
    //
    protected $guarded = [];

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }

}
