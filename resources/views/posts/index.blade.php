@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>Post</h2>
                                </div>
                                <div class="pull-right">
                                    @can('crear-post')
                                    <a class="btn btn-success btn-sm mb-2" href="{{ route('posts.create') }}"><i class="fa fa-plus"></i> Crear nuevo Post</a>
                                    @endcan
                                </div>
                            </div>
                        </div>

                        @session('success')
                            <div class="alert alert-success" role="alert"> 
                                {{ $value }}
                            </div>
                        @endsession

                        <table class="table table-bordered">
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Imagen</th>
                                <th>Foto</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($post as $posts)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $posts->nombre }}</td>
                                <td>{{ $posts->descripcion }}</td>
                                <td>{{ $posts->imagen }}</td>
                                <td>
                                    <img src="imagenes/{{$posts->imagen}}" class="img-fluid img-thumbnail" width="120px">
                                </td>
                                <td>
                                    <form action="{{ route('posts.destroy',$posts->id) }}" method="POST">
                    
                                        @can('editar-post')
                                        <a class="btn btn-primary btn-sm" href="{{ route('posts.edit',$posts->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')

                                        @can('borrar-post')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

{!! $post->links() !!}

@endsection