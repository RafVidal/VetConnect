@extends('layout_vet')

@section('content')
<div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Painel Pet's</h6>
                       </div>
                     <div class="card-body">
<div class="row"">
    <div class="pull-left">
        <h2>᲼Pet's</h2>
    </div>
</div>

    <table class="table table-bordered">
        <tr>

            <th>Foto</th>
            <th>Nome</th>
            <th>Espécie</th>
            <th>Raça</th>
            <th width="100px">Ação</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>

            <td style="text-align-last: center"><img style="align-self: center"
                height="50px" width="50px" src="/storage/img_pet/{{$value->img_pet}}"/>
            </td>
            <td>{{ $value->nome }}</td>
            <td>{{ $value->especie }}</td>
            <td>{{ $value->raca }}</td>

            <td>
                <a class="btn btn-info" href="/vet/pets/{{$value->id}}">Exibir</a>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
    </div>
    </div>
    @endsection
