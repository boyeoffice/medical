<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class QueryController extends Controller
{
    public function storeQuerySingle(Request $request)
    {
    	$this->validate($request, [
    		'items' => 'required|array|min:1',
    		'items.*.name' => 'required',
    	]);
    	 $items = [];
    	  foreach($request->items as $item) {
    	  	$arrData = ['name' => $item['name']];
    	  	DB::table('query_icd10_single')->insert($arrData);
    	  }
    }
    public function searchSingleQuery(Request $request)
    {
        $input = $request->search;
        $model = DB::table('query_icd10_single')->where('name', 'LIKE', '%' .$input. '%')->take(5)->get();
        return response()->json($model);
    }
    public function getSingleQuery(Request $request)
    {
        $model = DB::table('query_icd10_single')->orderBy($request->column, $request->direction)->paginate($request->per_page);
        return response()->json($model);
    }
    public function storeQueryGroup(Request $request)
    {
        $this->validate($request, [
            'items' => 'required|array|min:1',
            'items.*.name' => 'required'
        ]);
         $items = [];
          foreach($request->items as $item) {
            $arrData = ['name' => $item['name']];
            DB::table('query_icd10_group')->insert($arrData);
          }
    }
    public function getQueryGroup()
    {
        $model = DB::select('select * from query_icd10_group');
        return response()->json($model);
    }
    public function searchGroup(Request $request)
    {
        $input = $request->search;
        $model = DB::table('query_icd10_group')->where('name', 'LIKE', '%' .$input. '%')->take(5)->get();
        return response()->json($model);
    }
    public function origindestinationStore(Request $request)
    {
        $this->validate($request, [
            'items' => 'required|array|min:1',
            'items.*.name' => 'required'
        ]);
         $items = [];
          foreach($request->items as $item) {
            $arrData = ['name' => $item['name']];
            DB::table('query_origin_destination')->insert($arrData);
          }
    }
    public function origindestination()
    {
        $model = DB::table('query_origin_destination')->get();
        return response()->json($model);
    }
     public function searchDestination(Request $request)
    {
        $input = $request->search;
        $model = DB::table('query_origin_destination')->where('name', 'LIKE', '%'.$input.'%')->take(5)->get();
        return response()->json($model);
    }
     public function queryTech(Request $request)
    {
        $this->validate($request, [
            'items' => 'required|array|min:1',
            'items.*.name' => 'required'
        ]);
         $items = [];
          foreach($request->items as $item) {
            $arrData = ['name' => $item['name']];
            DB::table('query_techniques')->insert($arrData);
          }
    }
    public function getQueryTech()
    {
        $model = DB::select('select * from query_techniques');
        return response()->json($model);
    }
    public function searchTech(Request $request)
    {
        $input = $request->search;
        $model = DB::table('query_techniques')->where('name', 'LIKE', '%'.$input.'%')->take(5)->get();
        return response()->json($model);
    }

     public function postSpecialty(Request $request)
    {
        $this->validate($request, [
            'items' => 'required|array|min:1',
            'items.*.name' => 'required'
        ]);
         $items = [];
          foreach($request->items as $item) {
            $arrData = ['name' => $item['name']];
            DB::table('query_specialty')->insert($arrData);
          }
    }
    public function getSpecialty()
    {
        $model = DB::select('select * from query_specialty');
        return response()->json($model);
    }
     public function searchSpecialty(Request $request)
    {
        $input = $request->search;
        $model = DB::table('query_specialty')->where('name', 'LIKE', '%' .$input. '%')->take(5)->get();
        return response()->json($model);
    }
}
