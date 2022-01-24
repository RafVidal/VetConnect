@extends('layout_users')

@section('content')
<div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Visualização do Pet</h6>
                       </div>
                     <div class="card-body">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pet: </h2>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>&nbsp;</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $animal->nome }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Espécie:</strong>
                {{ $animal->especie }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Raça:</strong>
                {{ $animal->raca }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sexo:</strong>
                {{ $animal->sexo }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cor:</strong>
                {{ $animal->cor }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nascimento:</strong>
                {{ $animal->nascimento }}
            </div>
        </div>
        <div>&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo" {{count($cartao_de_vacinacao) > 0 ? '' : 'disabled'}}>Cartão de Vacina</button>
            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo2" {{count($medicacao) > 0 ? '' : 'disabled'}}>Medicações</button>
        </div>
        <div>&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="/animal"> Voltar</a>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cartão de Vacinação do {{$animal->nome}} (ID: {{$animal->id}})</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="overflow-y:scroll; max-height:450px">
            @foreach ($cartao_de_vacinacao as $cartao_de_vacinacaos)
            @if (
                $cartao_de_vacinacaos->animal_id==$animal->id
            )
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>᲼᲼᲼᲼᲼᲼᲼</strong>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Data da Vacina:</strong>
                        {{ $cartao_de_vacinacaos->data}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status:</strong>
                        {{ $cartao_de_vacinacaos->status }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Descrição:</strong>
                        {{ $cartao_de_vacinacaos->descricao }}
                    </div>
                </div>
                <hr color="black" size="2" width="100%">
        </div>
            @endif
        @endforeach

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="modalExemplo2" style="max-height:600px" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Medicações do {{$animal->nome}} (ID: {{$animal->id}})</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="overflow-y:scroll; max-height:450px">
            @foreach ($medicacao as $medicacaos)
            @if (
                $medicacaos->animal_id==$animal->id
            )
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>᲼᲼᲼᲼᲼᲼᲼</strong>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Medicamento:</strong>
                    {{ $medicacaos->medicamento }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dosagem:</strong>
                    {{ $medicacaos->dosagem }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Intervalo (Dias):</strong>
                    {{ $medicacaos->intervalo }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Data Fim:</strong>
                    {{ $medicacaos->data_fim }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descrição:</strong>
                    {{ $medicacaos->descricao }}
                </div>
            </div>
            <hr color="black" size="2" width="100%">
        </div>
            @endif
        @endforeach

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

@endsection
