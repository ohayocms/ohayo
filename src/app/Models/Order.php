<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const ATTR_ITEM_ID = 'store_item_id';
    const ATTR_USER_ID = 'user_id';
    const ATTR_COUNT = 'count';
    const ATTR_CURRENCY_ID = 'currency_id';

    const ATTR_CREATED_AT = 'created_at';
    const ATTR_UPDATED_AT = 'updated_at';

    protected $table = 'orders';

    protected $fillable = [
        self::ATTR_ITEM_ID,
        self::ATTR_USER_ID,
        self::ATTR_COUNT,
        self::ATTR_CURRENCY_ID,
    ];

    protected $dates = [
        self::ATTR_CREATED_AT,
        self::ATTR_UPDATED_AT,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function storeItem()
    {
        return $this->belongsTo(StoreItem::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
