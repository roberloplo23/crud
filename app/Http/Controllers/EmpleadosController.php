<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['empleados']=Empleados::paginate(5);


        return view('empleados.index',$datos);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datosEmpleado=request()->all();

        $datosEmpleado=request()->except('_token');

        if($request->hasFile('Foto')){
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Empleados::insert($datosEmpleado);

        return redirect('empleados')->with('success','Empleado agregado con exito');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado=Empleados::findOrFail($id);

        return view('empleados.edit',compact('empleado'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $datosEmpleado=request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $empleado=Empleados::findOrFail($id);

            $oldPhotoPath = public_path('storage/' . $empleado->Foto); //

            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath); 
            }


            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Empleados::where('id','=',$id)->update($datosEmpleado);

        //$empleado=Empleados::findOrFail($id);
        //return view('empleados.edit',compact('empleado'));

        return redirect('empleados')->with('success','Empleado modificado con exito');

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $empleado=Empleados::findOrFail($id);

            $oldPhotoPath = public_path('storage/' . $empleado->Foto); //

            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath); 
                Empleados::destroy($id);
            }

        Empleados::destroy($id);

        return redirect('empleados')->with('destroy','Empleado eliminado');
        //
    }
}
