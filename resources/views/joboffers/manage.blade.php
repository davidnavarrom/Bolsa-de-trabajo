@extends('layouts.app')

@section('css')
@endsection

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
                <div class="card b-1 hover-shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">Información oferta de empleo</div>
                            @if($job_offer->getOriginal('status') !== 'finished')
                             <form method="POST" action="{{ route('joboffers.changestatus', $job_offer->id) }}">
                                @csrf
                                <input name="status" type="hidden" value="finished">
                                <button type="submit" class="btn btn-danger">
                                     Finalizar oferta de empleo
                                </button>
                            </form>
                                @else
                                <button type="submit" class="btn btn-dark">
                                    Oferta de empleo finalizada
                                </button>
                            @endif
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
                <table-candidates :job_offer="{{$job_offer}}" url="{{route('joboffers.manage', $job_offer->id)}}"></table-candidates>
            </div>
        </div>
    </div>
    </div>

@endsection

@section('js')
@endsection
