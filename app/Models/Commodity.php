<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Commodity
 *
 * @property int $id
 * @property string $product_name 产品名称
 * @property int $count 商品数量 目前只能是"件"
 * @property int $store_id 对应门店id
 * @property int $title_id 对应类别id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RcordIn[] $recordIns
 * @property-read int|null $record_ins_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rcordout[] $recordOuts
 * @property-read int|null $record_outs_count
 * @property-read \App\Models\Store $store
 * @property-read \App\Models\Title $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereTitleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commodity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Commodity extends Model
{
    //
    protected $guarded = [];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function recordIns()
    {
        return $this->hasMany(RcordIn::class);
    }

    public function recordOuts()
    {
        return $this->hasMany(Rcordout::class);
    }
}
