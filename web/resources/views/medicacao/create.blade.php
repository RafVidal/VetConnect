@extends('layout_vet')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Inserção de Medicamentos</h6>
    </div>
<div class="card-body">
<div class="row"">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Inserindo um novo medicamento: </h2>
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

<form action="{{ route('vet.medicacao.store') }}" method="POST" class="container was-validated" novalidate="" enctype="multipart/form-data">
    @csrf

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Medicamento:</strong>
                <input type="text" name="medicamento" class="form-control is-valid" placeholder="Insira o nome do medicamento" required>
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Dosagem:</strong>
                <input type="text" name="dosagem" class="form-control is-valid" placeholder="00 mg" required>
            </div>
            <div class="form-group col-md-6">
                <strong>Intervalo:</strong>
                <input type="text" name="intervalo" class="form-control is-valid" placeholder="Intervalo de tempo" required>
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Data Fim:</strong>
                <input type="text" name="data_fim" class="form-control date wd is-valid" placeholder="dd/mm/aaaa" onkeypress="$(this).mask('00/00/0000');"  required>
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
            <div class="form-group col-md-6">
                <strong>Animal</strong>
                <select type="text" name="animal_id" class="form-control is-valid" required>
                    <option>...</option>
                    @foreach($animais as $animal)
                        <option value="{{$animal->id}}">{{$animal->nome. " | Dono: " $animal->cliente->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                <textarea class="form-control" style="height:45px" name="descricao" placeholder="Insira a descrição"></textarea>
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">


        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('vet.medicacao.index') }}"> Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>

</form>
@endsection
