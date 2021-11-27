<?php

namespace App\Http\Controllers\GestionSST;

use App\Http\Controllers\Controller;
use App\Models\GestionSST\FichaProducto;
use App\Models\GestionSST\Proveedor;
use Illuminate\Http\Request;

class AliadosController extends Controller
{
    public function index(){

        $proveedores = Proveedor::where('activo','=',1)->get();
        return view('gestionsst.documentacion.aliados.show',['proveedores'=>$proveedores]);
    }

    public function create(){
        return view('gestionsst.documentacion.aliados.create');
    }

    public function store(Request $request){

        $request->validate(
            [
                'nombre_proveedor' => 'required',
                'nit' => 'required|numeric|unique:proveedors,nit',
                'arl' => 'required',
                'certificado_arl'=> 'required|mimes:pdf',
                'seguridad_social'=> 'required|mimes:pdf',
            ],
        );

        $proveedor = new Proveedor();
        $proveedor->nombre_proveedor = $request->nombre_proveedor;
        $proveedor->nit = $request->nit;
        $proveedor->arl = $request->arl;

        //Documentos
        $ruta = public_path("documentosproveedores/");

        //Certificado ARL
        $certificado_arl = $request->file('certificado_arl');
        $nombre = "Certificado ARL"." ".$proveedor->nombre_proveedor." ".time().".".$certificado_arl->guessExtension();
        $proveedor->certificado_arl = $nombre;
        $certificado_arl->move($ruta,$nombre);

        //Seguridad Social
        $seguridad_social = $request->file('seguridad_social');
        $nombre = "Seguridad Social"." ".$proveedor->nombre_proveedor." ".time().".".$seguridad_social->guessExtension();
        $proveedor->seguridad_social = $nombre;
        $seguridad_social->move($ruta,$nombre);

        $proveedor->save();
        return redirect()->route('aliados.show')->with('confirmacion','El proveedor ha sido creado exitosamente');
    }

    public function edit($id){

        $proveedor = Proveedor::findOrFail($id);
        return view('gestionsst.documentacion.aliados.edit',['proveedor'=>$proveedor]);
    }

    public function update(Request $request, $id){

        $request->validate(
            [
                'nombre_proveedor' => 'required',
                'nit' => 'required|numeric',
                'arl' => 'required',
                'certificado_arl'=> 'mimes:pdf',
                'seguridad_social'=> 'mimes:pdf',
            ],
        );

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->nombre_proveedor = $request->nombre_proveedor;
        $proveedor->nit = $request->nit;
        $proveedor->arl = $request->arl;

        //Documentos
        $ruta = public_path("documentosproveedores/");

        //Certificado ARL
        if($certificado_arl = $request->file('certificado_arl')){
            $nombre = "Certificado ARL"." ".$proveedor->nombre_proveedor." ".time().".".$certificado_arl->guessExtension();
            $proveedor->certificado_arl = $nombre;
            $certificado_arl->move($ruta,$nombre);
        }

        //Seguridad Social
        if($seguridad_social = $request->file('seguridad_social')){
            $nombre = "Seguridad Social"." ".$proveedor->nombre_proveedor." ".time().".".$seguridad_social->guessExtension();
            $proveedor->seguridad_social = $nombre;
            $seguridad_social->move($ruta,$nombre);
        }

        $proveedor->update();
        return redirect()->route('aliados.show')->with('confirmacion','El proveedor ha sido actualizado exitosamente');
    }
}
