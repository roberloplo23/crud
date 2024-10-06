@extends('adminlte::page')

@section('content_header')
    <h1>Editar Empleado</h1>
@stop

@section('content')
<form action="{{url('/empleados/'.$empleado->id)}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{method_field('PATCH')}}
    
    @include('empleados.form',['Modo'=>'editar'])
    
</form>
@endsection