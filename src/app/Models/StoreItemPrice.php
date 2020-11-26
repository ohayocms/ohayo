<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreItemPrice extends Model
{
    use HasFactory;

    const ATTR_CURRENCY_ID = 'currency_id';
    const ATTR_STORE_ITEM_ID = 'store_item_id';
    const ATTR_VALUE = 'value';

    const ATTR_CREATED_AT = 'created_at';
    const ATTR_UPDATED_AT = 'updated_at';

    protected $table = 'store_item_prices';

    protected $fillable = [
        self::ATTR_CURRENCY_ID,
        self::ATTR_STORE_ITEM_ID,
        self::ATTR_VALUE,
    ];

    protected $dates = [
        self::ATTR_CREATED_AT,
        self::ATTR_UPDATED_AT,
    ];

    public function storeItem()
    {
        return $this->belongsTo(StoreItem::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
