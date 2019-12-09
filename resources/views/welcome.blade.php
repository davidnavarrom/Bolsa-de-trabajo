@extends('layouts.app')

@section('content')

    <div id="carrousel" class="carousel slide pb-4" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-fluid "  src="{{URL::asset('img/banner.jpg')}}" alt="imagen instituto">
            </div>

        </div>
    </div>

    <div class="container">

        <div class="row pb-4">
            <div class="col">
            <div class="card">
                <div class="card-header">Categorias</div>
                <div class="card-body text-center">

                    @foreach ($categories as $category)


                            <button type="button" class="btn btn-link">{{$category->name}}</button>


                    @endforeach
                </div>

            </div>

        </div>

        </div>
        <div class="row">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Últimas ofertas</div>
                    <div class="card-body">

                    </div>
                    </div>
                </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><b>Información</b></div>
                    <div class="card-body">
                        <p>Bienvenido a la Bolsa de Empleo de I.E.S Comercio.
                            Este servicio es gratuito y ofrecido a los alumnos de nuestro centro.
                            Gracias por usar nuestro buscador de empleo</p>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
@endsection
