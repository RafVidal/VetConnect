<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Animal;
use App\Models\Medicacao;
use App\Models\CartaoDeVacinacao;
use Exception;
use DB;

class AnimalController extends Controller
{

    public function index()
    {
        try{
            //$cliente = auth()->user()->_cliente->id
            $animal = Animal::all();//where('cliente_id', $cliente)->get();
            if($animal){
                return response()->json(['dados' => $animal, 'status' => true]);
            }else{
                return response()->json(['message'=> 'Nenhum animal cadastrado', 'status' => true]);
            }
        } catch (Exception $e){
            return response()->json([
                'status'      => false,
                'response'  => $e->getMessage(),
                'message'   => 'Ocorreu um erro durante a pesquisa de animais!'
            ]);
        }

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
            return response()->json([$validator->messages()->get('*'),
                                    'status'      => false,], 200);
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

    public function show($id)
    {
        try{
            $animal = Animal::findOrFail($id);//where('cliente_id', $cliente)->get();
            if($animal){
                return response()->json(['dados'=>$animal, 'status' => true]);
            }else{
                return response()->json(['message'=> 'Animal não encontrado', 'status' => true]);
            }
        } catch (Exception $e){
            return response()->json([
                'status'      => false,
                'response'  => $e->getMessage(),
                'message'   => 'Ocorreu um erro ao encontrar o animal!'
            ]);
        }

    }
    public function edit($id)
    {
        //
    }

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
            return response()->json([$validator->messages()->get('*'),
                                    'status'      => false,], 200);
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

    public function destroy($id)
    {
        try{
            $medicacao = Medicacao::where('animal_id', $id)->get();
            if(count($medicacao)>0){
                throw new Exception('Impossível realizar a exclusão. O animal em questão está em processo de medicação.');
            }

            DB::beginTransaction();
                $cvs = CartaoDeVacinacao::where('animal_id', $id)->get();
                foreach($cvs as $cv){
                    $cv->delete();
                }
                
                $animal = Animal::findOrFail($id);
                $animal->delete();
                return response()->json(['status'      => true,
                                        'message'   => 'Animal deletado com sucesso!',
                                        'teste' => $animal], 200);
            DB::commit();
        } catch (Exception $e){
            DB::rollback();
            return response()->json([
                'status'      => false,
                'response'  => $e->getMessage(),
                'message'   => 'Ocorreu um erro na deleção do animal!'
            ]);
        }
    }
}
