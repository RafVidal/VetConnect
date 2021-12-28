@extends('layout')

@section('content')
<div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Visualização do Cartão</h6>
                       </div>
                     <div class="card-body">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cartão de Vacinação: </h2>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>᲼᲼᲼᲼᲼᲼᲼</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data da Vacina:</strong>
                {{ $cartao_de_vacinacao->data}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                {{ $cartao_de_vacinacao->descricao }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>᲼᲼᲼᲼᲼᲼᲼</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('cartao_de_vacinacao.index') }}"> Voltar</a>
        </div>
    </div>
    </div>
    </div>
@endsection
