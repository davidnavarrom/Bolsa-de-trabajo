@extends('layouts.app')

@section('content')

    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <i class="fa fa-info-circle"></i>  <span>{{ $message }}</span>
            </div>
        @endif

        @if (!empty($searched))
            <div class="alert alert-primary">
                <i class="fa fa-info-circle"></i> <span>{{ $searched }}</span>
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
                                    <a href="{{route('categories.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Añadir
                                        Categoria</a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">

                        <form action="{{route('categories.search')}}" role="search" method="GET"
                              class="form-inline pull-left srcTop mb-3">
                            <div class="form-group  m-0">
                                <label for="searchInput" class="sr-only">Users</label>
                                <input type="text" name="name" class="form-control input-sm" id="searchInput"
                                       placeholder="Buscar...">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>

                                    <th>Nombre</th>
                                    <th>Slug</th>
                                    <th>Acciones</th>
                                </tr>
                                @foreach ($categories as $category)
                                    <tr>

                                        <td style="width: 40%;">{{ $category->name }}</td>
                                        <td style="width: 40%;">{{ $category->slug }}</td>
                                        <td class="text-center" style="width: 20%;">

                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-cogs"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{route('categories.edit',$category->id)}}">Editar</a>
                                                    <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">Borrar</button>

                                                    </form>
                                                </div>
                                            </div>
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
    </div>

@endsection
