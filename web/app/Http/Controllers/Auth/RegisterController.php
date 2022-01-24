<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'telefone'      => ['required', 'celular_com_ddd'],
            'estado'        => ['required', 'size:2', 'uf'],
            'cidade'        => ['required', 'max:45'],
            'bairro'        => ['required', 'max:80'],
            'rua'           => ['required', 'max:80'],
            'numero'        => ['max:5'],
            'complemento'   => ['max:45'],
            'cep'           => ['required', 'formato_cep']

        ]);
    }

    protected function create(array $data)
    {

        $cliente                            = new Cliente;
        $cliente->nome                      = $data['nome'];
        $cliente->telefone                  = $data['telefone'];
        $cliente->estado                    = $data['estado'];
        $cliente->CEP                       = $data['cep'];
        $cliente->cidade                    = $data['cidade'];
        $cliente->bairro                    = $data['bairro'];
        $cliente->rua                       = $data['rua'];
        $cliente->numero                    = $data['numero'];
        $cliente->complemento               = $data['complemento'];
        $cliente->save();

        return User::create([
            'cliente_id' => $cliente->id,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'isAdmin' => '0',
            
        ]);
    }
}
