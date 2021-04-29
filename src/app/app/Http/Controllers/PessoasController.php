<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePessoasRequest;
use App\Models\Pessoas;
use App\Facades\Genero;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pessoas'] = Pessoas::all();

        return response()->json(compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePessoasRequest $request)
    {
        $validatedData = $request->validated();
        $genero = Genero::genderFull($validatedData['nome']);
        Pessoas::create([
            'nome' => $validatedData['nome'],
            'email' => $validatedData['email'],
            'senha' => bcrypt($validatedData['senha']),
            'data_nascimento' => $validatedData['data_nascimento'],
            'genero' => Pessoas::genero($genero)
        ]);
        return response()->json(
        array('data' => 
            array('mensagem' => 'Criado com sucesso')
        ), 201);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePessoasRequest $request, $id)
    {
        $validatedData = $request->validated();
        $genero = Genero::genderFull($validatedData['nome']);
        Pessoas::where('id', $id)->update([
            'nome' => $validatedData['nome'],
            'email' => $validatedData['email'],
            'senha' => bcrypt($validatedData['senha']),
            'data_nascimento' => $validatedData['data_nascimento'],
            'genero' => Pessoas::genero($genero),
        ]);
        return response()->json(
            array('data' => 
                array('mensagem' => 'Atualizado com sucesso')
            ), 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pessoas::destroy($id);
        return response()->json(
            array('data' => 
                array('mensagem' => 'Deletado com sucesso')
            ), 200);
    }
}
