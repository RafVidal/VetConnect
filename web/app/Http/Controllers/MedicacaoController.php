<?php

namespace App\Http\Controllers;

use App\Models\Medicacao;
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
        return view ('medicacao.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'medicamento' => 'required',
            'descricao' => 'required',
            'dosagem' => 'required',
            'intervalo' => 'required',
            'data_fim' => 'required',
        /*  'animal_id' => 'required',
            'veterinario_id' => 'required',
        */
        ]);

        $itens= Medicacao::create([
            'medicamento'=>$request->medicamento,
            'descricao'=>mb_strtolower($request->descricao),
            'dosagem'=>$request->dosagem,
            'intervalo'=>$request->intervalo,
            'data_fim'=>$request->data_fim,
        /*  'animal_id'=>$request->animal_id,
            'veterinario_id'=>$request->veterinario_id,
        */
        ]);

        return redirect()->route('medicacao.index')
                        ->with('success','Medicação adicionada com sucesso');
    }

    public function show(Medicacao $medicacao)
    {
         return view('medicacao.show',compact('medicacao'));
    }

    public function edit(Medicacao $medicacao)
    {
        return view('medicacao.edit',compact('medicacao'));

    }

    public function update(Request $request, Medicacao $medicacao)
    {

        $request->validate([
            'medicamento' => 'required',
            'descricao' => 'required',
            'dosagem' => 'required',
            'intervalo' => 'required',
            'data_fim' => 'required',
            /*'animal_id' => 'required',
            'veterinario_id' => 'required',
*/
        ]);

        $medicacao -> update($request->all());

        return redirect()->route('medicacao.index')
                        ->with('success','Medicação atualizada com sucesso! ');
    }

    public function destroy(Medicacao $medicacao)
    {

       $medicacao->delete();

       return redirect()->route('medicacao.index')
                        ->with('success','A exclusão foi um sucesso!');
    }
}
