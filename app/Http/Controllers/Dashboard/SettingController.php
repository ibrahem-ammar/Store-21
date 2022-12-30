<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','is_admin']);
    }

    public function index()
    {
        return view('dashboard.settings');
    

    }

    public function Update(UpdateSettingRequest $request)
    {
        // dd($request->logo);
        
        $setting = Setting::first();
        
        if ($request->hasFile('logo')) {
            $logo = $setting->logo;
        }

        if ($request->hasFile('favicon')) {
            $favicon = $setting->favicon;
        }
        
        
        $setting->update($request->validated());

        if ($request->hasFile('logo')) {
            $setting->update([
                'logo' => $this->uploadImage($request->file('logo'))
            ]);

            if (file_exists( public_path().'/dashboard_assets/images/'.$logo)) {
                 \File::delete(public_path().'/dashboard_assets/images/'.$logo);
            }

        }

        if ($request->hasFile('favicon')) {
            $setting->update([
                'favicon' => $this->uploadImage($request->file('favicon'))
            ]);

            if (file_exists( public_path().'/dashboard_assets/images/'.$favicon)) {
                 \File::delete(public_path().'/dashboard_assets/images/'.$favicon);
            }
        }
        


        return redirect()->route('dashboard.settings.index')->with('success', 'تم تحديث الاعدادات بنجاح');
    }

    public function uploadImage($image)
    {
        $destinationPath = public_path('/dashboard_assets/images');

        $imageName = md5(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . microtime()).'.'.$image->getClientOriginalExtension();
        
        $imgFile = Image::make($image->getRealPath());
        
        $imgFile->resize(150, 150, function ($constraint) {
		    $constraint->aspectRatio();
		})->stream();

        $image->move($destinationPath, $imageName);

        return $imageName;
    }
}
