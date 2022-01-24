<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Medicacao;
use App\Models\CartaoDeVacinacao;
use Illuminate\Http\Request;

class PetsController extends Controller
{

    public function index()
    {
        $data = Animal::latest()->paginate(5);
        return view ('animal.index',compact('data'))
        ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('animal.create');
    }

    public function store(Request $request)
    {
        if($request->hasFile('img_pet')){
            $filenameWithExt= $request->file('img_pet')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('img_pet')->getClientOriginalName();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('img_pet')->storeAs('public/img_pet', $fileNameToStore);
        } else{
            $fileNameToStore = 'noimage.png';
        }

        $request->validate([
            'img_pet'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nome' => 'required',
            'especie'=>'required',
            'raca' => 'required',
            'sexo' => 'required',
            'cor' => 'required',
            'nascimento' => 'required',
            'cliente_id' => 'required',

        ]);

        $itens= Animal::create([
            'img_pet'=>$fileNameToStore,
            'nome'=>$request->nome,
            'especie'=>$request->especie,
            'raca'=>$request->raca,
            'sexo'=>$request->sexo,
            'cor'=>$request->cor,
            'nascimento'=>$request->nascimento,
            'cliente_id'=>$request->cliente_id,

        ]);

        return redirect()->route('cliente.animal.index')
                        ->with('success','Pet adicionado com sucesso');
    }

    public function show($id)
    {
        $animal = Animal::findorfail ($id);
        $cartao_de_vacinacao= CartaoDeVacinacao::all();
        $medicacao= Medicacao::all();
        return view('animal.show',['cartao_de_vacinacao'=>$cartao_de_vacinacao,'medicacao'=>$medicacao,'animal'=>$animal]);
    }

    public function edit(Animal $animal)
    {
        return view('animal.edit',compact('animal'));

    }

    public function update(Request $request, Animal $animal)
    {

        $request->validate([
            'nome' => 'required',
            'especie'=>'required',
            'raca' => 'required',
            'sexo' => 'required',
            'cor' => 'required',
            'nascimento' => 'required',
        ]);

        $animal -> update($request->all());

        return redirect()->route('cliente.animal.index')
                        ->with('success','Pet atualizado com sucesso! ');
    }

    public function destroy(Animal $animal)
    {
        unlink('storage/img_pet/'.$animal->img_pet);

       $animal->delete();

       return redirect()->route('cliente.animal.index')
                        ->with('success','A exclusão foi um sucesso!');
    }
}
