@extends('layout')

@section('content')
<div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Visualização da Medicação</h6>
                       </div>
                     <div class="card-body">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Medicação: </h2>
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
                <strong>Medicamento:</strong>
                {{ $medicacao->medicamento }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Dosagem:</strong>
                {{ $medicacao->dosagem }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Intervalo:</strong>
                {{ $medicacao->intervalo }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data Fim:</strong>
                {{ $medicacao->data_fim }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                {{ $medicacao->descricao }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>᲼᲼᲼᲼᲼᲼᲼</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('medicacao.index') }}"> Voltar</a>
        </div>
    </div>
    </div>
    </div>
@endsection
