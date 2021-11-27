<?php

namespace App\Http\Controllers\Comites;

use App\Http\Controllers\Controller;
use App\Models\Comites\QuejaLaboral;
use Illuminate\Http\Request;

class QuejasLaboralesController extends Controller
{
    public function index(){
        $quejaslaborales = QuejaLaboral::where('papelera','=',0)->get();
        return view('comites.quejaslaborales.show',['quejaslaborales'=>$quejaslaborales]);
    }

    public function create(){
        return view('comites.quejaslaborales.create');
    }

    public function store(Request $request){
        $request->validate(
            [
                'nombre_empleado' => 'required',
                'apellidos_empleado' => 'required',
                'cedula_empleado' => 'required|numeric|unique:quejaslaborales,cedula_empleado',
                'telefono_empleado' => 'required|numeric',
                'correo_empleado' => 'required|email',
                'area_empresa' => 'required',
                'cargo_empleado' => 'required',
                'fecha_diligenciamiento' => 'required|date',
                'queja_laboral' => 'required|mimes:pdf'
            ],
        );

        $quejalaboral = new QuejaLaboral;

        $quejalaboral->nombre_empleado = $request->nombre_empleado;
        $quejalaboral->apellidos_empleado = $request->apellidos_empleado;
        $quejalaboral->cedula_empleado = $request->cedula_empleado;
        $quejalaboral->telefono_empleado = $request->telefono_empleado;
        $quejalaboral->correo_empleado = $request->correo_empleado;
        $quejalaboral->area_empresa = $request->area_empresa;
        $quejalaboral->cargo_empleado = $request->cargo_empleado;
        $quejalaboral->fecha_diligenciamiento = $request->fecha_diligenciamiento;

        $documento = $request->file('queja_laboral');
        $ruta = public_path("comites/quejaslaborales/");
        $nombre = "Queja laboral". " ". $quejalaboral->cedula_empleado . " ".time().".".$documento->guessExtension();
        $quejalaboral->queja_laboral = $nombre;
        $documento->move($ruta,$nombre);

        $quejalaboral->save();
        return redirect()->route('quejaslaborales.show')->with('confirmacion','El registro ha sido creado exitosamente');
    }

    public function edit($id){
        $quejalaboral = QuejaLaboral::findOrFail($id);
        return view('comites.quejaslaborales.edit',['quejalaboral'=>$quejalaboral]);
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                'nombre_empleado' => 'required',
                'apellidos_empleado' => 'required',
                'cedula_empleado' => 'required|numeric',
                'telefono_empleado' => 'required|numeric',
                'correo_empleado' => 'required|email',
                'area_empresa' => 'required',
                'cargo_empleado' => 'required',
                'fecha_diligenciamiento' => 'required|date',
                'queja_laboral' => 'mimes:pdf'
            ],
        );

        $quejalaboral = QuejaLaboral::findOrFail($id);

        $quejalaboral->nombre_empleado = $request->nombre_empleado;
        $quejalaboral->apellidos_empleado = $request->apellidos_empleado;
        $quejalaboral->cedula_empleado = $request->cedula_empleado;
        $quejalaboral->telefono_empleado = $request->telefono_empleado;
        $quejalaboral->correo_empleado = $request->correo_empleado;
        $quejalaboral->area_empresa = $request->area_empresa;
        $quejalaboral->cargo_empleado = $request->cargo_empleado;
        $quejalaboral->fecha_diligenciamiento = $request->fecha_diligenciamiento;

        if($documento = $request->file('queja_laboral')){
            $ruta = public_path("comites/quejaslaborales/");
            $nombre = "Queja laboral". " ". $quejalaboral->cedula_empleado . " ".time().".".$documento->guessExtension();
            $quejalaboral->queja_laboral = $nombre;
            $documento->move($ruta,$nombre);
        }

        $quejalaboral->update();
        return redirect()->route('quejaslaborales.show')->with('confirmacion','El registro ha sido actualizado exitosamente');
    }
}
