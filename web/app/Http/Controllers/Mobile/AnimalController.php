<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Animal;
use App\Models\Medicacao;
use App\Models\CartaoDeVacinacao;
use App\Models\Especie;
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
            DB::commit();
                return response()->json(['status'      => true,
<<<<<<< HEAD
                                        'message'   => 'Animal deletado com sucesso!',
                                        'teste' => $animal], 200);
=======
                                        'message'   => 'Animal deletado com sucesso!'], 200);
            DB::commit();
>>>>>>> dc6f31f8ba9ce5a31d963d240073317cd19e17cd
        } catch (Exception $e){
            DB::rollback();
            return response()->json([
                'status'      => false,
                'response'  => $e->getMessage(),
                'message'   => 'Ocorreu um erro na deleção do animal!'
            ]);
        }
    }

    public function medicacao($id){
<<<<<<< HEAD
        try{
            //$cliente = auth()->user()->_cliente->id
            $medicacao = Medicacao::where('animal_id', $id)->get();//where('cliente_id', $cliente)->get();
            if(count ($medicacao)>0){
                return response()->json(['dados' => $medicacao, 'status' => true]);
            }else{
                return response()->json(['message'=> 'Nenhuma medicação cadastrada', 'status' => false]);
            }
        } catch (Exception $e){
            return response()->json([
                'status'      => false,
                'response'  => $e->getMessage(),
                'message'   => 'Ocorreu um erro durante a pesquisa de medicação dos animais!'
            ]);
        }

    }

    public function especie(){
        try{
            //$cliente = auth()->user()->_cliente->id
            $especie = Especie::all();//where('cliente_id', $cliente)->get();
            if(count ($especie)>0){
                return response()->json(['dados' => $especie, 'status' => true]);
            }else{
                return response()->json(['message'=> 'Espécie não cadastrada', 'status' => false]);
            }
        } catch (Exception $e){
            return response()->json([
                'status'      => false,
                'response'  => $e->getMessage(),
                'message'   => 'Ocorreu um erro durante a pesquisa de espécies!'
            ]);
        }

=======
        $medicacao = Medicacao::where('animal_id', $id)->get();
        if($medicacao){
            return response()->json(['status'      => true,
                                        'message'   => 'Medicações do animal',
                                        'response' => $medicacao], 200);
        }else{
            return response()->json(['status'      => true,
                                        'message'   => 'Nenhuma medicação cadastrada para este animal.',
                                        'response' => null], 200);
        }
    }

    public function cartao_vacinacao($id){
        $cv = CartaoDeVacinacao::where('animal_id', $id)->get();
        if($cv){
            return response()->json(['status'      => true,
                                        'message'   => 'Cartão de vacinação do animal',
                                        'response' => $cv], 200);
        }else{
            return response()->json(['status'      => true,
                                        'message'   => 'Nenhuma vacina cadastrada no cartão.',
                                        'response' => null], 200);
        }
>>>>>>> dc6f31f8ba9ce5a31d963d240073317cd19e17cd
    }
}
