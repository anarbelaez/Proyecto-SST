<?php

namespace App\Http\Controllers\Comites;

use App\Http\Controllers\Controller;
use App\Models\Comites\ActaNombramiento;
use App\Models\Comites\MiembroComite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ActasNombramientosController extends Controller
{
    public function index(){
        if(Auth::user()->role->id === 3){
            $actasnombramientos = ActaNombramiento::where('comite_id','=',3)
                                ->where('papelera','=',0)
                                ->get(); //Comite COCOLA

        }elseif(Auth::user()->role->id === 4){
            $actasnombramientos = ActaNombramiento::where('comite_id','=',4)
                                ->where('papelera','=',0)
                                ->get(); //Comite COPASST

        }elseif(Auth::user()->role->id === 5){
            $actasnombramientos = ActaNombramiento::where('comite_id','=',5)
                                ->where('papelera','=',0)
                                ->get(); //Brigada de emergencia
        }else{
            $actasnombramientos = ActaNombramiento::where('papelera','=',0)->get(); //Administrador
        }
        return view('comites.actasnombramientos.show',['actasnombramientos'=>$actasnombramientos]);
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
        return view('comites.actasnombramientos.create',['lideres'=>$lideres]);
    }

    public function store(Request $request){
        $request->validate(
            [
                'lider' => 'required|not_in:"#"',
                'fecha_nombramiento' => 'required|date',
                'titulo_nombramiento' => 'required',
                'descripcion_nombramiento' => 'required',
                'acta_nombramiento' => 'required|mimes:pdf'
            ],
        );

        $actanombramiento = new ActaNombramiento;

        if(Auth::user()->role->id === 3){
            $actanombramiento->comite_id = 3; //Comite COCOLA
            $comite = "COCOLA";

        } elseif(Auth::user()->role->id === 4){
            $actanombramiento->comite_id = 4; //Comite COPASST
            $comite = "COPASST";

        } else{
            $actanombramiento->comite_id = 5; //Brigada de emergencia
            $comite = "BE";
        }

        $actanombramiento->lider_id = $request->lider;
        $actanombramiento->fecha_nombramiento = $request->fecha_nombramiento;
        $actanombramiento->titulo_nombramiento = $request->titulo_nombramiento;
        $actanombramiento->descripcion_nombramiento = $request->descripcion_nombramiento;

        $actadenombramiento = $request->file('acta_nombramiento');
        $ruta = public_path("comites/actasnombramientos/");
        $nombre = "Acta nombramiento". " ". $comite . " del " . $actanombramiento->fecha_nombramiento ." ".time().".".$actadenombramiento->guessExtension();
        $actanombramiento->acta_nombramiento = $nombre;
        $actadenombramiento->move($ruta,$nombre);

        $actanombramiento->save();

        return redirect()->route('actasnombramiento.show')->with('confirmacion','El registro ha sido creado exitosamente');

    }

    public function edit($id){
        $actanombramiento = ActaNombramiento::findOrFail($id);

        if(Auth::user()->role->id === 3){
            $lideres = MiembroComite::where('comite_id','=',3)->get(); //Comite COCOLA

        }elseif(Auth::user()->role->id === 4){
            $lideres = MiembroComite::where('comite_id','=',4)->get(); //Comite COPASST

        }elseif(Auth::user()->role->id === 5){
            $lideres = MiembroComite::where('comite_id','=',5)->get();; //Brigada de emergencia
        }else{
            $lideres = MiembroComite::all();; //Administrador
        }

        return view('comites.actasnombramientos.edit',['actanombramiento'=>$actanombramiento,'lideres'=>$lideres]);
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                'lider' => 'required|not_in:"#"',
                'fecha_nombramiento' => 'required|date',
                'titulo_nombramiento' => 'required',
                'descripcion_nombramiento' => 'required',
                'acta_nombramiento' => 'mimes:pdf'
            ],
        );

        $actanombramiento = ActaNombramiento::findOrFail($id);

        if(Auth::user()->role->id === 3){
            $actanombramiento->comite_id = 3; //Comite COCOLA
            $comite = "COCOLA";

        } elseif(Auth::user()->role->id === 4){
            $actanombramiento->comite_id = 4; //Comite COPASST
            $comite = "COPASST";

        } else{
            $actanombramiento->comite_id = 5; //Brigada de emergencia
            $comite = "BE";
        }

        $actanombramiento->lider_id = $request->lider;
        $actanombramiento->fecha_nombramiento = $request->fecha_nombramiento;
        $actanombramiento->titulo_nombramiento = $request->titulo_nombramiento;
        $actanombramiento->descripcion_nombramiento = $request->descripcion_nombramiento;

        if($actadenombramiento = $request->file('acta_nombramiento')){
            $ruta = public_path("comites/actasnombramientos/");
            $nombre = "Acta nombramiento". " ". $comite . " del " . $actanombramiento->fecha_nombramiento ." ".time().".".$actadenombramiento->guessExtension();
            $actanombramiento->acta_nombramiento = $nombre;
            $actadenombramiento->move($ruta,$nombre);
        }
        $actanombramiento->update();

        return redirect()->route('actasnombramiento.show')->with('confirmacion','El registro ha sido actualizado exitosamente');

    }
}
