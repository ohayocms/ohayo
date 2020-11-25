<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    const ATTR_NAME = 'name';
    const ATTR_ADDRESS = 'address';
    const ATTR_MOD_ID = 'mod_id';

    const ATTR_CREATED_AT = 'created_at';
    const ATTR_UPDATED_AT = 'updated_at';

    protected $table = 'servers';

    protected $fillable = [
        self::ATTR_NAME,
        self::ATTR_ADDRESS,
        self::ATTR_MOD_ID,
    ];

    protected $dates = [
        self::ATTR_CREATED_AT,
        self::ATTR_UPDATED_AT,
    ];

    public function mod()
    {
        return $this->belongsTo(Mod::class);
    }
}
