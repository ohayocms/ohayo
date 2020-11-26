<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreItemType extends Model
{
    use HasFactory;

    const ATTR_GAME_ID = 'game_id';
    const ATTR_NAME = 'name';
    const ATTR_QUERY = 'query';

    const ATTR_CREATED_AT = 'created_at';
    const ATTR_UPDATED_AT = 'updated_at';

    protected $table = 'store_item_types';

    protected $fillable = [
        self::ATTR_GAME_ID,
        self::ATTR_NAME,
        self::ATTR_QUERY,
    ];

    protected $dates = [
        self::ATTR_CREATED_AT,
        self::ATTR_UPDATED_AT,
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function storeItemTypeVariables()
    {
        return $this->hasMany(StoreItemTypeVariable::class);
    }
}
