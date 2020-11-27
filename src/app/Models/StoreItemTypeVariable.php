<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreItemTypeVariable extends Model
{
    use HasFactory;

    const ATTR_STORE_ITEM_TYPE_ID = 'store_item_type_id';
    const ATTR_NAME = 'name';
    const ATTR_VALUE = 'value';

    const ATTR_CREATED_AT = 'created_at';
    const ATTR_UPDATED_AT = 'updated_at';

    protected $table = 'store_item_type_variables';

    protected $fillable = [
        self::ATTR_STORE_ITEM_TYPE_ID,
        self::ATTR_NAME,
        self::ATTR_VALUE,
    ];

    protected $dates = [
        self::ATTR_CREATED_AT,
        self::ATTR_UPDATED_AT,
    ];

    public function storeItemType()
    {
        return $this->belongsTo(StoreItemType::class);
    }
}
