<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    const ATTR_NAME = 'name';
    const ATTR_SIGN = 'sign';

    const ATTR_CREATED_AT = 'created_at';
    const ATTR_UPDATED_AT = 'updated_at';

    protected $table = 'currencies';

    protected $fillable = [
        self::ATTR_NAME,
        self::ATTR_SIGN,
    ];

    protected $dates = [
        self::ATTR_CREATED_AT,
        self::ATTR_UPDATED_AT,
    ];
}
