<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTech;
use App\Http\Requests\UpdateTech;
use App\Technique;

class TechController extends Controller
{
    public function index()
    {
        $tech = Technique::filterPaginateOrder();
        return response()->json(['model' => $tech]);
    }

    public function store(CreateTech $request)
    {
        $idTech = $request->id;
        //verified if exist Technique
        $data = Technique::where('id', $idTech)->first();
        //Exist Technique
        if(!empty($data)){
            $tech = Technique::where('id', $idTech)->first();
            $tech->update($request->all());
            return response()->json(['saved' => true]);
        }else{
            $tech = $request->all();
            Technique::create($tech);
            return response()->json(['created' => true]);
        }
    }

    public function destroy($id)
    {
        $tech  = Technique::find($id);
        $tech->delete();
        return response()->json(['deleted' => true]);
    }
}
