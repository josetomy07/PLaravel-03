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
                                    <h2></h2>
                                </div>
                                <div class="pull-right">
                                    @can('crear-usuarios')
                                        <a class="btn btn-success mb-2" href="{{ route('usuarios.create') }}"><i class="fa fa-plus"></i> Create New User</a>
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
                            <th>N°</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($usuarios as $key => $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                    <label class="badge bg-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                                </td>
                                <td>
                                    
                                    @can('editar-usuarios')
                                        <a class="btn btn-primary btn-sm" href="{{ route('usuarios.edit',$user->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    @endcan
                                    @can('borrar-usuarios')
                                        <form method="POST" action="{{ route('usuarios.destroy', $user->id) }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection