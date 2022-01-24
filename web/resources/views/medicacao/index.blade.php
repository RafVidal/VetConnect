@extends('layout_vet')

@section('content')
<div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Painel de Controle das Medicações</h6>
                       </div>
                     <div class="card-body">
<div class="row"">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <a class="btn btn-success" href="{{ route('vet.medicacao.create') }}"> + Novo</a>
    </div>
    <div class="pull-left">
        <h2>᲼Medicações</h2>
    </div>
</div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Medicamento</th>
            <th>Dosagem</th>
            <th>Intervalo</th>
            <th>Data Fim</th>
            <th>Descrição</th>
            <th width="280px">Ações</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ $value->medicamento }}</td>
            <td>{{ $value->dosagem }}</td>
            <td>{{ $value->intervalo }}</td>
            <td>{{ $value->data_fim }}</td>
            <td>{{ \Str::limit($value->descricao, 100) }}</td>

            <td>
                <form action="{{ route('vet.medicacao.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('vet.medicacao.show',$value->id) }}">Exibir</a>
                    <a class="btn btn-primary" href="{{ route('vet.medicacao.edit',$value->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
    </div>
    </div>
    @endsection
