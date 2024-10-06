@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>Empleados</h1>
@stop

@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            <strong>{{session('success')}}</strong>
        </div>
    @endif

    @if (session('destroy'))
        <div class="alert alert-destroy">
            <strong>{{session('destroy')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <a href="{{url('empleados/create')}}" class="btn btn-primary mb-3">Agregar Empleado</a>

            <table class="table table-light table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Correo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empleados as $empleado)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <img src="{{asset('storage').'/'.$empleado->Foto}}" alt="" width="50" class="img-thumbnail">
                        </td>
                        <td>{{$empleado->Nombre}}</td>
                        <td>{{$empleado->ApellidoPaterno}}</td>
                        <td>{{$empleado->ApellidoMaterno}}</td>
                        <td>{{$empleado->Correo}}</td>
                        <td>
                            <a href="{{ url('/empleados/'.$empleado->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form method="post" action="{{ url('/empleados/'.$empleado->id) }}" style="display:inline">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Borrar?');">Borrar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection