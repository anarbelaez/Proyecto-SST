<?php

namespace App\Http\Controllers\GestionSST;

use App\Http\Controllers\Controller;
use App\Models\GestionSST\FichaProducto;
use App\Models\GestionSST\Producto;
use App\Models\GestionSST\Proveedor;
use Illuminate\Http\Request;

class FichasSeguridadController extends Controller
{
    public function index(){

        $fichasseguridad = FichaProducto::where('papelera','=','0')->get();
        return view('gestionsst.documentacion.fichasseguridad.show',['fichasseguridad'=>$fichasseguridad]);
    }

    public function show($id){
        $productos = Producto::all();
        $proveedor = Proveedor::findOrFail($id);
        $fichaproductos = FichaProducto::where('proveedor_id','=',$proveedor->id)->where('papelera','=','0')->get();
        return view('gestionsst.documentacion.fichasseguridad.fichasproveedor.show',['fichaproductos'=>$fichaproductos,'proveedor'=>$proveedor,'productos'=>$productos]);
    }

    public function create(){
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('gestionsst.documentacion.fichasseguridad.create',['productos'=>$productos,'proveedores'=>$proveedores]);
    }

    public function store(Request $request){
        $request->validate(
            [
                'producto' => 'required|not_in:"#"',
                'proveedor' => 'required|not_in:"#"',
                'descripcion_fs' => 'required',
                'fichadeseguridad'=> 'required|mimes:pdf',
            ],
        );

        $fichaseguridad = new FichaProducto();
        $fichaseguridad->producto_id = $request->producto;
        $fichaseguridad->proveedor_id = $request->proveedor;
        $fichaseguridad->descripcion = $request->descripcion_fs;

        //Documentos
        $ruta = public_path("fichasdeseguridad/");

        //Ficha de seguridad
        $fichadeseguridad = $request->file('fichadeseguridad');
        $nombre = "FS"." ".$fichaseguridad->producto->nombre_producto." ".$fichaseguridad->proveedor->nombre_proveedor." ".time().".".$fichadeseguridad->guessExtension();
        $fichaseguridad->fichadeseguridad = $nombre;
        $fichadeseguridad->move($ruta,$nombre);

        $fichaseguridad->save();
        return redirect()->route('fichasseguridad.show')->with('confirmacion','La ficha de seguridad ha sido almacenada exitosamente');
    }

    public function edit($id){
        $fichaseguridad = FichaProducto::findOrFail($id);
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('gestionsst.documentacion.fichasseguridad.edit',['fichaseguridad'=>$fichaseguridad,'productos'=>$productos,'proveedores'=>$proveedores]);
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                'producto' => 'required|not_in:"#"',
                'proveedor' => 'required|not_in:"#"',
                'descripcion_fs' => 'required',
                'fichadeseguridad'=> 'mimes:pdf',
            ],
        );

        $fichaseguridad = FichaProducto::findOrFail($id);
        $fichaseguridad->producto_id = $request->producto;
        $fichaseguridad->proveedor_id = $request->proveedor;
        $fichaseguridad->descripcion = $request->descripcion_fs;

        //Documentos
        $ruta = public_path("fichasdeseguridad/");

        //Ficha de seguridad
        if($fichadeseguridad = $request->file('fichadeseguridad')){
            $nombre = "FS"." ".$fichaseguridad->producto->nombre_producto." ".$fichaseguridad->proveedor->nombre_proveedor." ".time().".".$fichadeseguridad->guessExtension();
            $fichaseguridad->fichadeseguridad = $nombre;
            $fichadeseguridad->move($ruta,$nombre);
        }

        $fichaseguridad->update();
        return redirect()->route('fichasseguridad.show')->with('confirmacion','La ficha de seguridad ha sido actualizada exitosamente');

    }
}
