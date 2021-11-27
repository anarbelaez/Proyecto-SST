<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Mail;
use App\Mail\PruebaMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $usuarios = User::all();
        return view('administrador.usuarios.index',['usuarios'=>$usuarios]);
    }

    public function create(){

        $roles = Role::all();
        return view('administrador.usuarios.create',['roles'=>$roles]);
    }

    public function store(Request $request){

        $request->validate(
            [
                'nombre' => 'required',
                'apellido' => 'required',
                'cedula' => 'required|numeric|unique:users,cedula',
                'telefono' => 'numeric',
                'celular' => 'numeric',
                'direccion' => 'required',
                'correo' => 'required|email',
                'role' => 'required|in:1,2,3,4,5'
            ],
        );

        $usuario = new User;
        $usuario->name = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->cedula = $request->cedula;
        $usuario->telefono = $request->telefono;
        $usuario->celular = $request->celular;
        $usuario->email = $request->correo;
        $usuario->role_id = $request->role;
        $usuario->direccion = $request->direccion;

        $clave = Str::random(10);
        $clave_hash = Hash::make($clave);
        $usuario->password = $clave_hash;
        $usuario->save();

        Mail::to('pruebasproyectosst@gmail.com')->send(new PruebaMail($usuario->name,$clave));

        return redirect()->route('usuarios.index')->with('confirmacion','El usuario ha sido creado exitosamente');

    }

    public function edit($id){

        $usuario = User::findOrFail($id);
        $roles = Role::all();
        return view('administrador.usuarios.edit',['usuario'=>$usuario,'roles'=>$roles]);

    }

    public function update(Request $request, $id){

        $request->validate(
            [
                'nombre' => 'required',
                'apellido' => 'required',
                'cedula' => 'required|numeric',
                'correo' => 'required|email',
                'role' => 'required|in:1,2,3,4,5'
            ],
            [
                'nombre.required' => 'El nombre del usuario es requerido.',
                'apellido.required' => 'El apellido del usuario es requerido.',
                'cedula.required' => 'Ingrese el número de documento del usuario.',
                'correo.required' => 'Debe ingresar una dirección de correo electrónico válida.',
                'role.in' => 'Seleccione el rol del usuario.'
            ]
        );

        $usuario = User::findOrFail($id);
        $usuario->name = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->cedula = $request->cedula;
        $usuario->telefono = $request->telefono;
        $usuario->celular = $request->celular;
        $usuario->email = $request->correo;
        $usuario->role_id = $request->role;
        $usuario->direccion = $request->direccion;

        $usuario->update();
        return redirect('/usuarios')->with('confirmacion','El usuario ha sido actualizado exitosamente');
    }

    public function activar($id) {

        //Esta funcion habilita o inhabilita al usuario, segun sea el caso
        $usuario = User::findOrFail($id);
        if ($usuario->estado === 1) {
            $usuario->estado = 0; //Lo inhabilita
            $estado = 'deshabilitado';
        } else {
            $usuario->estado = 1; //Lo habilita
            $estado = 'habilitado';
        }

        $usuario->update();
        return redirect('/usuarios')->with('confirmacion','El usuario ha sido ' . $estado . ' exitosamente');
    }

    /*     public function destroy($id) {

        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect('/usuarios');

    } */
}
