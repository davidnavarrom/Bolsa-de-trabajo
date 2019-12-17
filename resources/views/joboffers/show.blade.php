@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Información de candidatura</div>
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
                        <button type="button" class="btn btn-success btn-lg btn-block">INSCRIBIRSE</button>
                    </div>
                </div>

                <!--Facebook-->
            </div>

            </div>
        </div>
    </div>
@endsection
