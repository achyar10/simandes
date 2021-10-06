<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            $banner = Banner::where(['is_active' => true])->get();
            $setting = Setting::find(1);
            config([
                'banner' => $banner,
                'setting' => $setting
            ]);
            
        } catch (\Throwable $e) {
            config(['banner' => '']);
        }
    }
}
