<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cliente;
use App\Models\User;
use Exception;
use DB;

class ClienteController extends Controller
{

    public function index()
    {
        //
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
            //Cria o cliente
            $cliente                            = new Cliente;
            $cliente->nome                      = $request->nome;
            $cliente->telefone                  = $request->telefone;
            $cliente->estado                    = $request->estado;
            $cliente->CEP                       = $request->cep;
            $cliente->cidade                    = $request->cidade;
            $cliente->bairro                    = $request->bairro;
            $cliente->rua                       = $request->rua;
            $cliente->numero                    = $request->numero;
            $cliente->complemento               = $request->complemento;
            $cliente->save();

            //Cria o usuário para o cliente
            $user                               = new User;
            $user->email                        = $request->email;
            $user->password                     = bcrypt($request->password);
            $user->cliente_id                   = $cliente->id;
            $user->veterinario                  = false;
            $user->cliente                      = true;
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
        try{
            $cliente = Cliente::findOrFail($id);//auth()->user()->_cliente;
            if($cliente){
                return response()->json(['dados'=>$cliente, 'status' => true]);
            }else{
                return response()->json(['message'=> 'Usuário não encontrado', 'status' => true]);
            }
        } catch (Exception $e){
            return response()->json([
                'status'      => false,
                'response'  => $e->getMessage(),
                'message'   => 'Ocorreu um erro ao encontrar o usuário!'
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
            'email'                     => 'required|email|max:80',
            'password'                  => 'required|min:6|max:24',
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

            //Atualiza o cliente
            $cliente                            = Cliente::findOrFail($id);
            $cliente->nome                      = $request->nome;
            $cliente->telefone                  = $request->telefone;
            $cliente->estado                    = $request->estado;
            $cliente->CEP                       = $request->cep;
            $cliente->cidade                    = $request->cidade;
            $cliente->bairro                    = $request->bairro;
            $cliente->rua                       = $request->rua;
            $cliente->numero                    = $request->numero;
            $cliente->complemento               = $request->complemento;
            $cliente->save();

            //Atualiza o usuário do cliente
            $user                               = $cliente->users;
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
