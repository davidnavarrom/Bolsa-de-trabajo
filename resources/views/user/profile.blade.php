@extends('layouts.app')

@section('content')

    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">Tus candidaturas</div>
                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <span class="d-inline-block">Datos personales</span>
                        <a href="{{route('users.edit', $user->id)}}"><span class="d-inline-block  float-right"><b>Editar</b></span></a>
                    </div>
                    <div class="card-body">


                        <div class="form-group row">
                            <label for="name" class="col-12 col-form-label text-left">{{ __('Nombre') }}</label>

                            <div class="col-12">


                                <input id="name" type="text" class="form-control " name="name"
                                       value="{{ $user->name }}" autocomplete="name" autofocus disabled>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-12 col-form-label text-left">{{ __('Apellidos') }}</label>

                            <div class="col-12">
                                <input id="surname" type="text" class="form-control" name="surname"
                                       value="{{ $user->surname }}" autocomplete="surname" disabled>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone" class="col-12 col-form-label text-left">{{ __('Teléfono') }}</label>

                            <div class="col-12">
                                <input id="phone" type="tel" class="form-control" name="phone"
                                       value="{{ $user->phone }}" autocomplete="phone" disabled>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-12 col-form-label text-left">{{ __('Email') }}</label>

                            <div class="col-12">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{  $user->email }}" autocomplete="email" disabled>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cv" class="col-12 col-form-label text-left">{{ __('Currículum vitae') }}</label>

                            <div class="col-12">
                                @if($user->cvpath)
                                    <a class="btn btn-primary w-100"
                                       href="{{ route('users.downloadcv', $user->cvpath)  }}" role="button">Descargar
                                        Currículum</a>
                                @else
                                    <a class="btn btn-primary w-100" href="#" role="button">Subir Currículum</a>
                                @endif
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
