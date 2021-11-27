<?php

namespace App\Http\Controllers\Comites;

use App\Http\Controllers\Controller;
use App\Models\Comites\ActaVotacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ActasVotacionController extends Controller
{
    public function index(){

        if(Auth::user()->role->id === 3){
            $actasvotaciones = ActaVotacion::where('comite_id','=',3)
                                ->where('papelera','=',0)
                                ->get(); //Comite COCOLA

        }elseif(Auth::user()->role->id === 4){
            $actasvotaciones = ActaVotacion::where('comite_id','=',4)
                                ->where('papelera','=',0)
                                ->get(); //Comite COPASST

        }else{
            $actasvotaciones = ActaVotacion::where('papelera','=',0)->get(); //Administrador
        }

        return view('comites.actasvotacion.show',['actasvotaciones'=>$actasvotaciones]);
    }

    public function create(){
        return view('comites.actasvotacion.create');
    }

    public function store(Request $request) {
        $request->validate(
            [
                'fecha_votacion' => 'required|date',
                'lugar_votacion' => 'required',
                'objetivo_votacion' => 'required',
                'votos' => 'required|numeric',
                'votos_blanco' => 'required|numeric',
                'descripcion_votacion' => 'required',
                'acta_votacion' => 'required|mimes:pdf'
            ],
        );

        $actavotacion = new ActaVotacion;

        if(Auth::user()->role->id === 3){
            $actavotacion->comite_id = 3; //Comite COCOLA
            $comite = "COCOLA";

        }else{
            $actavotacion->comite_id = 4; //Comite COPASST
            $comite = "COPASST";
        }

        $actavotacion->fecha_votacion = $request->fecha_votacion;
        $actavotacion->lugar_votacion = $request->lugar_votacion;
        $actavotacion->objetivo_votacion = $request->objetivo_votacion;
        $actavotacion->votos = $request->votos;
        $actavotacion->votos_blanco = $request->votos_blanco;
        $actavotacion->descripcion_votacion = $request->descripcion_votacion;

        $actadevotacion = $request->file('acta_votacion');
        $ruta = public_path("comites/actasvotaciones/");
        $nombre = "Acta votacion". " ". $comite . " del " . $actavotacion->fecha_votacion ." ".time().".".$actadevotacion->guessExtension();
        $actavotacion->acta_votacion = $nombre;
        $actadevotacion->move($ruta,$nombre);

        $actavotacion->save();

        return redirect()->route('actasvotacion.show')->with('confirmacion','El registro ha sido creado exitosamente');
    }

    public function edit($id){
        $actavotacion = ActaVotacion::findOrFail($id);
        return view('comites.actasvotacion.edit',['actavotacion'=>$actavotacion]);
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                'fecha_votacion' => 'required|date',
                'lugar_votacion' => 'required',
                'objetivo_votacion' => 'required',
                'votos' => 'required|numeric',
                'votos_blanco' => 'required|numeric',
                'descripcion_votacion' => 'required',
                'acta_votacion' => 'mimes:pdf'
            ],
        );

        $actavotacion = ActaVotacion::findOrFail($id);

        if(Auth::user()->role->id === 3){
            $actavotacion->comite_id = 3; //Comite COCOLA
            $comite = "COCOLA";

        }else{
            $actavotacion->comite_id = 4; //Comite COPASST
            $comite = "COPASST";
        }

        $actavotacion->fecha_votacion = $request->fecha_votacion;
        $actavotacion->lugar_votacion = $request->lugar_votacion;
        $actavotacion->objetivo_votacion = $request->objetivo_votacion;
        $actavotacion->votos = $request->votos;
        $actavotacion->votos_blanco = $request->votos_blanco;
        $actavotacion->descripcion_votacion = $request->descripcion_votacion;

        if($actadevotacion = $request->file('acta_votacion')){
            $ruta = public_path("comites/actasvotaciones/");
            $nombre = "Acta votacion". " ". $comite . " del " . $actavotacion->fecha_votacion ." ".time().".".$actadevotacion->guessExtension();
            $actavotacion->acta_votacion = $nombre;
            $actadevotacion->move($ruta,$nombre);
        }

        $actavotacion->update();
        return redirect()->route('actasvotacion.show')->with('confirmacion','El registro ha sido actualizado exitosamente');

    }
}
