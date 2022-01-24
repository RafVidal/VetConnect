<?php

namespace App\Http\Controllers;

use App\Models\CartaoDeVacinacao;
use App\Models\Animal;
use App\Models\Vacina;
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
        $data['vacinas'] = Vacina::all();
        $data['animais'] = Animal::all();
        return view ('cartao_de_vacinacao.create', $data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'data' => 'required',
            'descricao' => 'required',
            'status' => 'required',
            'vacina_id' => 'required',
            'animal_id' => 'required',
        ]);

        $itens= CartaoDeVacinacao::create([
            'data'=>$request->data,
            'descricao'=>mb_strtolower($request->descricao),
            'status'=>$request->status,
            'vacina_id'=>$request->vacina_id,
            'animal_id'=>$request->animal_id,

        ]);

        return redirect()->route('vet.cartao_de_vacinacao.index')
                        ->with('success','Cartão de Vacina adicionado com sucesso');
    }

    public function show(CartaoDeVacinacao $cartao_de_vacinacao)
    {
        $cartao_de_vacinacao= CartaoDeVacinacao::all();
        return view('cartao_de_vacinacao.show',['cartao_de_vacinacao'=>$cartao_de_vacinacao]);
    }

    public function edit(CartaoDeVacinacao $cartao_de_vacinacao)
    {
        $data['vacinas'] = Vacina::all();
        $data['animais'] = Animal::all();
        return view('cartao_de_vacinacao.edit',['cartao_de_vacinacao'=>$cartao_de_vacinacao] ,$data);

    }

    public function update(Request $request, CartaoDeVacinacao $cartao_de_vacinacao)
    {

        $request->validate([
            'data' => 'required',
            'descricao' => 'required',
            'status' => 'required',
        ]);

        $cartao_de_vacinacao -> update($request->all());

        return redirect()->route('vet.cartao_de_vacinacao.index')
                        ->with('success','Cartão de Vacina atualizado com sucesso! ');
    }

    public function destroy(CartaoDeVacinacao $cartao_de_vacinacao)
    {

       $cartao_de_vacinacao->delete();

       return redirect()->route('vet.cartao_de_vacinacao.index')
                        ->with('success','A exclusão foi um sucesso!');
    }
}
