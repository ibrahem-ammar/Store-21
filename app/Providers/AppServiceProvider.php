<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!app()->runningInConsole()){
        $setting = Setting::firstOr(function () {
            return Setting::create([
                 'name' => 'This Field Is Empity, Please Add Value !',
                'description' => 'This Field Is Empity, Please Add Value !',
                'logo' => 'This Field Is Empity, Please Add Value !',
                'favicon' => 'This Field Is Empity, Please Add Value !',
                'email' => 'This Field Is Empity, Please Add Value !',
                'phone' => 'This Field Is Empity, Please Add Value !',
                'address' => 'This Field Is Empity, Please Add Value !',
                'facebook' => 'This Field Is Empity, Please Add Value !',
                'twitter' => 'This Field Is Empity, Please Add Value !',
                'instagram' => 'This Field Is Empity, Please Add Value !',
                'youtube' => 'This Field Is Empity, Please Add Value !',
                'tiktok' => 'This Field Is Empity, Please Add Value !'
             ]);
          });
  
  
          view()->share('setting', $setting);
        }
    }
}
