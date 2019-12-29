@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Nueva Oferta de empleo') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('joboffers.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" style="height: 300px;" name="description">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Salario') }}</label>
                                <div class="col-md-6">
                                    <input id="salary" type="number" placeholder="Ej: 15000" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" required autocomplete="salary" >
                                    @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="categories" class="col-md-4 col-form-label text-md-right">{{ __('Categorias') }}</label>
                                <div class="col-md-6 @error('categories') is-invalid @enderror" >
                                    <select class="form-control" id="categories" name="categories[]"  multiple="multiple" required>
                                        @foreach($categories as  $key => $categorie)
                                                <option value="{{$categorie->id }}" {{ (collect(old('categories'))->contains($categorie->id)) ? 'selected':'' }}>{{ $categorie->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type_working" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Jornada') }}</label>
                                <div class="col-md-6 ">
                                    <select class="form-control" id="type_working" name="type_working" >
                                        @foreach($typeworking as $key => $type)
                                            <option value="{{$key}}" @if(old('type_working') == $key) {{ 'selected' }} @endif>{{ $type }}</option>
                                        @endforeach
                                    </select>
                                    <div class="@error('type_working') is-invalid @enderror"></div>
                                    @error('type_working')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                                <div class="col-md-6 ">
                                    <select class="form-control" id="status" name="status" >
                                        @foreach($status as $key => $type)

                                            @if($key !== 'finished')
                                            <option value="{{$key}}" @if(old('status') == $key) {{ 'selected' }} @endif>{{ $type }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="@error('status') is-invalid @enderror"></div>
                                    @error('status')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
