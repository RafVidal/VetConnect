@extends('layout_users')

@section('content')
<div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Painel de Veterinários</h6>
                       </div>
                     <div class="card-body">
<div class="row"">
    <div class="pull-left">
        <h2>᲼Veterinários</h2>
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
            <th>Telefone</th>
            <th>Cidade</th>
            <th width="200px">Atende em domicílio</th>
            <th width="100px">Ações</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td style="text-align-last: center"><img style="align-self: center"
                height="50px" width="50px" src="storage/img_vet/{{$value->img_vet}}"/></td>
            <td>{{ $value->nome}}</td>
            <td>{{ $value->telefone}}</td>
            <td>{{ $value->cidade}}</td>
            <td>{{ $value->atende_domiciliar }}</td>

            <td>
                <a class="btn btn-info" href="/veterinarios/show/{{$value->id}}">Exibir</a>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
    </div>
    </div>
    @endsection

