<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    const IDENTITY_TYPE_ID = 0;
    const IDENTITY_TYPE_NAME = 1;
    const IDENTITY_TYPE_EMAIL = 2;
    const IDENTITY_TYPE_STEAM_ID = 3;
    const IDENTITY_TYPE_STEAM_ID_64 = 4;

    const ATTR_NAME = 'name';
    const ATTR_SIGN = 'sign';
    const ATTR_CONNECTION = 'connection';
    const ATTR_TABLE = 'table';
    const ATTR_FIELD = 'field';
    const ATTR_USER_IDENTITY_TYPE = 'user_identity_type';
    const ATTR_USER_IDENTITY_FIELD = 'user_identity_field';

    const ATTR_CREATED_AT = 'created_at';
    const ATTR_UPDATED_AT = 'updated_at';

    protected $table = 'currencies';

    protected $fillable = [
        self::ATTR_NAME,
        self::ATTR_SIGN,
        self::ATTR_CONNECTION,
        self::ATTR_TABLE,
        self::ATTR_FIELD,
        self::ATTR_USER_IDENTITY_FIELD,
        self::ATTR_USER_IDENTITY_TYPE,
    ];

    protected $dates = [
        self::ATTR_CREATED_AT,
        self::ATTR_UPDATED_AT,
    ];

    public function prices()
    {
        return $this->hasMany(StoreItemPrice::class);
    }

    public function scopeItemId($query, int $itemId, int $currencyId)
    {
        return $query->where('store_item_id', '=', $itemId)->where('currency_id', '=', $currencyId)->first();
    }
}
