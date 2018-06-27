<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormacaoCreate;
use App\Http\Requests\FormacaoUpdate;
use App\Formacao;
use Illuminate\Support\Facades\Storage;

class FormacaoController extends Controller
{
    private $document_ext = ['doc', 'docx', 'pdf', 'odt', 'xslx'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $form = Formacao::orderBy($request->column, $request->direction)->paginate($request->per_page);
        return response()->json($form);
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
    public function store(FormacaoCreate $request)
    {
        $form = new Formacao;
        $form->tipo = $request->tipo;
        $form->nome = $request->nome;
        $form->entidade_organizadora = $request->entidade_organizadora;
        $form->local = $request->local;
        $form->data = $request->data;
        $form->nacional = $request->nacional;
        $form->nota = $request->nota;
        $form->observacoes = $request->observacoes;
        $form->save();
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
        $form = Formacao::find($id);
        return response()->json($form);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormacaoUpdate $request, $id)
    {
        $exploded = explode(',', $request->anexos);
        $decoded = base64_decode($exploded[1]);
        $file = $request->anexos;
        $ext = $file->getClientOriginalExtension();
        Storage::putFileAs('/public/' . $file . '.' . $ext);

        $form = Formacao::find($id);
        $form->tipo = $request->tipo;
        $form->nome = $request->nome;
        $form->entidade_organizadora = $request->entidade_organizadora;
        $form->local = $request->local;
        $form->data = $request->data;
        $form->nacional = $request->nacional;
        $form->nota = $request->nota;
        $form->observacoes = $request->observacoes;
        $form->update();
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
        $form = Formacao::find($id);
        $form->delete();
        return response()->json(['deleted' => true]);
    }
}
