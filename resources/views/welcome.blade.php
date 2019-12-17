@extends('layouts.app')

@section('content')

    <div id="carrousel" class="carousel slide pb-4" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-fluid" src="{{URL::asset('img/banner.jpg')}}" alt="imagen instituto">
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

                        @foreach($jobOffers as $job_offer)

                            <div class="card b-1 hover-shadow mb-5">
                                <div class="media card-body">

                                    <div class="media-body">
                                        <div class="mb-2">
                                            <h4> <a href="{{route('joboffers.show',$job_offer->id)}}">{{$job_offer->name}}</a></h4>

                                        </div>

                                        <div class="d-block">
                                            <p class="fs-14 text-fade mb-12">Fecha: <span class="badge badge-primary">{{$job_offer->created_at}}</span> | Jornada: <span class="badge badge-primary">{{$job_offer->type_working}}</span> | Salario: <span class="badge badge-primary">{{$job_offer->salary}} €</span> </p>

                                        </div>


                                        <small class="fs-16 fw-300 ls-1">{{str_limit($job_offer->description, $limit = 350, $end = '...')}}</small>
                                    </div>

                                </div>

                                <footer class="card-footer text-right">

                                    <div class="card-hover-show">
                                        <a class="btn btn-xs fs-10 btn-bold btn-success" href="{{route('joboffers.show',$job_offer->id)}}">Más información</a>

                                    </div>
                                </footer>
                            </div>
                        @endforeach
                            {!! $jobOffers->links() !!}
                    </div>
                    </div>
                </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Información</div>
                    <div class="card-body">
                        <p>Bienvenido a la Bolsa de Empleo de I.E.S Comercio.
                            Este servicio es gratuito y ofrecido a los alumnos de nuestro centro.
                            Gracias por usar nuestro buscador de empleo</p>
                    </div>
                </div>

                <!--Facebook-->
                <button type="button" class="btn btn-fb"><i class="fab fa-facebook-f"></i></button>
            </div>

            </div>
        </div>
    </div>
@endsection
