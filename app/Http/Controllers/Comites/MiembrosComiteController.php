<?php

namespace App\Http\Controllers\Comites;

use App\Http\Controllers\Controller;
use App\Models\Comites\Cargo;
use App\Models\Comites\MiembroComite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MiembrosComiteController extends Controller
{
    public function index(){

        if(Auth::user()->role->id === 3){
            $miembroscomite = MiembroComite::where('comite_id','=',3)->get(); //Comite COCOLA

        }elseif(Auth::user()->role->id === 4){
            $miembroscomite = MiembroComite::where('comite_id','=',4)->get(); //Comite COPASST

        }elseif(Auth::user()->role->id === 5){
            $miembroscomite = MiembroComite::where('comite_id','=',5)->get();; //Brigada de emergencia
        }else{
            $miembroscomite = MiembroComite::all();; //Administrador
        }

        return view('comites.miembroscomite.show',['miembroscomite'=>$miembroscomite]);
    }

    public function create(){
        $cargos = Cargo::all();
        return view('comites.miembroscomite.create',['cargos'=>$cargos]);
    }

    public function store(Request $request){
        $request->validate(
            [
                'nombre_miembro' => 'required',
                'apellidos_miembro' => 'required',
                'cedula_miembro' => 'required|numeric|unique:miembroscomites,cedula_miembro',
                'telefono_miembro' => 'required|numeric',
                'correo_miembro' => 'required|email',
                'cargo' => 'required|in:1,2,3,4'
            ],
        );

        $miembrocomite = new MiembroComite;

        if(Auth::user()->role->id === 3){
            $miembrocomite->comite_id = 3; //Comite COCOLA

        } elseif(Auth::user()->role->id === 4){
            $miembrocomite->comite_id = 4; //Comite COPASST

        } else{
            $miembrocomite->comite_id = 5; //Brigada de emergencia
        }

        $miembrocomite->nombre_miembro = $request->nombre_miembro;
        $miembrocomite->apellidos_miembro = $request->apellidos_miembro;
        $miembrocomite->cedula_miembro = $request->cedula_miembro;
        $miembrocomite->telefono_miembro = $request->telefono_miembro;
        $miembrocomite->correo_miembro = $request->correo_miembro;
        $miembrocomite->cargo_id = $request->cargo;
        $miembrocomite->save();

        return redirect()->route('miembroscomite.show')->with('confirmacion','El miembro del comité ha sido creado exitosamente');
    }

    public function edit($id){
        $miembrocomite = MiembroComite::findOrFail($id);
        $cargos = Cargo::all();
        return view('comites.miembroscomite.edit',['miembrocomite'=>$miembrocomite,'cargos'=>$cargos]);
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                'nombre_miembro' => 'required',
                'apellidos_miembro' => 'required',
                'cedula_miembro' => 'required|numeric',
                'telefono_miembro' => 'numeric',
                'correo_miembro' => 'required|email',
                'cargo' => 'required|in:1,2,3,4'
            ],
        );

        $miembrocomite = MiembroComite::findOrFail($id);
        $miembrocomite->nombre_miembro = $request->nombre_miembro;
        $miembrocomite->apellidos_miembro = $request->apellidos_miembro;
        $miembrocomite->cedula_miembro = $request->cedula_miembro;
        $miembrocomite->telefono_miembro = $request->telefono_miembro;
        $miembrocomite->correo_miembro = $request->correo_miembro;
        $miembrocomite->cargo_id = $request->cargo;

        $miembrocomite->update();
        return redirect()->route('miembroscomite.show')->with('confirmacion','El miembro del comité ha sido actualizado exitosamente');
    }
}
