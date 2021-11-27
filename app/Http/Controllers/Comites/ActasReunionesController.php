<?php

namespace App\Http\Controllers\Comites;

use App\Http\Controllers\Controller;
use App\Models\Comites\ActaReunion;
use App\Models\Comites\MiembroComite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActasReunionesController extends Controller
{
    public function index(){

        if(Auth::user()->role->id === 3){
            $actasreuniones = ActaReunion::where('comite_id','=',3)
                                ->where('papelera','=',0)
                                ->get(); //Comite COCOLA

        }elseif(Auth::user()->role->id === 4){
            $actasreuniones = ActaReunion::where('comite_id','=',4)
                                ->where('papelera','=',0)
                                ->get(); //Comite COPASST

        }elseif(Auth::user()->role->id === 5){
            $actasreuniones = ActaReunion::where('comite_id','=',5)
                                ->where('papelera','=',0)
                                ->get(); //Brigada de emergencia
        }else{
            $actasreuniones = ActaReunion::where('papelera','=',0)->get(); //Administrador
        }

        return view('comites.actasreuniones.show',['actasreuniones'=>$actasreuniones]);
        }

    public function create(){

        if(Auth::user()->role->id === 3){
            $lideres = MiembroComite::where('comite_id','=',3)->get(); //Comite COCOLA

        }elseif(Auth::user()->role->id === 4){
            $lideres = MiembroComite::where('comite_id','=',4)->get(); //Comite COPASST

        }elseif(Auth::user()->role->id === 5){
            $lideres = MiembroComite::where('comite_id','=',5)->get();; //Brigada de emergencia
        }else{
            $lideres = MiembroComite::all();; //Administrador
        }

        return view('comites.actasreuniones.create',['lideres'=>$lideres]);
    }

    public function store(Request $request){
        $request->validate(
            [
                'lider' => 'required|not_in:"#"',
                'fecha_reunion' => 'required|date',
                'hora_inicio' => 'required',
                'hora_final' => 'required',
                'lugar_reunion' => 'required',
                'descripcion_reunion' => 'required',
                'acta_reunion' => 'required|mimes:pdf'
            ],
        );

        $actareunion = new ActaReunion;

        if(Auth::user()->role->id === 3){
            $actareunion->comite_id = 3; //Comite COCOLA
            $comite = "COCOLA";

        } elseif(Auth::user()->role->id === 4){
            $actareunion->comite_id = 4; //Comite COPASST
            $comite = "COPASST";

        } else{
            $actareunion->comite_id = 5; //Brigada de emergencia
            $comite = "BE";
        }

        $actareunion->lider_id = $request->lider;
        $actareunion->fecha_reunion = $request->fecha_reunion;
        $actareunion->hora_inicio = $request->hora_inicio;
        $actareunion->hora_final = $request->hora_final;
        $actareunion->lugar_reunion = $request->lugar_reunion;
        $actareunion->descripcion_reunion = $request->descripcion_reunion;

        $actadereunion = $request->file('acta_reunion');
        $ruta = public_path("comites/actasreuniones/");
        $nombre = "Acta reunion". " ". $comite . " del " . $actareunion->fecha_reunion ." ".time().".".$actadereunion->guessExtension();
        $actareunion->acta_reunion = $nombre;
        $actadereunion->move($ruta,$nombre);

        $actareunion->save();

        return redirect()->route('actasreuniones.show')->with('confirmacion','El registro ha sido creado exitosamente');
    }

    public function edit($id){
        $actareunion = ActaReunion::findOrFail($id);

        if(Auth::user()->role->id === 3){
            $lideres = MiembroComite::where('comite_id','=',3)->get(); //Comite COCOLA

        }elseif(Auth::user()->role->id === 4){
            $lideres = MiembroComite::where('comite_id','=',4)->get(); //Comite COPASST

        }elseif(Auth::user()->role->id === 5){
            $lideres = MiembroComite::where('comite_id','=',5)->get();; //Brigada de emergencia
        }else{
            $lideres = MiembroComite::all();; //Administrador
        }

        return view('comites.actasreuniones.edit',['actareunion'=>$actareunion,'lideres'=>$lideres]);
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                'lider' => 'required|not_in:"#"',
                'fecha_reunion' => 'required|date',
                'hora_inicio' => 'required',
                'hora_final' => 'required',
                'lugar_reunion' => 'required',
                'descripcion_reunion' => 'required',
                'acta_reunion' => 'mimes:pdf'
            ],
        );

        $actareunion = ActaReunion::findOrFail($id);
        $actareunion->lider_id = $request->lider;
        $actareunion->fecha_reunion = $request->fecha_reunion;
        $actareunion->hora_inicio = $request->hora_inicio;
        $actareunion->hora_final = $request->hora_final;
        $actareunion->lugar_reunion = $request->lugar_reunion;
        $actareunion->descripcion_reunion = $request->descripcion_reunion;

        if(Auth::user()->role->id === 3){
            $comite = "COCOLA";

        } elseif(Auth::user()->role->id === 4){
            $comite = "COPASST";

        } else{
            $comite = "BE";
        }

        if($actadereunion = $request->file('acta_reunion')){
            $ruta = public_path("comites/actasreuniones/");
            $nombre = "Acta reunion". " ". $comite . " del " . $actareunion->fecha_reunion ." ".time().".".$actadereunion->guessExtension();
            $actareunion->acta_reunion = $nombre;
            $actadereunion->move($ruta,$nombre);
        }

        $actareunion->update();

        return redirect()->route('actasreuniones.show')->with('confirmacion','El registro ha sido actualizado exitosamente');

    }
}
