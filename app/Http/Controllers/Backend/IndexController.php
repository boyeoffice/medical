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
        $tech = Technique::count();

        // Data Calculate
        $consult = Consult::count();
        $deathConsult = Consult::where('obito', 'Yes')->count();
        $deathRateConsult = $deathConsult / $consult;

        $admission = Admission::count();
        $deathAdmission = Admission::where('obito', 'Yes')->count();
        $deathRateAdmission = $deathAdmission / $admission;

        //Means
        $getDays = Admission::pluck('dias_internamento')->toArray();
        $sumUp = array_sum($getDays);
        $mean = $sumUp / $admission;

        return response()->json(['user' => $user, 'consult' => $deathRateConsult, 'admission' => $deathRateAdmission, 'tech' => $mean]);
    }
    //Graph 
    public function getPieChartConsultMF()
    {
        $male = Consult::where('sexo', 'M')->count();
        $female = Consult::where('sexo', 'F')->count();
        return response()->json([$male, $female]);

    }
    public function getPieChartAdmissiontMF()
    {
        $male = Admission::where('sexo', 'M')->count();
        $female = Admission::where('sexo', 'F')->count();
        return response()->json([$male, $female]);
    }
    public function getAdminOrigin()
    {
        $Consulta_Externa = Admission::where('origem', 'Consulta Externa')->count();
        $Internamento = Admission::where('origem', 'Internamento')->count();
        $UAVC = Admission::where('origem', 'UAVC')->count();
        $UCIP = Admission::where('origem', 'UCIP')->count();
        $UCISU = Admission::where('origem', 'UCISU')->count();
        return response()->json([$Consulta_Externa, $Internamento, $UAVC, $UCIP, $UCISU]);
    }
    public function getConsultOrigin()
    {
        $Consulta_Externa = Consult::where('origem', 'Consulta Externa')->count();
        $Internamento = Consult::where('origem', 'Internamento')->count();
        $UAVC = Consult::where('origem', 'UAVC')->count();
        $UCIP = Consult::where('origem', 'UCIP')->count();
        $UCISU = Consult::where('origem', 'UCISU')->count();
        return response()->json([$Consulta_Externa, $Internamento, $UAVC, $UCIP, $UCISU]);
    }
}
