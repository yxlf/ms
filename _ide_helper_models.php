<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereUsername($value)
 * @mixin \Eloquent
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
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
	class Commodity extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RcordIn
 *
 * @property int $id
 * @property string $name 商品名称
 * @property int $count 数量
 * @property float $price 价格
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RcordIn whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class RcordIn extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rcordout
 *
 * @property int $id
 * @property string $name 商品名称
 * @property int $count 数量
 * @property float $price 价格
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rcordout whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Rcordout extends \Eloquent {}
}

namespace App\Models{
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
	class Store extends \Eloquent {}
}

namespace App\Models{
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
	class Title extends \Eloquent {}
}

