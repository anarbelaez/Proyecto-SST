<?php

namespace App\Http\Controllers\Comites;

use App\Http\Controllers\Controller;
use App\Models\Comites\PostulanteBE;
use Illuminate\Http\Request;

class PostulantesBEController extends Controller
{
    public function index(){
        $postulantesbe = PostulanteBE::all();
        return view('comites.brigadaemergencia.postulantes.show',['postulantesbe'=>$postulantesbe]);
    }

    public function create(){
        return view('comites.brigadaemergencia.postulantes.create');
    }

    public function store(Request $request){
        $request->validate(
            [
                'nombre_postulante' => 'required',
                'apellidos_postulante' => 'required',
                'cedula_postulante' => 'required|numeric|unique:bepostulantes,cedula_postulante',
                'telefono_postulante' => 'required|numeric',
                'correo_postulante' => 'required|email',
                'area_empresa' => 'required',
                'fecha_ingreso' => 'required|date',
                'experiencia_brigadas' => 'required',
                'hdv_postulante' => 'required|mimes:pdf'
            ],
        );

        $postulantebe = new PostulanteBE;

        $postulantebe->nombre_postulante = $request->nombre_postulante;
        $postulantebe->apellidos_postulante = $request->apellidos_postulante;
        $postulantebe->cedula_postulante = $request->cedula_postulante;
        $postulantebe->telefono_postulante = $request->telefono_postulante;
        $postulantebe->correo_postulante = $request->correo_postulante;
        $postulantebe->area_empresa = $request->area_empresa;
        $postulantebe->fecha_ingreso = $request->fecha_ingreso;
        $postulantebe->experiencia_brigadas = $request->experiencia_brigadas;

        if($request->experiencia_brigadas === "si"){
            $postulantebe->experiencia_brigadas = "Sí";
        }else{
            $postulantebe->experiencia_brigadas = "No";
        }

        $hdvpostulante = $request->file('hdv_postulante');
        $ruta = public_path("comites/postulantesbe/");
        $nombre = "Hoja de vida - Postulante a la Brigada de Emergencia". " ". $postulantebe->cedula_postulante . " ".time().".".$hdvpostulante->guessExtension();
        $postulantebe->hdv_postulante = $nombre;
        $hdvpostulante->move($ruta,$nombre);

        $postulantebe->save();
        return redirect()->route('postulantesbe.show')->with('confirmacion','El postulante a la Brigada de Emergencia ha sido creado exitosamente');
    }

    public function edit($id){
        $postulantebe = PostulanteBE::findOrFail($id);
        return view('comites.brigadaemergencia.postulantes.edit',['postulantebe'=>$postulantebe]);
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                'nombre_postulante' => 'required',
                'apellidos_postulante' => 'required',
                'cedula_postulante' => 'required|numeric',
                'telefono_postulante' => 'required|numeric',
                'correo_postulante' => 'required|email',
                'area_empresa' => 'required',
                'fecha_ingreso' => 'required|date',
                'experiencia_brigadas' => 'required',
                'hdv_postulante' => 'mimes:pdf'
            ],
        );

        $postulantebe = PostulanteBE::findOrFail($id);

        $postulantebe->nombre_postulante = $request->nombre_postulante;
        $postulantebe->apellidos_postulante = $request->apellidos_postulante;
        $postulantebe->cedula_postulante = $request->cedula_postulante;
        $postulantebe->telefono_postulante = $request->telefono_postulante;
        $postulantebe->correo_postulante = $request->correo_postulante;
        $postulantebe->area_empresa = $request->area_empresa;
        $postulantebe->fecha_ingreso = $request->fecha_ingreso;
        $postulantebe->experiencia_brigadas = $request->experiencia_brigadas;

        if($request->experiencia_brigadas === "si"){
            $postulantebe->experiencia_brigadas = "Sí";
        }else{
            $postulantebe->experiencia_brigadas = "No";
        }

        if($hdvpostulante = $request->file('hdv_postulante')){
            $ruta = public_path("comites/postulantesbe/");
            $nombre = "Hoja de vida - Postulante a la Brigada de Emergencia". " ". $postulantebe->cedula_postulante . " ".time().".".$hdvpostulante->guessExtension();
            $postulantebe->hdv_postulante = $nombre;
            $hdvpostulante->move($ruta,$nombre);
        }

        $postulantebe->update();
        return redirect()->route('postulantesbe.show')->with('confirmacion','El postulante a la Brigada de Emergencia ha sido actualizado exitosamente');

    }
}
