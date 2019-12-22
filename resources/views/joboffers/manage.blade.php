@extends('layouts.app')

@section('content')

    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <i class="fa fa-info-circle"></i> <span>{{ $message }}</span>
            </div>
        @endif

        @if (!empty($searched))
            <div class="alert alert-primary">
                <i class="fa fa-info-circle"></i> <span>{{ $searched }}</span>
            </div>
        @endif

        <div class="row pb-4">
            <div class="col-12">


                <div class="card b-1 hover-shadow mb-4">
                    <div class="card-header">

                        <div class="row align-items-center">
                            <div class="col">Información oferta de trabajo</div>
                        </div>

                    </div>

                    <div class="media card-body">

                        <div class="media-body">
                            <div class="mb-2">
                                <h4>
                                    <a href="{{route('joboffers.show',$job_offer->id)}}">{{$job_offer->name}}</a>
                                </h4>

                            </div>

                            <div class="d-block">
                                <p class="fs-14 text-fade mb-12">Fecha: <span
                                        class="badge badge-primary">{{$job_offer->created_at}}</span> |
                                    Jornada: <span
                                        class="badge badge-primary">{{$job_offer->type_working}}</span> |
                                    Salario: <span
                                        class="badge badge-primary">{{$job_offer->salary}} €</span></p>

                            </div>


                            <small
                                class="fs-16 fw-300 ls-1">{{str_limit($job_offer->description, $limit = 350, $end = '...')}}</small>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row align-items-center">
                            <div class="col">Listado de candidatos</div>
                        </div>

                    </div>
                    <div class="card-body">

                        <form action="{{route('joboffers.search')}}" role="search" method="GET"
                              class="form-inline pull-left srcTop mb-3">
                            <div class="form-group  m-0">
                                <label for="searchInput" class="sr-only">Users</label>
                                <input type="text" name="name" class="form-control input-sm" id="searchInput"
                                       placeholder="Buscar...">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Estado</th>
                                    <th>CV</th>
                                    <th>Acciones</th>
                                </tr>
                                @foreach ($candidates as $candidate)
                                    <tr>
                                        <td>{{ $candidate->user->name }}</td>
                                        <td>{{ $candidate->user->surname }}</td>
                                        <td>{{ $candidate->user->email }}</td>
                                        <td>{{ $candidate->user->phone }}</td>
                                        <td><span
                                                class="badge badge-primary candidature{{$candidate->getOriginal('status')}}">{{ $candidate->status }}</span>

                                        <td><a class="btn btn-primary w-100"
                                               href="{{ route('users.downloadcv', $candidate->user->cvpath)  }}"
                                               role="button"><i class="fa fa-download"></i> </a></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-cogs"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <form method="POST"
                                                          action="{{route('candidature.changestatus',['user' => $candidate->user->id, 'candidature' => $candidate->id, 'status' =>'selected'])}}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="dropdown-item">Seleccionar
                                                            candidatura
                                                        </button>
                                                    </form>

                                                    <form method="POST"
                                                          action="{{route('candidature.changestatus',['user' => $candidate->user->id, 'candidature' => $candidate->id, 'status' =>'notselected'])}}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="dropdown-item">Eliminar
                                                            candidatura
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>

                                @endforeach
                            </table>
                            {!! $candidates->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
