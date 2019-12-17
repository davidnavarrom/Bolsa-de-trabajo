@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Oferta de empleo') }}</div>


                    <div class="card-body">
                        <form method="POST" action="{{ route('joboffers.update', $jobOffer->id) }}">
                            @method('patch')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$jobOffer->name) }}" required autocomplete="name" autofocus>

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
                                    <input id="description" type="tel" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description',$jobOffer->description) }}" required autocomplete="description" >

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
                                    <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary',$jobOffer->salary) }}" required autocomplete="salary" >

                                    @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="categories" class="col-md-4 col-form-label text-md-right">{{ __('Categorias') }}</label>

                                <div class="col-md-6">

                                    <select class="form-control" id="categories" name="categories[]"  multiple="multiple" required>





                                    @foreach($categories as  $key => $categorie)
                                            <option value="{{ $categorie->id }}"
                                                @if(old('categories', $jobOffer->employmentCategories)->contains($categorie->id))
                                                {{ 'selected' }}
                                                @endif>
                                                {{ $categorie->name }}

                                            </option>
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

                                <div class="col-md-6">


                                    <select class="form-control" id="type_working" name="type_working"  >

                                        @foreach($typeworking as $key => $type)

                                            <option value="{{$key}}" @if(old('typeworking', $jobOffer->getOriginal('type_working')) === $key) {{ 'selected' }} @endif>{{ $type }}</option>
                                        @endforeach
                                    </select>

                                    @error('type_working')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Actualizar') }}
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
