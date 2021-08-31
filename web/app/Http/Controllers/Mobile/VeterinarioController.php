<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Veterinario;
use App\Models\User;
use Exception;
use DB;

class VeterinarioController extends Controller
{

    public function index()
    {
        try{
            
            $veterinario = Veterinario::all();
            if($veterinario){
                return response()->json(['dados' => $veterinario, 'status' => true]);
            }else{
                return response()->json(['message'=> 'Nenhum veterinário cadastrado', 'status' => true]);
            }
        } catch (Exception $e){
            return response()->json([
                'status'      => false,
                'response'  => $e->getMessage(),
                'message'   => 'Ocorreu um erro durante a pesquisa de veterinários!'
            ]);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome'                      => 'required|max:150',
            'email'                     => 'required|email|max:80|unique:users,email',
            'password'                  => 'required|min:6|max:24',
            'descricao'                 => 'required|max:350',
            'atende_domiciliar'         => 'required|boolean',
            'telefone'                  => 'required|celular_com_ddd',
            'estado'                    => 'required|size:2|uf',
            'cidade'                    => 'required|max:45',
            'bairro'                    => 'required|max:45',
            'rua'                       => 'required|max:80',
            'numero'                    => 'max:5',
            'complemento'               => 'max:45',
            'cep'                       => 'required|formato_cep',
        ]);

        if($validator->fails()){
            return response()->json($validator->messages()->get('*'), 200);
        }

        try{
            DB::beginTransaction();
            //Cria o veterinario
            $veterinario                            = new Veterinario;
            $veterinario->nome                      = $request->nome;
            $veterinario->descricao                 = $request->descricao;
            $veterinario->atende_domiciliar         = $request->atende_domiciliar;
            $veterinario->telefone                  = $request->telefone;
            $veterinario->estado                    = $request->estado;
            $veterinario->CEP                       = $request->cep;
            $veterinario->cidade                    = $request->cidade;
            $veterinario->bairro                    = $request->bairro;
            $veterinario->rua                       = $request->rua;
            $veterinario->numero                    = $request->numero;
            $veterinario->complemento               = $request->complemento;
            $veterinario->save();

            //Cria o usuário para o veterinario
            $user                               = new User;
            $user->email                        = $request->email;
            $user->password                     = bcrypt($request->password);
            $user->veterinario_id               = $veterinario->id;
            $user->veterinario                  = true;
            $user->veterinario                      = false;
            $user->save();

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
            return response()->json([
                                    'status'      => false,
                                    'response'  => $e->getMessage(),
                                    'message'   => 'Ocorreu um erro na criação de conta!'
                                ]);
        }

        return response()->json([
            'status'      => true,
            'message'   => 'Conta criada com sucesso!'
        ]);



    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome'                      => 'required|max:150',
            'email'                     => 'required|email|max:80',
            'password'                  => 'required|min:6|max:24',
            'descricao'                 => 'required|max:350',
            'atende_domiciliar'         => 'required|boolean',
            'telefone'                  => 'required|celular_com_ddd',
            'estado'                    => 'required|size:2|uf',
            'cidade'                    => 'required|max:45',
            'bairro'                    => 'required|max:45',
            'rua'                       => 'required|max:80',
            'numero'                    => 'max:5',
            'complemento'               => 'max:45',
            'cep'                       => 'required|formato_cep',
        ]);

        if($validator->fails()){
            return response()->json($validator->messages()->get('*'), 200);
        }

        try{
            DB::beginTransaction();

            //Atualiza o veterinario
            $veterinario                            = veterinario::findOrFail($id);
            $veterinario->nome                      = $request->nome;
            $veterinario->telefone                  = $request->telefone;
            $veterinario->descricao                 = $request->descricao;
            $veterinario->atende_domiciliar         = $request->atende_domiciliar;
            $veterinario->estado                    = $request->estado;
            $veterinario->CEP                       = $request->cep;
            $veterinario->cidade                    = $request->cidade;
            $veterinario->bairro                    = $request->bairro;
            $veterinario->rua                       = $request->rua;
            $veterinario->numero                    = $request->numero;
            $veterinario->complemento               = $request->complemento;
            $veterinario->save();

            //Atualiza o usuário do veterinario
            $user                               = $veterinario->users;
            if($user->email != $request->email){
                $valida = User::where('email', $request->email)->get();
                if(count($valida) > 0){
                    throw new Exception('Email específicado já cadastrado no sistema.');
                }
            }
            $user->email                        = $request->email;
            $user->password                     = bcrypt($request->password);
            $user->save();

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
            return response()->json([
                                    'status'      => false,
                                    'response'  => $e->getMessage(),
                                    'message'   => 'Ocorreu um erro na atualização da conta!'
                                ]);
        }

        return response()->json([
            'status'      => true,
            'message'   => 'Conta atualizada com sucesso!'
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
