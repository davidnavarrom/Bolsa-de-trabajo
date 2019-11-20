@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bienvenido a Bolsa de trabajo</div>

                    <div class="card-body">
                        @guest
                            <span>Eres un usuario invitado</span>
                        @else
                            <span>Eres usuario logueado y tu rol es de {{ Auth::user()->roles()->first()->name  }}</span>
                        @endguest
                    </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
