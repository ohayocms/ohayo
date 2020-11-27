<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreItem extends Model
{
    use HasFactory;

    const ATTR_SERVER_ID = 'server_id';
    const ATTR_NAME = 'name';
    const ATTR_DESCRIPTION = 'description';
    const ATTR_IMAGE = 'image';
    const ATTR_STORE_ITEM_TYPE_ID = 'store_item_type_id';
    const ATTR_IS_COUNTABLE = 'is_countable';

    const ATTR_CREATED_AT = 'created_at';
    const ATTR_UPDATED_AT = 'updated_at';

    protected $table = 'store_items';

    protected $fillable = [
        self::ATTR_SERVER_ID,
        self::ATTR_NAME,
        self::ATTR_DESCRIPTION,
        self::ATTR_IMAGE,
        self::ATTR_STORE_ITEM_TYPE_ID,
        self::ATTR_IS_COUNTABLE,
    ];

    protected $dates = [
        self::ATTR_CREATED_AT,
        self::ATTR_UPDATED_AT,
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function storeItemType()
    {
        return $this->belongsTo(StoreItemType::class);
    }

    public function storeItemPrices()
    {
        return $this->hasMany(StoreItemPrice::class);
    }
}
