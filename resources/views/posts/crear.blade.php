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
                                    <h2>Agregar Nuevo Post</h2>
                                </div>
                                <div class="pull-right py-2">
                                    <a class="btn btn-primary btn-sm" href="{{ route('posts.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                                    <div class="form-group">
                                        <strong>Nombre:</strong>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                                    <div class="form-group">
                                        <strong>Descripcion:</strong>
                                        <input type="text" name="descripcion" class="form-control" placeholder="descripcion">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                                    <div class="form-group py-2">
                                        <strong>Imagen:</strong>
                                        <input type="file" name="imagen" class="form-control py-2">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-sm mb-3 mt-2"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
