<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Veterinario;
use Illuminate\Support\Facades\Hash;

class VeterinarioController extends Controller
{

    protected $redirectTo = RouteServiceProvider::HOME;

    public function index()
    {
        $data = Veterinario::latest()->paginate(5);
        return view ('veterinario.index',compact('data'))
        ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view ('veterinario.create');
    }

    public function store(Request $request)
    {

        if($request->hasFile('img_vet')){
            $filenameWithExt= $request->file('img_vet')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('img_vet')->getClientOriginalName();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('img_vet')->storeAs('public/img_vet', $fileNameToStore);
        } else{
            $fileNameToStore = 'noimage.png';
        }

        $request->validate([
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
            'img_vet'           =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nome'              => 'required',
            'descricao'         => 'required',
            'atende_domiciliar' => 'required',
            'telefone'          => 'required',
            'estado'            => 'required',
            'CEP'               => 'required',
            'cidade'            => 'required',
            'bairro'            => 'required',
            'rua'               => 'required',
            'numero',
            'complemento',

        ]);

        $veterinario= Veterinario::create([
            'email'=>$request->email,
            'password'=>$request->password,
            'img_vet'=>$fileNameToStore,
            'nome'=>$request->nome,
            'descricao'=>mb_strtolower($request->descricao),
            'atende_domiciliar'=>$request->atende_domiciliar,
            'telefone'=>$request->telefone,
            'estado'=>$request->estado,
            'CEP'=>$request->CEP,
            'cidade'=>$request->cidade,
            'bairro'=>$request->bairro,
            'rua'=>$request->rua,
            'numero'=>$request->numero,
            'complemento'=>$request->complemento,
        ]);

        $veterinario_user = User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'isAdmin' => '2',
        ]);

        return redirect()->route('veterinario.index')
                        ->with('success','Veterinário adicionado com sucesso');
    }

    public function show(Veterinario $veterinario)
    {
         return view('veterinario.show',compact('veterinario'));
    }

    public function edit(Veterinario $veterinario)
    {
        return view('veterinario.edit',compact('veterinario'));

    }

    public function update(Request $request, Veterinario $veterinario)
    {

        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'atende_domiciliar' => 'required',
            'telefone' => 'required',
            'estado' => 'required',
            'CEP' => 'required',
            'cidade' => 'required',
            'bairro' => 'required',
            'rua' => 'required',
            'numero',
            'complemento',
        ]);

        $veterinario -> update($request->all());

        return redirect()->route('veterinario.index')
                        ->with('success','Veterinario atualizado com sucesso! ');
    }

    public function destroy(Veterinario $veterinario)
    {
        unlink('storage/img_vet/'.$veterinario->img_vet);

        $veterinario->delete();

        return redirect()->route('veterinario.index')
                        ->with('success','A exclusão foi um sucesso!');
    }
}
