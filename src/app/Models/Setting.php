<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    const ATTR_SETTINGS_CATEGORY_ID = 'settings_category_id';

    const ATTR_KEY = 'key';
    const ATTR_VALUE = 'value';

    const ATTR_CREATED_AT = 'created_at';
    const ATTR_UPDATED_AT = 'updated_at';

    protected $table = 'settings';

    protected $fillable = [
        self::ATTR_SETTINGS_CATEGORY_ID,
        self::ATTR_KEY,
        self::ATTR_VALUE,
    ];

    protected $dates = [
        self::ATTR_CREATED_AT,
        self::ATTR_UPDATED_AT,
    ];

    public function settingCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SettingsCategory::class);
    }
}
