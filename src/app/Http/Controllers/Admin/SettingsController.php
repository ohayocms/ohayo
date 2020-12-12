<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveMainSettingsRequest;
use App\Models\Setting;
use App\Models\SettingsCategory;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index', [
            'settings' => SettingsCategory::with('settings')->findOrFail(1),
        ]);
    }

    public function saveMainSettings(SaveMainSettingsRequest $request)
    {
        foreach ($request->get('settings') as $key => $setting) {
            if ($setting === null) {
                continue;
            }
            $settingModel = Setting::where(Setting::ATTR_KEY, '=', $key)
                ->where(Setting::ATTR_SETTINGS_CATEGORY_ID, '=', 1)
                ->first();
            $settingModel->update([
                'value' => $setting,
            ]);
        }
        return redirect()->route('admin.settings.index');
    }

    public function paymentSystems()
    {
        return view('admin.settings.payment', [
            'settings' => SettingsCategory::with('settings')->findOrFail(2),
        ]);
    }

    public function savePaymentSystems(SaveMainSettingsRequest $request)
    {
        foreach ($request->get('settings') as $key => $setting) {
            if ($setting === null) {
                continue;
            }
            $settingModel = Setting::where(Setting::ATTR_KEY, '=', $key)
                ->where(Setting::ATTR_SETTINGS_CATEGORY_ID, '=', 2)
                ->first();
            $settingModel->update([
                'value' => $setting,
            ]);
        }
        return redirect()->route('admin.settings.payment.index');
    }
}
