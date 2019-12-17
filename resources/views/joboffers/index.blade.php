@extends('layouts.app')

@section('content')

    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
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
                                    <a href="{{route('joboffers.create')}}" class="btn btn-success" >Añadir Oferta de empleo</a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>

                                <th>Nombre</th>
                                <th>Status</th>
                                <th>Nª candidaturas</th>
                                <th>Acciones</th>
                            </tr>
                            @foreach ($jobOffers as $joboffer)
                                <tr>

                                    <td >{{ $joboffer->name }}</td>
                                    <td ><span class="badge badge-primary job{{$joboffer->getOriginal('status')}}">{{ $joboffer->status }}</span></td>
                                    <td >{{count($joboffer->candidatures)}}</td>

                                    <td class="text-center" >
                                        <form action="{{route('joboffers.destroy', $joboffer->id)}}" method="POST">

                                            <a class="btn btn-primary" href="{{route('joboffers.show',$joboffer->id)}}">Visualizar</a>
                                            <a class="btn btn-primary" href="{{route('joboffers.edit',$joboffer->id)}}">Editar</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Desactivar</button>
                                        </form>
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

@endsection
