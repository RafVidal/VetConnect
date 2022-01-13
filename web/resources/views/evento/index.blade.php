@extends('layout_users')

@section('content')

<div class="container">
    <div id="agenda">
        &nbsp;
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">

                <form action="">

                    {!! csrf_field() !!}

                    <div class="form-group d-none">
                        <label for="id">Id:</label>
                        <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Help Text</small>
                    </div>

                    <div class="form-group">
                        <label for="title">Título:</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="description">Descrição:</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                    </div>

                    <div class="form-group d-none">
                        <label for="title">Começo:</label>
                        <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Help Text</small>
                    </div>

                    <div class="form-group d-none">
                        <label for="title">Fim:</label>
                        <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Help Text</small>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnSalvar">Salvar</button>
                <button type="button" class="btn btn-primary" id="btnEditar">Editar</button>
                <button type="button" class="btn btn-danger" id="btnExcluir" >Excluir</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
  </div>

@endsection
