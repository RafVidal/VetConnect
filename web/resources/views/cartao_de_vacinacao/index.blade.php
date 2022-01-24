@extends('layout_vet')

@section('content')
<div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Painel de Controle do Cartão de Vacina</h6>
                       </div>
                     <div class="card-body">
<div class="row"">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <a class="btn btn-success" href="{{ route('vet.cartao_de_vacinacao.create') }}"> + Novo</a>
    </div>
    <div class="pull-left">
        <h2>᲼Cartão de Vacinação</h2>
    </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Data da Vacina</th>
            <th width="253px">Descrição</th>
            <th>Status</th>
            <th>Vacina ID</th>
            <th>Animal ID</th>
            <th width="280px">Ações</th>
        </tr>
    @foreach ($data as $key => $value)
    <tr>

        <td>{{ $value->data}}</td>
        <td>{{ \Str::limit($value->descricao, 100) }}</td>
        <td>{{ $value->status}}</td>
        <td>{{ $value->vacina_id}}</td>
        <td>{{ $value->animal_id}}</td>

        <td>
            <form action="{{ route('vet.cartao_de_vacinacao.destroy',$value->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('vet.cartao_de_vacinacao.show',$value->id) }}">Exibir</a>
                <a class="btn btn-primary" href="{{ route('vet.cartao_de_vacinacao.edit',$value->id) }}">Editar</a>
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
