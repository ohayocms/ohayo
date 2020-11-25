<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    const TYPE_GOLD_SOURCE = 0;
    const TYPE_SOURCE = 1;
    const TYPE_MINECRAFT = 2;

    const ATTR_NAME = 'name';
    const ATTR_DESCRIPTION = 'description';
    const ATTR_IMAGE = 'image';
    const ATTR_TYPE = 'type';

    const ATTR_CREATED_AT = 'created_at';
    const ATTR_UPDATED_AT = 'updated_at';

    protected $table = 'games';

    protected $fillable = [
        self::ATTR_NAME,
        self::ATTR_DESCRIPTION,
        self::ATTR_IMAGE,
        self::ATTR_TYPE,
    ];

    protected $dates = [
        self::ATTR_CREATED_AT,
        self::ATTR_UPDATED_AT,
    ];

    public function mods()
    {
        return $this->hasMany(Mod::class);
    }
}
