<?php

namespace App\Http\Controllers\GestionSST;

use App\Http\Controllers\Controller;
use App\Models\GestionSST\DocumentosEmpresa;
use App\Models\GestionSST\TipoDocumento;
use Illuminate\Http\Request;

class DocumentosEmpresaController extends Controller
{
    public function index(){

        $documentos = DocumentosEmpresa::where('papelera','=','0')->get();
        return view('gestionsst.documentacion.documentos.show',['documentos'=>$documentos]);
    }

    public function create(){

        $tipodocumentos = TipoDocumento::all();
        return view('gestionsst.documentacion.documentos.create',['tipodocumentos'=>$tipodocumentos]);
    }

    public function store(Request $request){
        $request->validate(
            [
                'titulo' => 'required',
                'tipodocumento' => 'required|in:1,2,3,4,5',
                'descripcion' => 'required',
                'documento' => 'required|mimes:pdf',
            ],
        );

        $documentoempresa = new DocumentosEmpresa();
        $documentoempresa->titulo = $request->titulo;
        $documentoempresa->tipodocumento_id = $request->tipodocumento;
        $documentoempresa->descripcion = $request->descripcion;

        $documento = $request->file('documento');
        $ruta = public_path("documentosempresa/");
        $nombre = $documentoempresa->tipodocumento->nombre." ".time().".".$documento->guessExtension();
        $documentoempresa->documento = $nombre;
        $documento->move($ruta,$nombre);

        $documentoempresa->save();
        return redirect()->route('documentos.show')->with('confirmacion','El documento ha sido creado exitosamente');
    }

    public function edit($id){

        $documento = DocumentosEmpresa::findOrFail($id);
        $tipodocumentos = TipoDocumento::all();
        return view('gestionsst.documentacion.documentos.edit',['documento'=>$documento,'tipodocumentos'=>$tipodocumentos]);
    }

    public function update(Request $request, $id){

        $request->validate(
            [
                'titulo' => 'required',
                'tipodocumento' => 'required|in:1,2,3,4,5',
                'descripcion' => 'required',
                'documento' => 'mimes:pdf',
            ],
        );

        $documentoempresa = DocumentosEmpresa::findOrFail($id);
        $documentoempresa->titulo = $request->titulo;
        $documentoempresa->tipodocumento_id = $request->tipodocumento;
        $documentoempresa->descripcion = $request->descripcion;

        if($documento = $request->file('documento')){
            $ruta = public_path("documentosempresa/");
            $nombre = $documentoempresa->tipodocumento->nombre." ".time().".".$documento->guessExtension();
            $documentoempresa->documento = $nombre;
            $documento->move($ruta,$nombre);
        }

        $documentoempresa->update();
        return redirect()->route('documentos.show')->with('confirmacion','El documento ha sido actualizado exitosamente');

    }

    public function download($id) {

        $documento = DocumentosEmpresa::findOrFail($id);
        $ruta = public_path("documentosempresa/$documento->documento");
    	$headers = ['Content-Type: application/pdf'];
    	$nombredescarga = $documento->titulo ." ".time().'.pdf';

    	return response()->download($ruta, $nombredescarga, $headers);
    }


}
