<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAgenda;
use App\Http\Requests\UpdateAgenda;
use App\Agenda;
use Auth;
use Carbon\Carbon;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agenda = Agenda::orderBy($request->column, $request->direction)->paginate($request->per_page);
        return response()->json($agenda);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAgenda $request)
    {
        $agenda = new Agenda();
        $agenda->user_id = Auth::id();
        $agenda->title = $request->title;
        $agenda->start_date = Carbon::parse($request->start_date)->toDateTimeString();
        $agenda->end_date = Carbon::parse($request->end_date)->toDateTimeString();
        $agenda->location = $request->location;
        $agenda->notes = $request->notes;
        $agenda->save();
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agenda = Agenda::find($id);
        return response()->json($agenda);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agenda = Agenda::find($id);
        $agenda->title = $request->title;
        $agenda->start_date = Carbon::parse($request->start_date)->toDateTimeString();
        $agenda->end_date = Carbon::parse($request->end_date)->toDateTimeString();
        $agenda->location = $request->location;
        $agenda->notes = $request->notes;
        $agenda->save();
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Agenda::find($id);
        $agenda->delete();
        return response()->json(['deleted' => true]);
    }
}
