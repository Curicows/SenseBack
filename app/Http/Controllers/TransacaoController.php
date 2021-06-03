<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transacao = Transacao::all();
        return response()->json($transacao->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->noContent();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $titulo = $request->get('titulo');
        $valor = $request->get('valor');
        $tipo = $request->get('tipo');
        $categoria = $request->get('categoria');
        if ($titulo === null || $valor === null || $tipo === null || $categoria === null) {
            return $this->responseError(400);
        }

        $transacao = Transacao::create([
            'titulo' => $titulo,
            'valor' => $valor,
            'tipo_id' => $tipo,
            'categoria_id' => $categoria
        ]);
        return response()->json($transacao->toArray());

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transacao = Transacao::find($id);
        if ($transacao == "") {
            return $this->responseError(404);
        }

        return response()->json($transacao->toArray());

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $transacao = Transacao::find($id);
        $titulo = $request->get('titulo');
        $valor = $request->get('valor');
        $tipo = $request->get('tipo');
        $categoria = $request->get('categoria');
        if ($titulo === null || $valor === null || $tipo === null || $categoria === null) {
            return $this->responseError(400);
        }
        if ($transacao == "") {
            return $this->responseError(404);
        }
        $transacao->update([
            'titulo' => $titulo,
            'valor' => $valor,
            'tipo_id' => $tipo,
            'categoria_id' => $categoria
        ]);
        return $this->responseError(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transacao = Transacao::find($id);
        if ($transacao == "") {
            return $this->responseError(404);
        }
        $transacao->delete();
        return $this->responseError(200);

    }


    public function responseError(int $statusCode): \Illuminate\Http\JsonResponse
    {
        if ($statusCode == 200) {
            return response()->json([
                "message" => "OK"
            ], 200);
        } elseif ($statusCode == 201) {
            return response()->json([
                "message" => "Inserido com sucesso."
            ], 201);
        } elseif ($statusCode == 400){
            return response()->json([
                "message" => "Sintaxe incorreta."
            ], 400);
        } elseif ($statusCode == 404) {
            return response()->json([
                "message" => "Não encontrado."
            ], 404);
        }
    }
}
