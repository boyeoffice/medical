<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AtividadeCreate;
use App\Http\Requests\AtividadeUpdate;
use App\Atividade;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $at = Atividade::orderBy($request->column, $request->direction)->paginate($request->per_page);
        return response()->json($at);
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
    public function store(AtividadeCreate $request)
    {
        $at = new Atividade;
        $at->tipo = $request->tipo;
        $at->titulo = $request->titulo;
        $at->nome = $request->nome;
        $at->data = $request->data;
        $at->estado = $request->estado;
        $at->indexada = $request->indexada;
        $at->publicacao = $request->publicacao;
        $at->autores = $request->autores;
        $at->abstract = $request->abstract;
        $at->primeiro = $request->primeiro;
        $at->premios = $request->premios;
        $at->observacoes = $request->observacoes;
        $at->save();
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
        $at = Atividade::find($id);
        return response()->json($at);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtividadeUpdate $request, $id)
    {
        $at = Atividade::find($id);
        $at->tipo = $request->tipo;
        $at->titulo = $request->titulo;
        $at->nome = $request->nome;
        $at->data = $request->data;
        $at->estado = $request->estado;
        $at->indexada = $request->indexada;
        $at->publicacao = $request->publicacao;
        $at->autores = $request->autores;
        $at->abstract = $request->abstract;
        $at->primeiro = $request->primeiro;
        $at->premios = $request->premios;
        $at->observacoes = $request->observacoes;
        $at->update();
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
        $at = Atividade::find($id);
        $at->delete();
        return response()->json($at);
    }
}
