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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row align-items-center">
                            <div class="col">Listado de Ofertas de empleo</div>
                            <div class="col text-right">
                                <div class="btn-group">
                                    <a href="{{route('joboffers.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Añadir Oferta de
                                        empleo</a>
                                </div>
                            </div>
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
                                    <th>Status</th>
                                    <th>Nª candidaturas</th>
                                    <th>Acciones</th>
                                </tr>
                                @foreach ($jobOffers as $joboffer)
                                    <tr>

                                        <td><a href="{{route('joboffers.show',$joboffer->id)}}">{{ $joboffer->name }}</a>

                                        <td><span class="badge badge-primary job{{$joboffer->getOriginal('status')}}">{{ $joboffer->status }}</span>
                                        </td>
                                        <td>{{count($joboffer->candidatures)}}</td>

                                        <td class="text-center">

                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-cogs"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{route('joboffers.manage',$joboffer->id)}}">Gestionar</a>
                                                    <a class="dropdown-item" href="{{route('joboffers.edit',$joboffer->id)}}">Editar</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                            {!! $jobOffers->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
