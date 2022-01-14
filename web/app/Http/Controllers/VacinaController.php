<?php

namespace App\Http\Controllers;

use App\Models\Vacina;
use Illuminate\Http\Request;

class VacinaController extends Controller
{

    public function index()
    {
        $data = Vacina::latest()->paginate(5);
        return view ('vacina.index',compact('data'))
        ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view ('vacina.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'idade_animal' => 'required',
            'descricao' => 'required',
            'obrigatoria' => 'required',
        ]);

        $itens= Vacina::create([
            'nome'=>$request->nome,
            'idade_animal'=>$request->idade_animal,
            'descricao'=>mb_strtolower($request->descricao),
            'obrigatoria'=>$request->obrigatoria,
        ]);

        return redirect()->route('vacina.index')
                        ->with('success','Vacina adicionada com sucesso');
    }

    public function show(Vacina $vacina)
    {
         return view('vacina.show',compact('vacina'));
    }

    public function edit(Vacina $vacina)
    {
        return view('vacina.edit',compact('vacina'));

    }

    public function update(Request $request, Vacina $vacina)
    {

        $request->validate([
            'nome' => 'required',
            'idade_animal' => 'required',
            'descricao' => 'required',
            'obrigatoria' => 'required',
        ]);

        $vacina -> update($request->all());

        return redirect()->route('vacina.index')
                        ->with('success','Vacina atualizada com sucesso! ');
    }

    public function destroy(Vacina $vacina)
    {

       $vacina->delete();

       return redirect()->route('vacina.index')
                        ->with('success','A exclusão foi um sucesso!');
    }
}
