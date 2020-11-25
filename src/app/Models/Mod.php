<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mod extends Model
{
    use HasFactory;

    const ATTR_MOD_ID = 'mod_id';
    const ATTR_NAME = 'name';

    const ATTR_CREATED_AT = 'created_at';
    const ATTR_UPDATED_AT = 'updated_at';

    protected $table = 'mods';

    protected $fillable = [
        self::ATTR_MOD_ID,
        self::ATTR_NAME,
    ];

    protected $dates = [
        self::ATTR_CREATED_AT,
        self::ATTR_UPDATED_AT,
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function servers()
    {
        return $this->hasMany(Server::class);
    }
}
