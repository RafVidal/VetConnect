<?php

namespace App\Http\Controllers;

use App\Models\CartaoDeVacinacao;
use Illuminate\Http\Request;

class CartaoDeVacinacaoController extends Controller
{

    public function index()
    {
        $data = CartaoDeVacinacao::latest()->paginate(5);
        return view ('cartao_de_vacinacao.index',compact('data'))
        ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view ('cartao_de_vacinacao.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'data' => 'required',
            'descricao' => 'required',
            'vacina_id' => 'required',
            'animal_id' => 'required',
        ]);

        $itens= CartaoDeVacinacao::create([
            'data'=>$request->data,
            'descricao'=>mb_strtolower($request->descricao),
            'vacina_id'=>$request->vacina_id,
            'animal_id'=>$request->animal_id,

        ]);

        return redirect()->route('cartao_de_vacinacao.index')
                        ->with('success','Cartão de Vacina adicionado com sucesso');
    }

    public function show(CartaoDeVacinacao $cartao_de_vacinacao)
    {
         return view('cartao_de_vacinacao.show',compact('cartao_de_vacinacao'));
    }

    public function edit(CartaoDeVacinacao $cartao_de_vacinacao)
    {
        return view('cartao_de_vacinacao.edit',compact('cartao_de_vacinacao'));

    }

    public function update(Request $request, CartaoDeVacinacao $cartao_de_vacinacao)
    {

        $request->validate([
            'data' => 'required',
            'descricao' => 'required',
            'vacina_id' => 'required',
            'animal_id' => 'required',
        ]);

        $cartao_de_vacinacao -> update($request->all());

        return redirect()->route('cartao_de_vacinacao.index')
                        ->with('success','Cartão de Vacina atualizado com sucesso! ');
    }

    public function destroy(CartaoDeVacinacao $cartao_de_vacinacao)
    {

       $cartao_de_vacinacao->delete();

       return redirect()->route('cartao_de_vacinacao.index')
                        ->with('success','A exclusão foi um sucesso!');
    }
}
