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
                            <div class="col">Listado de categorias</div>
                            <div class="col text-right">
                                <div class="btn-group">
                                    <a href="{{route('categorias.create')}}" class="btn btn-success" >Añadir Categoria</a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>

                                <th>Nombre</th>
                                <th>Slug</th>
                                <th >Acciones</th>
                            </tr>
                            @foreach ($categories as $category)
                                <tr>

                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td class="text-center">
                                        <form action="{{route('categorias.destroy', $category->id)}}" method="POST">

                                            <a class="btn btn-primary" href="{{route('categorias.edit',$category->id)}}">Editar</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {!! $categories->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
