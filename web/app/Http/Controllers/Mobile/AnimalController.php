<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Animal;
use Exception;
use DB;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome'                      => 'required|max:150',
            'especie_id'                => 'required|exists:especie,id',
            'raca'                      => 'max:20',
            'sexo'                      => 'required|boolean',
            'cor'                       => 'max:20',
            'nascimento'                => 'max:10',
            'cliente_id'                => 'required|exists:cliente,id',
        ]);
        if($validator->fails()){
            return response()->json($validator->messages()->get('*'), 200);
        }

        try{
            DB::beginTransaction();
            //Cria o animal
            $animal                            = new Animal;
            $animal->nome                      = $request->nome;
            $animal->especie_id                = $request->especie_id ;
            $animal->raca                      = $request->raca;
            $animal->sexo                      = $request->sexo;
            $animal->cor                       = $request->cor;
            $animal->nascimento                = $request->nascimento;
            $animal->cliente_id                = $request->cliente_id;
            $animal->save();

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
            return response()->json([
                                    'status'      => false,
                                    'response'  => $e->getMessage(),
                                    'message'   => 'Ocorreu um erro na criação do animal!'
                                ]);
        }

        return response()->json([
            'status'      => true,
            'message'   => 'Animal criado com sucesso!'
        ]);



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
        //
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
        $validator = Validator::make($request->all(), [
            'nome'                      => 'required|max:150',
            'especie_id'                => 'required|exists:especie,id',
            'raca'                      => 'max:20',
            'sexo'                      => 'required|boolean',
            'cor'                       => 'max:20',
            'nascimento'                => 'max:10',
            'cliente_id'                => 'required|exists:cliente,id',
        ]);
        if($validator->fails()){
            return response()->json($validator->messages()->get('*'), 200);
        }

        try{
            DB::beginTransaction();
            //Atualiza o animal
            $animal                            = Animal::findOrFail($id);
            $animal->nome                      = $request->nome;
            $animal->especie_id                = $request->especie_id ;
            $animal->raca                      = $request->raca;
            $animal->sexo                      = $request->sexo;
            $animal->cor                       = $request->cor;
            $animal->nascimento                = $request->nascimento;
            $animal->cliente_id                = $request->cliente_id;
            $animal->save();

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
            return response()->json([
                                    'status'      => false,
                                    'response'  => $e->getMessage(),
                                    'message'   => 'Ocorreu um erro na atualização do animal!'
                                ]);
        }

        return response()->json([
            'status'      => true,
            'message'   => 'Animal atualizado com sucesso!'
        ]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
