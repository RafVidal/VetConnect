@extends('layout_vet')

@section('content')

<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edição da Vacina</h6>
        </div>
    <div class="card-body">
<div class="row"">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Vacina</h2>
        </div>

    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ops!</strong> Houve alguns problemas com os dados inseridos.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('vacina.update',$vacina->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" value="{{ $vacina->nome }}" class="form-control" placeholder="Insira o nome">
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Idade do Animal:</strong>
                <input type="text" name="idade_animal" value="{{ $vacina->idade_animal }}" class="form-control" placeholder="Insira a idade necessária">
            </div>
            <div class="form-group col-md-6 sele">
                <strong> Obrigatória </strong>
                <select name="obrigatoria" class="custom-select">
                    <option> ... </option>
                    <option> Sim </option>
                    <option> Não </option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Descrição:</strong>
                <textarea class="form-control" style="height:40px" name="descricao" placeholder="Insira a descrição"> {{ $vacina->descricao}} </textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('vacina.index') }}"> Voltar</a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </div>
            </form>
@endsection
