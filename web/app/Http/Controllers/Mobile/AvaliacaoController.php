<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Avaliacao;

class AvaliacaoController extends Controller
{

    public function index($veterinario)
    {

        try{
            /*inserir aqui método para receber a avaliação do próprio usuário primeiro */
            $avaliacoes = Avaliacao::select('avaliacao.*', 'cliente.nome as clientenome')
                                        ->where('veterinario_id', $veterinario)
                                        ->leftJoin('cliente as cliente', 'avaliacao.cliente_id', 'cliente.id')
                                        ->orderBy('created_at', 'desc')
                                        ->get();
            if(count(avaliacoes) > 0){
                return response()->json(['dados' => $avaliacoes, 'status' => true]);
            }else{
                return response()->json(['message'=> 'Nenhuma avaliacao cadastrada', 'status' => false]);
            }
        } catch (Exception $e){
            return response()->json([
                'status'      => false,
                'response'  => $e->getMessage(),
                'message'   => 'Ocorreu um erro durante a consulta de avaliacoes'
            ]);
        }
        


    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'veterinario_id' => 'required|exists:veterinario,id',
            'avaliacao'      => 'required|between:0,5|numeric',
            'descricao'      => 'max:200',
        ]);

        if($validator->fails()){
            return response()->json(['message' => $validator->messages()->get('*'), 'status' => false], 200);
        }
        $jaavaliou = Avaliacao::where('veterinario_id', $request->veterinario_id)
                                ->where('cliente_id', $request->cliente_id)//user()->auth()->_cliente->id
                                ->get();

        if(count($jaavaliou) > 0){
            return response()->json(['message' => 'Médico já avaliado', 'status' => false], 200);
        }

        try{
            DB::beginTransaction();

            $avaliacao                  = new Avaliacao;
            $avaliacao->cliente_id      = $request->cliente_id; //user()->auth()->_cliente->id
            $avaliacao->veterinario_id  = $request->veterinario_id;
            $avaliacao->avaliacao       = $request->avaliacao;
            $avaliacao->descricao       = $request->descricao;
            $avaliacao->save();

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
            return response()->json([
                                    'status'      => false,
                                    'response'  => $e->getMessage(),
                                    'message'   => 'Ocorreu um erro durante o registro da avaliação.'
                                ]);
        }

        return response()->json([
            'status'      => true,
            'message'   => 'Avaliação registrada com sucesso!'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        try{
            DB::beginTransaction();
                $avaliacao = Avaliacao::findOrFail($id)->delete();
                return response()->json(['status'      => true,
                                        'message'   => 'Avaliacao deletado com sucesso!'], 200);
            DB::commit();
        } catch (Exception $e){
            DB::rollback();
            return response()->json([
                'status'      => false,
                'response'  => $e->getMessage(),
                'message'   => 'Ocorreu um erro na deleção do animal!'
            ]);
        }
    }

    public function media($veterinario){
        $avaliacoes = Avaliacao::where('veterinario_id', $veterinario)->get();
        return response()->json([
            'media' => ($avaliacoes->sum('avaliacao') / count($avaliacoes)),
            'quantidade' => count($avaliacoes),
        ], 200);
    }
}
