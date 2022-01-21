@extends('layout_vet')

@section('content')

<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edição da Medicação</h6>
        </div>
    <div class="card-body">
<div class="row"">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Medicação</h2>
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

    <form action="{{ route('medicacao.update',$medicacao->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Medicamento:</strong>
                <input type="text" name="medicamento" value="{{ $medicacao->medicamento }}" class="form-control" placeholder="Insira o nome">
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Dosagem:</strong>
                <input type="text" name="dosagem" value="{{ $medicacao->dosagem }}" class="form-control" placeholder="00">
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Intervalo (Dias):</strong>
                <input type="text" name="intervalo" value="{{ $medicacao->intervalo }}" class="form-control" placeholder="00">
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Data Fim:</strong>
                <input type="text" name="data_fim" value="{{ $medicacao->data_fim }}" class="form-control date wd" placeholder="dd/mm/aaaa" onkeypress="$(this).mask('00/00/0000');">
                <script type="text/javascript">
                $('.date').datepicker({
                    format: 'dd/mm/aaaa',
                    numberOfMonths: 1,
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                })
                </script>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong>Descrição:</strong>
                <textarea class="form-control" style="height:40px" name="descricao" placeholder="Insira a descrição"> {{ $medicacao->descricao}} </textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('medicacao.index') }}"> Voltar</a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </div>
            </form>
@endsection
