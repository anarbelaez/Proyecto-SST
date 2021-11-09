<?php

namespace App\Http\Controllers\GestionSST;

use App\Http\Controllers\Controller;
use App\Models\GestionSST\DocumentosEmpleado;
use App\Models\GestionSST\NivelesEstudio;
use App\Models\GestionSST\PersonalSST;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index(){

        $empleados = PersonalSST::all();

       /*  $documentos = DB::table('personal_documento as pd')
                    ->select('pd.ruta_archivo')
                    ->where('pd.personalsst_id','=',1)
                    ->get(); */

/*         $documentos = DocumentosEmpleado::where('personalsst_id','=',1)->get();
 */        return view('gestionsst.documentacion.personal.show',['empleados'=>$empleados]);
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
                'documento_identidad' => 'required|numeric',
                'nivel_estudio' => 'required|in:1,2,3,4,5',
                'hdv'=> 'required|mimes:pdf',
                'diploma'=> 'required|mimes:pdf',
                'certisalud'=> 'required|mimes:pdf',
                'curso50h'=> 'required|mimes:pdf',
            ],
            [
                'nombre_empleado.required' => 'El nombre del empleado es requerido.',
                'apellidos_empleado.required' => 'El apellido del empleado es requerido.',
                'documento_identidad.required' => 'Ingrese el número de documento de identidad del empleado.',
                'nivel_estudio.in' => 'Seleccione el nivel de estudios del empleado.'
            ]
        );
        //Guardar empleado
        $empleado = new PersonalSST;
        $empleado->nombre_empleado = $request->nombre_empleado;
        $empleado->apellidos_empleado = $request->apellidos_empleado;
        $empleado->documento_identidad = $request->documento_identidad;
        $empleado->nivel_estudios_id = $request->nivel_estudio;
        $empleado->save();

        //Enviar documentos a tabla documentos_empleado
        $documentos =[];
        if ($request->file('hdv')) $documentos[] = ($hdv = $request->file('hdv'));
        if ($request->file('diploma')) $documentos[] = ($diploma = $request->file('diploma'));
        if ($request->file('certisalud')) $documentos[] = ($certisalud = $request->file('certisalud'));
        if ($request->file('curso50h')) $documentos[] = ($curso50h = $request->file('curso50h'));

        foreach ($documentos as $documento)
        {
            if($documento === $hdv) {
                $tipodoc = 1;
            }elseif($documento === $diploma) {
                $tipodoc = 2;
            }elseif($documento === $certisalud) {
                $tipodoc = 3;
            }elseif($documento === $curso50h) {
                $tipodoc = 4;
            }

            $nombre = $documento->getClientOriginalName();
            $documento->move('ensayo','$nombre');
            $documento_empleado = new DocumentosEmpleado;
            $documento_empleado->personalsst_id = $empleado->id;
            $documento_empleado->tipodocumento_id = $tipodoc;
            $documento_empleado->ruta_archivo = $nombre;
            $documento_empleado->save();
        }
    }

/*         $this->documentosEmpleado($empleado, $hdv);
 */
    public function documentosEmpleado($empleado, $hdv) {


    }

    public function edit(){
        return view('gestionsst.documentacion.personal.edit');
    }

    public function update(){

    }
}
