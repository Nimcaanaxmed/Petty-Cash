<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class SettingsController extends Controller
{
    public function Setting(){
        
        $setting = Setting::find(1);
        return view('setting.setting_update',compact('setting'));

    } // End Method 

       
    public function companySettingUpdate(Request $request){


        $setting_id = $request->id;
    
        if ($request->file('logo')) {
            // Delete existing image
            $existingImage = Setting::findOrFail($setting_id);
            // if (file_exists(public_path($existingImage->logo))) {
            //    unlink(public_path($existingImage->logo));
            // }
    
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('logo')->getClientOriginalExtension();
            $img = $manager->read($request->file('logo'));
            $img->resize(474, 199);
            $img->toPng(80)->save(base_path('public/upload/logo/' . $name_gen));
    
            $save_url = 'upload/logo/' . $name_gen;
    
            Setting::findOrFail($setting_id)->update([
                'name' => $request->name,
                'contact' => $request->contact,
                'email' => $request->email,
                'currency' => $request->currency,
                'address' => $request->address,
                'logo' => $save_url,
            ]);
    
            $notification = array(
                'toastr' => 'Settings Updated With Logo Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification); 
        }else{
    
            Setting::findOrFail($setting_id)->update([
                'name' => $request->name,
                'contact' => $request->contact,
                'email' => $request->email,
                'currency' => $request->currency,
                'address' => $request->address,
            ]);
    
            $notification = array(
                'toastr' => 'Settings Updated Without Logo Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification); 
        } 
    
    
    
    }
}
