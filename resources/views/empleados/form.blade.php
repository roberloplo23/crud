<div class="card">
    <div class="card-body">
              
        <form action="{{ $Modo == 'crear' ? url('empleados') : url('empleados/'.$empleado->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($Modo == 'modificar')
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="Nombre">{{ 'Nombre' }}</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Ingresa el nombre" value="{{ isset($empleado->Nombre) ? $empleado->Nombre : '' }}">
            </div>

            <div class="form-group">
                <label for="ApellidoPaterno">{{ 'Apellido Paterno' }}</label>
                <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" class="form-control" placeholder="Ingresa el apellido paterno" value="{{ isset($empleado->ApellidoPaterno) ? $empleado->ApellidoPaterno : '' }}">
            </div>

            <div class="form-group">
                <label for="ApellidoMaterno">{{ 'Apellido Materno' }}</label>
                <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" class="form-control" placeholder="Ingresa el apellido materno" value="{{ isset($empleado->ApellidoMaterno) ? $empleado->ApellidoMaterno : '' }}">
            </div>

            <div class="form-group">
                <label for="Correo">{{ 'Correo' }}</label>
                <input type="email" name="Correo" id="Correo" class="form-control" placeholder="Ingresa el correo" value="{{ isset($empleado->Correo) ? $empleado->Correo : '' }}">
            </div>

            <div class="form-group">
                <label for="Foto">{{ 'Foto' }}</label>
                @if(isset($empleado->Foto))
                    <br/>
                    <img src="{{ asset('storage').'/'.$empleado->Foto }}" alt="" width="150" class="mb-2">
                    <br/>
                @endif
                <input type="file" name="Foto" id="Foto" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-success">{{ $Modo == 'crear' ? 'Agregar' : 'Modificar' }}</button>
            <a href="{{ url('empleados') }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
