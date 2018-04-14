<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use App\User;
use App\Consult;
use App\Admission;
use App\Technique;

class IndexController extends Controller
{
    public function index()
    {
    	return view('backend');
    }
    public function setting()
    {
    	return response()->json(Setting::first());
    }
    public function updateSetting(Request $request)
    {
    	$input = $request->id;
    	 $setting = Setting::findOrFail($input);
    	 $setting->site_name = $request->site_name;
    	 $setting->site_email = $request->site_email;
    	 $setting->site_description = $request->site_description;
    	 $setting->update();
    	 return response()->json(['saved' => true]);
    }
    //Stastictics
    public function getStats()
    {
        $user = User::count();
        $consult = Consult::count();
        $admission = Admission::count();
        $tech = Technique::count();
        return response()->json(['user' => $user, 'consult' => $consult, 'admission' => $admission, 'tech' => $tech]);
    }
}
