<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias->toArray());
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
        $nome = $request->json()->get('nome');
        if ($nome === null) {
            return $this->responseError(400);
        }

        Categoria::create([
            'nome' => $nome
        ]);
        return $this->responseError(201);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        if ($categoria == "") {
            return $this->responseError(404);
        }

        return response()->json($categoria->toArray());

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
        $categoria = Categoria::find($id);
        $nome = $request->json()->get('nome');
        if ($categoria == "") {
            return $this->responseError(404);
        }
        if ($nome === null) {
            return $this->responseError(400);
        }
        $categoria->update([
            'nome' => $nome
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
        $categoria = Categoria::find($id);
        if ($categoria == "") {
            return $this->responseError(404);
        }
        $categoria->delete();
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
