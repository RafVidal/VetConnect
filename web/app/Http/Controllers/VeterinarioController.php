<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinario;

class VeterinarioController extends Controller
{
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

        $itens= Veterinario::create([
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

       $veterinario->delete();

       return redirect()->route('veterinario.index')
                        ->with('successo','A exclusão foi um sucesso!');
    }
}
