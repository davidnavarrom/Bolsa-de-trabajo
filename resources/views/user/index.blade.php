@extends('layouts.app')

@section('content')

    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <span>{{ $message }}</span>
            </div>
        @endif

        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">Mis candidaturas</div>
                    <div class="card-body">


                        @foreach($candidatures as $candidature)

                            <div class="card b-1 hover-shadow mb-5">
                                <div class="media card-body">

                                    <div class="media-body">
                                        <div class="mb-2">

                                            <h4> <a href="{{route('joboffers.show',$candidature->jobOffer->id)}}">{{$candidature->jobOffer->name}}</a></h4>

                                        </div>

                                        <div class="d-block">
                                            <p class="fs-14 text-fade mb-12">Fecha: <span class="badge badge-primary">{{$candidature->created_at}}</span> | Jornada: <span class="badge badge-primary">{{$candidature->jobOffer->type_working}}</span> | Salario: <span class="badge badge-primary">{{$candidature->jobOffer->salary}} €</span> </p>

                                        </div>


                                        <small class="fs-16 fw-300 ls-1">{{str_limit($candidature->jobOffer->description, $limit = 350, $end = '...')}}</small>
                                    </div>

                                </div>

                                <footer class="card-footer text-right">


                                    <div class="card-hover-show">

                                        <div class="d-flex justify-content-between">
                                            <div>
                                                    <span><b>Status: </b></span><span class="badge badge-primary candidature{{$candidature->getOriginal('status')}}">{{ $candidature->status }}</span></td>

                                            </div>
                                            <div>

                                                <form action="{{route('candidature.destroy', $candidature->id)}}" method="POST">

                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="btn btn-xs fs-10 btn-bold btn-danger">Cancelar inscripción</button>
                                                </form>
                                            </div>
                                        </div>



                                    </div>
                                </footer>
                            </div>
                        @endforeach
                        {!! $candidatures->links() !!}

                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <span class="d-inline-block">Mis Datos personales</span>
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
