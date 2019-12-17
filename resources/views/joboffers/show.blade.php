@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <span>{{ $message }}</span>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Información de oferta de trabajo</div>
                    <div class="card-body">

                        <div class="mb-2">
                            <h4>{{$jobOffer->name}}</h4>
                        </div>

                        <div class="d-block">
                            <p class="fs-14 text-fade mb-12">Fecha: <span
                                    class="badge badge-primary">{{$jobOffer->created_at}}</span> | Jornada:
                                <span class="badge badge-primary">{{$jobOffer->type_working}}</span> |
                                Salario: <span class="badge badge-primary">{{$jobOffer->salary}} €</span>
                            </p>

                        </div>

                        <div class="d-block">
                            <p >{{$jobOffer->description}}</p>
                        </div>


                    </div>
                    </div>
                </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Acciones</div>
                    <div class="card-body">

                        @if($candidature)
                            <form action="{{route('candidature.destroy', $candidature->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg btn-block">Cancelar candidatura</button>
                            </form>
                            @else
                            <form method="POST" action="{{ route('candidature.store') }}">
                                @csrf
                                <input type="hidden" value="{{$jobOffer->id}}" name="jobOfferId">
                                <button  type="submit" class="btn btn-success btn-lg btn-block">Presentar candidatura</button>
                            </form>
                            @endif
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">Compartir oferta de trabajo</div>
                    <div class="card-body text-center">
                        <a class="btn btn-social-icon btn-twitter ">
                            <span class ="fa fa-twitter text-white"> </span>
                        </a>

                        <a class="btn btn-social-icon btn-facebook ">
                            <span class ="fa fa-facebook text-white"> </span>
                        </a>

                        <a class="btn btn-social-icon btn-linkedin ">
                            <span class ="fa fa-linkedin text-white"> </span>
                        </a>

                        <a class="btn btn-social-icon btn-instagram ">
                            <span class ="fa fa-instagram text-white"> </span>
                        </a>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
@endsection