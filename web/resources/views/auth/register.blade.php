@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro') }}</div>

                <div class="card-body">
                    {{--
                        'numero'                    => 'max:5',
                        'complemento'               => 'max:45',
                        'cep'                       => 'required|formato_cep',
                        --}}
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
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>

                            <div class="col-md-6">
                                <input type="text" id="telefone"  placeholder="(99) 99999-9999" class="form-control mask-telefone" name="telefone" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">UF</label>

                            <div class="form-group col-md-6">
                                <select name="estado" class="custom-select" required>
                                    <option> ... </option>
                                    <option> AC </option>
                                    <option> AL </option>
                                    <option> AP </option>
                                    <option> AM </option>
                                    <option> BA </option>
                                    <option> CE </option>
                                    <option> DF </option>
                                    <option> ES </option>
                                    <option> GO </option>
                                    <option> MA </option>
                                    <option> MT </option>
                                    <option> MS </option>
                                    <option> MG </option>
                                    <option> PA </option>
                                    <option> PB </option>
                                    <option> PR </option>
                                    <option> PE </option>
                                    <option> PI </option>
                                    <option> RJ </option>
                                    <option> RN </option>
                                    <option> RS </option>
                                    <option> RO </option>
                                    <option> RR </option>
                                    <option> SC </option>
                                    <option> SP </option>
                                    <option> SE </option>
                                    <option> TO </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cidade" class="col-md-4 col-form-label text-md-right">Cidade</label>

                            <div class="col-md-6">
                                <input type="text" id="cidade" class="form-control" name="cidade" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bairro" class="col-md-4 col-form-label text-md-right">Bairro</label>

                            <div class="col-md-6">
                                <input type="text" id="bairro" class="form-control" name="bairro" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            
                                <label for="rua" class="col-md-4 col-form-label text-md-right">Rua</label>

                                <div class="col-md-6">
                                    <input type="text" id="rua" class="form-control" name="rua" required>
                                </div>
                            
                        </div>

                        <div class= "row">
                            <div class="row mb-3">
                                <label for="numero" class="col-md-4 col-form-label text-md-right">Nº</label>

                                <div class="col-md-6">
                                    <input type="text" id="numero" class="form-control" name="numero" required>
                                </div>
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
                
        });
    </script>
@endpush