<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingsCategory;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $mainSettings = SettingsCategory::factory()->create([
            SettingsCategory::ATTR_NAME => 'Общие настройки',
        ]);

        Setting::factory()->create([
            Setting::ATTR_SETTINGS_CATEGORY_ID => $mainSettings->id,
            Setting::ATTR_KEY => 'title',
            Setting::ATTR_VALUE => 'OhayoCMS',
        ]);

        Setting::factory()->create([
            Setting::ATTR_SETTINGS_CATEGORY_ID => $mainSettings->id,
            Setting::ATTR_KEY => 'theme',
            Setting::ATTR_VALUE => 'default',
        ]);

        Setting::factory()->create([
            Setting::ATTR_SETTINGS_CATEGORY_ID => $mainSettings->id,
            Setting::ATTR_KEY => 'meta_description',
            Setting::ATTR_VALUE => 'OhayoCMS - Лучшая CMS для игровых порталов построенная на Laravel 8.',
        ]);

        Setting::factory()->create([
            Setting::ATTR_SETTINGS_CATEGORY_ID => $mainSettings->id,
            Setting::ATTR_KEY => 'meta_title',
            Setting::ATTR_VALUE => 'OhayoCMS - CMS для игровых порталов.',
        ]);

        Setting::factory()->create([
            Setting::ATTR_SETTINGS_CATEGORY_ID => $mainSettings->id,
            Setting::ATTR_KEY => 'site_down',
            Setting::ATTR_VALUE => 'false',
        ]);

        $paymentSettings = SettingsCategory::factory()->create([
            SettingsCategory::ATTR_NAME => 'Платежные системы',
        ]);

        Setting::factory()->create([
            Setting::ATTR_SETTINGS_CATEGORY_ID => $paymentSettings->id,
            Setting::ATTR_KEY => 'unitpay_allow',
            Setting::ATTR_VALUE => 'false',
        ]);

        Setting::factory()->create([
            Setting::ATTR_SETTINGS_CATEGORY_ID => $paymentSettings->id,
            Setting::ATTR_KEY => 'unitpay_public_key',
            Setting::ATTR_VALUE => '',
        ]);

        Setting::factory()->create([
            Setting::ATTR_SETTINGS_CATEGORY_ID => $paymentSettings->id,
            Setting::ATTR_KEY => 'unitpay_secret_key',
            Setting::ATTR_VALUE => '',
        ]);
    }
}
