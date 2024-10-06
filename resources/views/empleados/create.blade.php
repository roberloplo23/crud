@extends('adminlte::page')

@section('content_header')
    <h1>Agregar Empleado</h1>
@stop

@section('content')
<form action="{{url('/empleados')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    @include('empleados.form',['Modo'=>'crear'])
    
    
</form>

@endsection