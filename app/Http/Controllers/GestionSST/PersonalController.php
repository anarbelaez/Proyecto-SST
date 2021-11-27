<?php

namespace App\Http\Controllers\GestionSST;

use App\Http\Controllers\Controller;
use App\Models\GestionSST\NivelesEstudio;
use App\Models\GestionSST\PersonalSST;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index(){

        $empleados = PersonalSST::all();
        return view('gestionsst.documentacion.personal.show',['empleados'=>$empleados]);
    }

    public function create(){

        $niveles_estudio = NivelesEstudio::all();
        return view('gestionsst.documentacion.personal.create',['niveles_estudio'=>$niveles_estudio]);
    }

    public function store(Request $request){
        //Validar el request
        $request->validate(
            [
                'nombre_empleado' => 'required',
                'apellidos_empleado' => 'required',
                'documento_identidad' => 'required|numeric|unique:personalsst,documento_identidad',
                'nivel_estudio' => 'required|in:1,2,3,4,5',
                'hdv'=> 'required|mimes:pdf',
                'diploma'=> 'required|mimes:pdf',
                'certisalud'=> 'required|mimes:pdf',
                'curso50h'=> 'required|mimes:pdf',
            ],
        );

        //Guardar empleado
        $empleado = new PersonalSST;
        $empleado->nombre_empleado = $request->nombre_empleado;
        $empleado->apellidos_empleado = $request->apellidos_empleado;
        $empleado->documento_identidad = $request->documento_identidad;
        $empleado->nivelestudio_id = $request->nivel_estudio;

        //Guardar archivos
        $documentos =[];
        if ($request->file('hdv')) $documentos[] = ($hdv = $request->file('hdv'));
        if ($request->file('diploma')) $documentos[] = ($diploma = $request->file('diploma'));
        if ($request->file('certisalud')) $documentos[] = ($certisalud = $request->file('certisalud'));
        if ($request->file('curso50h')) $documentos[] = ($curso50h = $request->file('curso50h'));

        $ruta = public_path("documentosempleados/");
        foreach ($documentos as $documento)
        {
            if($documento === $hdv) {
                $tipodoc = 'Hoja de vida ';
                $nombre = $tipodoc.$empleado->documento_identidad.".".$documento->guessExtension();
                $empleado->hdv = $nombre;
            }elseif($documento === $diploma) {
                $tipodoc = 'Diploma de estudios ';
                $nombre = $tipodoc.$empleado->documento_identidad.".".$documento->guessExtension();
                $empleado->diploma = $nombre;
            }elseif($documento === $certisalud) {
                $tipodoc = 'Certificado de salud ';
                $nombre = $tipodoc.$empleado->documento_identidad.".".$documento->guessExtension();
                $empleado->certisalud = $nombre;
            }elseif($documento === $curso50h) {
                $tipodoc = 'Certificado Curso 50h ';
                $nombre = $tipodoc.$empleado->documento_identidad.".".$documento->guessExtension();
                $empleado->curso50h = $nombre;            }
                $documento->move($ruta,$nombre);
        }
        $empleado->save();
        return redirect()->route('personal.show')->with('confirmacion','El usuario ha sido creado exitosamente');
    }

/*  $this->documentosEmpleado($empleado, $hdv);
    public function documentosEmpleado($empleado, $hdv) {
    }
 */

    public function edit($id){

        $empleado = PersonalSST::findOrFail($id);
        $niveles_estudio = NivelesEstudio::all();
        return view('gestionsst.documentacion.personal.edit',['empleado'=>$empleado,'niveles_estudio'=>$niveles_estudio]);
    }

    public function update(Request $request, $id){

        $request->validate(
            [
                'nombre_empleado' => 'required',
                'apellidos_empleado' => 'required',
                'documento_identidad' => 'required|numeric',
                'nivel_estudio' => 'required|in:1,2,3,4,5',
                'hdv'=> 'mimes:pdf',
                'diploma'=> 'mimes:pdf',
                'certisalud'=> 'mimes:pdf',
                'curso50h'=> 'mimes:pdf',
            ],
        );
        $empleado = PersonalSST::findOrFail($id);
        $empleado->nombre_empleado = $request->nombre_empleado;
        $empleado->apellidos_empleado = $request->apellidos_empleado;
        $empleado->documento_identidad = $request->documento_identidad;
        $empleado->nivelestudio_id = $request->nivel_estudio;

        //Guardar archivos
        $documentos =[];
        if ($request->file('hdv')) $documentos[] = ($hdv = $request->file('hdv'));
        if ($request->file('diploma')) $documentos[] = ($diploma = $request->file('diploma'));
        if ($request->file('certisalud')) $documentos[] = ($certisalud = $request->file('certisalud'));
        if ($request->file('curso50h')) $documentos[] = ($curso50h = $request->file('curso50h'));

        $ruta = public_path("documentosempleados/");
        foreach ($documentos as $documento)
        {
            if($documento === $hdv) {
                $tipodoc = 'Hoja de vida ';
                $nombre = $tipodoc.$empleado->documento_identidad.".".$documento->guessExtension();
                $empleado->hdv = $nombre;
            }elseif($documento === $diploma) {
                $tipodoc = 'Diploma de estudios ';
                $nombre = $tipodoc.$empleado->documento_identidad.".".$documento->guessExtension();
                $empleado->diploma = $nombre;
            }elseif($documento === $certisalud) {
                $tipodoc = 'Certificado de salud ';
                $nombre = $tipodoc.$empleado->documento_identidad.".".$documento->guessExtension();
                $empleado->certisalud = $nombre;
            }elseif($documento === $curso50h) {
                $tipodoc = 'Certificado Curso 50h ';
                $nombre = $tipodoc.$empleado->documento_identidad.".".$documento->guessExtension();
                $empleado->curso50h = $nombre;
            }
                $documento->move($ruta,$nombre);
        }

        $empleado->update();
        return redirect('/gestionsst/personal')->with('confirmacion','El usuario ha sido actualizado exitosamente');

    }
}
