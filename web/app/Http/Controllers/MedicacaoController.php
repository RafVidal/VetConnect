<?php

namespace App\Http\Controllers;

use App\Models\Medicacao;
use App\Models\Animal;
use Illuminate\Http\Request;

class MedicacaoController extends Controller
{

    public function index()
    {
        $data = Medicacao::latest()->paginate(5);
        return view ('medicacao.index',compact('data'))
        ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $data['animais'] = Animal::all();
        return view ('medicacao.create', $data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'medicamento' => 'required',
            'descricao' => 'required',
            'dosagem' => 'required',
            'intervalo' => 'required',
            'data_fim' => 'required',
            'animal_id' => 'required',
        ]);

        $itens= Medicacao::create([
            'medicamento'=>$request->medicamento,
            'descricao'=>mb_strtolower($request->descricao),
            'dosagem'=>$request->dosagem,
            'intervalo'=>$request->intervalo,
            'data_fim'=>$request->data_fim,
            'animal_id'=>$request->animal_id,
        ]);

        return redirect()->route('vet.medicacao.index')
                        ->with('success','Medicação adicionada com sucesso');
    }

    public function show(Medicacao $medicacao)
    {
        $medicacao= Medicacao::all();
        return view('medicacao.show',compact('medicacao'));
    }

    public function edit(Medicacao $medicacao)
    {
        $data['animais'] = Animal::all();
        return view('medicacao.edit',['medicacao'=>$medicacao] ,$data);

    }

    public function update(Request $request, Medicacao $medicacao)
    {

        $request->validate([
            'medicamento' => 'required',
            'descricao' => 'required',
            'dosagem' => 'required',
            'intervalo' => 'required',
            'data_fim' => 'required',

        ]);

        $medicacao -> update($request->all());

        return redirect()->route('vet.medicacao.index')
                        ->with('success','Medicação atualizada com sucesso! ');
    }

    public function destroy(Medicacao $medicacao)
    {

       $medicacao->delete();

       return redirect()->route('vet.medicacao.index')
                        ->with('success','A exclusão foi um sucesso!');
    }
}
