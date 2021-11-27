<?php

namespace App\Http\Controllers\GestionSST;

use App\Http\Controllers\Controller;
use App\Models\GestionSST\Empresa;
use App\Models\GestionSST\Riesgo;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(){

        $empresas = Empresa::get();
        return view('gestionsst.documentacion.empresa.show',['empresas'=>$empresas]);
    }

    public function create(){

        $riesgos = Riesgo::all();
        return view('gestionsst.documentacion.empresa.create',['riesgos'=>$riesgos]);
    }

    public function store(Request $request){

        $empresa = new Empresa();
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->nit = $request->nit;
        $empresa->direccion = $request->direccion_empresa;
        $empresa->actividad_economica = $request->actividad_economica;
        $empresa->nivel_riesgo = $request->nivel_riesgo;
        $empresa->cantidad_trabajadores = $request->cantidad_trabajadores;
        $empresa->naturaleza_juridica = $request->naturaleza_juridica;
        $empresa->telefono1 = $request->telefono1;
        $empresa->telefono2 = $request->telefono2;
        $empresa->telefono3 = $request->telefono3;
        $empresa->correo_electronico = $request->correo_electronico;
        $empresa->tipo_empresa = $request->tipo_empresa;
        $empresa->save();

        return redirect()->route('empresa.show');

    }

    public function edit($id){

        $empresa = Empresa::findOrFail($id);
        $riesgos = Riesgo::all();
        return view('gestionsst.documentacion.empresa.edit',['empresa'=>$empresa,'riesgos'=>$riesgos]);
    }

    public function update(Request $request, $id){

        $request->validate(
            [
                'nombre_empresa' => 'required',
                'nit' => 'required|numeric',
                'actividad_economica' => 'required',
                'tipo_empresa' => 'required',
                'nivel_riesgo' => 'required|in:1,2,3,4,5',
                'cantidad_trabajadores' => 'required',
                'naturaleza_juridica' => 'required',
                'telefono1' => 'required|numeric',
                'correo_electronico' => 'required|email',
                'direccion_empresa' => 'required',
            ]
        );

        $empresa = Empresa::findOrFail($id);
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->nit = $request->nit;
        $empresa->direccion = $request->direccion_empresa;
        $empresa->actividad_economica = $request->actividad_economica;
        $empresa->riesgo_id = $request->nivel_riesgo;
        $empresa->cantidad_trabajadores = $request->cantidad_trabajadores;
        $empresa->naturaleza_juridica = $request->naturaleza_juridica;
        $empresa->telefono1 = $request->telefono1;
        $empresa->telefono2 = $request->telefono2;
        $empresa->telefono3 = $request->telefono3;
        $empresa->correo_electronico = $request->correo_electronico;
        $empresa->tipo_empresa = $request->tipo_empresa;
        $empresa->update();

        return redirect()->route('empresa.show')->with('confirmacion','La información ha sido actualizada exitosamente');
    }
}
