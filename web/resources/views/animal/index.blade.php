@extends('layout_users')

@section('content')
<div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Painel de Controle dos Pet's</h6>
                       </div>
                     <div class="card-body">
<div class="row"">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <a class="btn btn-success" href="{{ route('cliente.animal.create') }}"> + Novo</a>
    </div>
    <div class="pull-left">
        <h2>᲼Meus Pet's</h2>
    </div>
</div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>Espécie</th>
            <th>Raça</th>
            <th width="280px">Ações</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>

            <td style="text-align-last: center"><img style="align-self: center"
                height="50px" width="50px" src="storage/img_pet/{{$value->img_pet}}"/>
            </td>
            <td>{{ $value->nome }}</td>
            <td>{{ $value->especie }}</td>
            <td>{{ $value->raca }}</td>

            <td>
                <form action="{{ route('animal.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('animal.show',$value->id) }}">Exibir</a>
                    <a class="btn btn-primary" href="{{ route('animal.edit',$value->id) }}">Editar</a>
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
