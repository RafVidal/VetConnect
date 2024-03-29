@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input type="text" id="nome"  class="form-control" name="nome" value="{{ old('nome') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>

                            <div class="col-md-6">
                                <input type="text" id="telefone"  placeholder="(99) 99999-9999" class="form-control mask-telefone" name="telefone" value="{{ old('telefone') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">UF</label>

                            <div class="col-md-6">
                                <select name="estado" class="custom-select" required>
                                    <option> ... </option>
                                    <option {{old('estado') == 'AC' ? 'selected' : ''}}> AC </option>
                                    <option {{old('estado') == 'AL' ? 'selected' : ''}}> AL </option>
                                    <option {{old('estado') == 'AP' ? 'selected' : ''}}> AP </option>
                                    <option {{old('estado') == 'AM' ? 'selected' : ''}}> AM </option>
                                    <option {{old('estado') == 'BA' ? 'selected' : ''}}> BA </option>
                                    <option {{old('estado') == 'CE' ? 'selected' : ''}}> CE </option>
                                    <option {{old('estado') == 'DF' ? 'selected' : ''}}> DF </option>
                                    <option {{old('estado') == 'ES' ? 'selected' : ''}}> ES </option>
                                    <option {{old('estado') == 'GO' ? 'selected' : ''}}> GO </option>
                                    <option {{old('estado') == 'MA' ? 'selected' : ''}}> MA </option>
                                    <option {{old('estado') == 'MT' ? 'selected' : ''}}> MT </option>
                                    <option {{old('estado') == 'MS' ? 'selected' : ''}}> MS </option>
                                    <option {{old('estado') == 'MG' ? 'selected' : ''}}> MG </option>
                                    <option {{old('estado') == 'PA' ? 'selected' : ''}}> PA </option>
                                    <option {{old('estado') == 'PB' ? 'selected' : ''}}> PB </option>
                                    <option {{old('estado') == 'PR' ? 'selected' : ''}}> PR </option>
                                    <option {{old('estado') == 'PE' ? 'selected' : ''}}> PE </option>
                                    <option {{old('estado') == 'PI' ? 'selected' : ''}}> PI </option>
                                    <option {{old('estado') == 'RJ' ? 'selected' : ''}}> RJ </option>
                                    <option {{old('estado') == 'RN' ? 'selected' : ''}}> RN </option>
                                    <option {{old('estado') == 'RS' ? 'selected' : ''}}> RS </option>
                                    <option {{old('estado') == 'RO' ? 'selected' : ''}}> RO </option>
                                    <option {{old('estado') == 'RR' ? 'selected' : ''}}> RR </option>
                                    <option {{old('estado') == 'SC' ? 'selected' : ''}}> SC </option>
                                    <option {{old('estado') == 'SP' ? 'selected' : ''}}> SP </option>
                                    <option {{old('estado') == 'SE' ? 'selected' : ''}}> SE </option>
                                    <option {{old('estado') == 'TO' ? 'selected' : ''}}> TO </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cidade" class="col-md-4 col-form-label text-md-right" >Cidade</label>

                            <div class="col-md-6">
                                <input type="text" id="cidade" placeholder="Insira sua cidade" class="form-control" value="{{ old('cidade') }}" name="cidade" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bairro" class="col-md-4 col-form-label text-md-right">Bairro</label>

                            <div class="col-md-6">
                                <input type="text" id="bairro" placeholder="Insira seu bairro" class="form-control" name="bairro" value="{{ old('bairro') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                                <label for="rua" class="col-md-4 col-form-label text-md-right">Rua</label>

                                <div class="col-md-6">
                                    <input type="text" id="rua" placeholder="Insira sua rua" class="form-control" name="rua" value="{{ old('rua') }}" required>
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="numero" class="col-md-4 col-form-label text-md-right">N°</label>

                            <div class="col-md-4">
                                <input type="text" id="numero" placeholder="Número (Opcional)" class="form-control" name="numero" value="{{ old('numero') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="complemento" class="col-md-4 col-form-label text-md-right">Complemento</label>

                            <div class="col-md-6">
                                <input type="text" id="complemento" placeholder="Complemento (Opcional)" class="form-control" name="complemento" value="{{ old('complemento') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cep" class="col-md-4 col-form-label text-md-right">CEP</label>

                            <div class="col-md-6">
                                <input type="text" id="cep" placeholder="00000-000" class="form-control mask-cep" name="cep" value="{{ old('cep') }}" required>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastre-se') }}
                                </button>
                            </div>
                        </div>




                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-scripts')

    <script type="text/javascript">
        $(document).ready(function() {
                $('.mask-telefone').mask('(00) 00000-0000')
                $('.mask-cep').mask('00000-000');
        });
    </script>
@endpush

