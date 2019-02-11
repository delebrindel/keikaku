@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('login.Registrarme') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('register.Name') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                    name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apaterno" class="col-md-4 col-form-label text-md-right">{{ __('register.FN1') }}</label>

                            <div class="col-md-6">
                                <input id="apaterno" type="text" class="form-control{{ $errors->has('apaterno') ? ' is-invalid' : '' }}"
                                    name="apaterno" value="{{ old('apaterno') }}" required autofocus>

                                @if ($errors->has('apaterno'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('apaterno') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amaterno" class="col-md-4 col-form-label text-md-right">{{ __('register.FN2') }}</label>

                            <div class="col-md-6">
                                <input id="amaterno" type="text" class="form-control{{ $errors->has('amaterno') ? ' is-invalid' : '' }}"
                                    name="amaterno" value="{{ old('amaterno') }}" required autofocus>

                                @if ($errors->has('amaterno'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('amaterno') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('login.Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="usuario" type="text" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}"
                                    name="usuario" value="{{ old('usuario') }}" required>

                                @if ($errors->has('usuario'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('usuario') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('register.Correo') }}</label>

                            <div class="col-md-6">
                                <input id="correo" type="email" class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}"
                                    name="correo" required>

                                @if ($errors->has('correo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('correo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('login.Pass') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{
                                __('register.Confirmar') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('login.Registrarme') }}
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
