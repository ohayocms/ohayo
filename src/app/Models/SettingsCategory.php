<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsCategory extends Model
{
    use HasFactory;

    const ATTR_NAME = 'name';

    const ATTR_CREATED_AT = 'created_at';
    const ATTR_UPDATED_AT = 'updated_at';

    protected $table = 'settings';

    protected $fillable = [
        self::ATTR_NAME,
    ];

    protected $dates = [
        self::ATTR_CREATED_AT,
        self::ATTR_UPDATED_AT,
    ];

    public function settings()
    {
        return $this->hasMany(Setting::class);
    }
}
