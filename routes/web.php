<?php

use App\Models\Comites\ActaNombramiento;
use App\Models\Comites\ActaReunion;
use App\Models\Comites\ActaVotacion;
use App\Models\Comites\MiembroComite;
use App\Models\Comites\PostulanteBE;
use App\Models\Comites\QuejaLaboral;
use App\Models\GestionSST\DocumentosEmpresa;
use App\Models\GestionSST\FichaProducto;
use App\Models\GestionSST\PersonalSST;
use App\Models\GestionSST\Proveedor;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas - funciones administrador
Route::middleware(['role:1'])->group(function () {
    Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [App\Http\Controllers\UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios/store', [App\Http\Controllers\UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/edit/{id}', [App\Http\Controllers\UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/update/{id}', [App\Http\Controllers\UsuariosController::class, 'update'])->name('usuarios.update');
    Route::put('/usuarios/activar/{id}', [App\Http\Controllers\UsuariosController::class, 'activar'])->name('usuarios.activar');
    Route::get('/usuarios/delete/{id}', function($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios')->with('confirmacion','El usuario ha sido eliminado exitosamente');;
    })->name('usuarios.delete');
});

//Rutas del encargado de SST
Route::middleware(['role:1,2'])->group(function () {
    //Rutas Personal SST
    Route::get('/gestionsst/personal/', [App\Http\Controllers\GestionSST\PersonalController::class, 'index'])->name('personal.show');
    Route::get('/gestionsst/personal/crear', [App\Http\Controllers\GestionSST\PersonalController::class, 'create'])->name('personal.create');
    Route::post('/gestionsst/personal/guardar', [App\Http\Controllers\GestionSST\PersonalController::class, 'store'])->name('personal.store');
    Route::get('/gestionsst/personal/editar/{id}', [App\Http\Controllers\GestionSST\PersonalController::class, 'edit'])->name('personal.edit');
    Route::put('/gestionsst/personal/actualizar/{id}', [App\Http\Controllers\GestionSST\PersonalController::class, 'update'])->name('personal.update');
    Route::get('/gestionsst/personal/eliminar/{id}', function($id){
        $empleado = PersonalSST::findOrFail($id);
        $empleado->delete();
        return redirect('/gestionsst/personal/')->with('confirmacion','El empleado ha sido eliminado exitosamente');;
    })->name('personal.delete');

    //Rutas Informacion Empresa
    Route::get('/gestionsst/empresa/', [App\Http\Controllers\GestionSST\EmpresaController::class, 'index'])->name('empresa.show');
    Route::get('/gestionsst/empresa/crear', [App\Http\Controllers\GestionSST\EmpresaController::class, 'create'])->name('empresa.create');
    Route::post('/gestionsst/empresa/guardar', [App\Http\Controllers\GestionSST\EmpresaController::class, 'store'])->name('empresa.store');
    Route::get('/gestionsst/empresa/editar/{id}', [App\Http\Controllers\GestionSST\EmpresaController::class, 'edit'])->name('empresa.edit');
    Route::put('/gestionsst/empresa/actualizar/{id}', [App\Http\Controllers\GestionSST\EmpresaController::class, 'update'])->name('empresa.update');

    //Rutas Aliados Estrategicos
    Route::get('/gestionsst/aliados/', [App\Http\Controllers\GestionSST\AliadosController::class, 'index'])->name('aliados.show');
    Route::get('/gestionsst/aliados/crear', [App\Http\Controllers\GestionSST\AliadosController::class, 'create'])->name('aliados.create');
    Route::post('/gestionsst/aliados/guardar', [App\Http\Controllers\GestionSST\AliadosController::class, 'store'])->name('aliados.store');
    Route::get('/gestionsst/aliados/editar/{id}', [App\Http\Controllers\GestionSST\AliadosController::class, 'edit'])->name('aliados.edit');
    Route::put('/gestionsst/aliados/actualizar/{id}', [App\Http\Controllers\GestionSST\AliadosController::class, 'update'])->name('aliados.update');
    Route::get('/gestionsst/aliados/eliminar/{id}', function($id){
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->activo = 0;
        $proveedor->save();
        return redirect('/gestionsst/aliados/')->with('confirmacion','El proveedor ha sido eliminado');;
    })->name('aliados.delete');

    //Rutas Fichas de Seguridad
    Route::get('/gestionsst/fichasseguridad/', [App\Http\Controllers\GestionSST\FichasSeguridadController::class, 'index'])->name('fichasseguridad.show');
    Route::get('/gestionsst/fichasseguridad/crear', [App\Http\Controllers\GestionSST\FichasSeguridadController::class, 'create'])->name('fichasseguridad.create');
    Route::post('/gestionsst/fichasseguridad/guardar', [App\Http\Controllers\GestionSST\FichasSeguridadController::class, 'store'])->name('fichasseguridad.store');
    Route::get('/gestionsst/fichasseguridad/editar/{id}', [App\Http\Controllers\GestionSST\FichasSeguridadController::class, 'edit'])->name('fichasseguridad.edit');
    Route::put('/gestionsst/fichasseguridad/actualizar/{id}', [App\Http\Controllers\GestionSST\FichasSeguridadController::class, 'update'])->name('fichasseguridad.update');
    Route::get('/gestionsst/fichasseguridad/eliminar/{id}', function($id){
        $fichaseguridad = FichaProducto::findOrFail($id);
        $fichaseguridad->papelera = 1;
        $fichaseguridad->save();
        return redirect('/gestionsst/fichasseguridad/')->with('confirmacion','La ficha de seguridad ha sido eliminada');;
    })->name('fichasseguridad.delete');

    //Rutas Fichas de Seguridad por Proveedor
    Route::get('/gestionsst/fichasproveedor/{id}', [App\Http\Controllers\GestionSST\FichasSeguridadController::class, 'show'])->name('fichasproveedor.show');

    //Rutas Documentos Empresa
    Route::get('/gestionsst/documentos/', [App\Http\Controllers\GestionSST\DocumentosEmpresaController::class, 'index'])->name('documentos.show');
    Route::get('/gestionsst/documentos/crear', [App\Http\Controllers\GestionSST\DocumentosEmpresaController::class, 'create'])->name('documentos.create');
    Route::post('/gestionsst/documentos/guardar', [App\Http\Controllers\GestionSST\DocumentosEmpresaController::class, 'store'])->name('documentos.store');
    Route::get('/gestionsst/documentos/editar/{id}', [App\Http\Controllers\GestionSST\DocumentosEmpresaController::class, 'edit'])->name('documentos.edit');
    Route::put('/gestionsst/documentos/actualizar/{id}', [App\Http\Controllers\GestionSST\DocumentosEmpresaController::class, 'update'])->name('documentos.update');
    Route::get('/gestionsst/documentos/eliminar/{id}', function($id){
        $documento = DocumentosEmpresa::findOrFail($id);
        $documento->papelera = 1;
        $documento->save();
        return redirect('/gestionsst/documentos/')->with('confirmacion','El documento ha sido eliminado');
    })->name('documentos.delete');
    Route::get('/gestionsst/documentos/descargar/{id}', [App\Http\Controllers\GestionSST\DocumentosEmpresaController::class, 'download'])->name('documentos.download');

});

//Rutas del comite
Route::middleware(['role:1,3,4,5'])->group(function () {
    Route::get('/comite', [App\Http\Controllers\ComitesController::class, 'index'])->name('comite.index_comite');

    //Rutas Miembros Comite
    Route::get('/comite/integrantes/', [App\Http\Controllers\Comites\MiembrosComiteController::class, 'index'])->name('miembroscomite.show');
    Route::get('/comite/integrantes/crear', [App\Http\Controllers\Comites\MiembrosComiteController::class, 'create'])->name('miembroscomite.create');
    Route::post('/comite/integrantes/guardar', [App\Http\Controllers\Comites\MiembrosComiteController::class, 'store'])->name('miembroscomite.store');
    Route::get('/comite/integrantes/editar/{id}', [App\Http\Controllers\Comites\MiembrosComiteController::class, 'edit'])->name('miembroscomite.edit');
    Route::put('/comite/integrantes/actualizar/{id}', [App\Http\Controllers\Comites\MiembrosComiteController::class, 'update'])->name('miembroscomite.update');
    Route::get('/comite/integrantes/eliminar/{id}', function($id){
        $miembrocomite = MiembroComite::findOrFail($id);
        $miembrocomite->delete();
        return redirect()->route('miembroscomite.show')->with('confirmacion','El miembro del comité ha sido eliminado');
            })->name('miembroscomite.delete');

    //Rutas Actas de Reuniones
    Route::get('/comite/actasreuniones/', [App\Http\Controllers\Comites\ActasReunionesController::class, 'index'])->name('actasreuniones.show');
    Route::get('/comite/actasreuniones/crear', [App\Http\Controllers\Comites\ActasReunionesController::class, 'create'])->name('actasreuniones.create');
    Route::post('/comite/actasreuniones/guardar', [App\Http\Controllers\Comites\ActasReunionesController::class, 'store'])->name('actasreuniones.store');
    Route::get('/comite/actasreuniones/editar/{id}', [App\Http\Controllers\Comites\ActasReunionesController::class, 'edit'])->name('actasreuniones.edit');
    Route::put('/comite/actasreuniones/actualizar/{id}', [App\Http\Controllers\Comites\ActasReunionesController::class, 'update'])->name('actasreuniones.update');
    Route::get('/comite/actasreuniones/eliminar/{id}', function($id){
        $actareunion = ActaReunion::findOrFail($id);
        $actareunion->papelera = 1;
        $actareunion->save();
        return redirect()->route('actasreuniones.show')->with('confirmacion','El registro ha sido eliminado');
            })->name('actasreuniones.delete');

    //Rutas Actas de Nombramientos
    Route::get('/comite/actasnombramiento/', [App\Http\Controllers\Comites\ActasNombramientosController::class, 'index'])->name('actasnombramiento.show');
    Route::get('/comite/actasnombramiento/crear', [App\Http\Controllers\Comites\ActasNombramientosController::class, 'create'])->name('actasnombramiento.create');
    Route::post('/comite/actasnombramiento/guardar', [App\Http\Controllers\Comites\ActasNombramientosController::class, 'store'])->name('actasnombramiento.store');
    Route::get('/comite/actasnombramiento/editar/{id}', [App\Http\Controllers\Comites\ActasNombramientosController::class, 'edit'])->name('actasnombramiento.edit');
    Route::put('/comite/actasnombramiento/actualizar/{id}', [App\Http\Controllers\Comites\ActasNombramientosController::class, 'update'])->name('actasnombramiento.update');
    Route::get('/comite/actasnombramiento/eliminar/{id}', function($id){
        $actanombramiento = ActaNombramiento::findOrFail($id);
        $actanombramiento->papelera = 1;
        $actanombramiento->save();
        return redirect()->route('actasnombramiento.show')->with('confirmacion','El registro ha sido eliminado');
            })->name('actasnombramiento.delete');
});

//Rutas Actas de Votacion
Route::middleware(['role:1,3,4'])->group(function () {
    Route::get('/comite/actasvotacion/', [App\Http\Controllers\Comites\ActasVotacionController::class, 'index'])->name('actasvotacion.show');
    Route::get('/comite/actasvotacion/crear', [App\Http\Controllers\Comites\ActasVotacionController::class, 'create'])->name('actasvotacion.create');
    Route::post('/comite/actasvotacion/guardar', [App\Http\Controllers\Comites\ActasVotacionController::class, 'store'])->name('actasvotacion.store');
    Route::get('/comite/actasvotacion/editar/{id}', [App\Http\Controllers\Comites\ActasVotacionController::class, 'edit'])->name('actasvotacion.edit');
    Route::put('/comite/actasvotacion/actualizar/{id}', [App\Http\Controllers\Comites\ActasVotacionController::class, 'update'])->name('actasvotacion.update');
    Route::get('/comite/actasvotacion/eliminar/{id}', function($id){
        $actavotacion = ActaVotacion::findOrFail($id);
        $actavotacion->papelera = 1;
        $actavotacion->save();
        return redirect()->route('actasvotacion.show')->with('confirmacion','El registro ha sido eliminado');
            })->name('actasvotacion.delete');
});

//  Rutas Postulante Brigada de Emergencia
Route::middleware(['role:1,5'])->group(function () {
    Route::get('/comite/be/postulantes', [App\Http\Controllers\Comites\PostulantesBEController::class, 'index'])->name('postulantesbe.show');
    Route::get('/comite/be/postulantes/crear', [App\Http\Controllers\Comites\PostulantesBEController::class, 'create'])->name('postulantesbe.create');
    Route::post('/comite/be/postulantes/guardar', [App\Http\Controllers\Comites\PostulantesBEController::class, 'store'])->name('postulantesbe.store');
    Route::get('/comite/be/postulantes/editar/{id}', [App\Http\Controllers\Comites\PostulantesBEController::class, 'edit'])->name('postulantesbe.edit');
    Route::put('/comite/be/postulantes/actualizar/{id}', [App\Http\Controllers\Comites\PostulantesBEController::class, 'update'])->name('postulantesbe.update');
    Route::get('/comite/be/postulantes/eliminar/{id}', function($id){
        $postulantebe = PostulanteBE::findOrFail($id);
        $postulantebe->delete();
        return redirect()->route('postulantesbe.show')->with('confirmacion','El registro ha sido eliminado');
    })->name('postulantesbe.delete');
});

//Rutas Quejas Laborales
Route::middleware(['role:1,3'])->group(function () {
    Route::get('/comite/cocola/quejaslaborales', [App\Http\Controllers\Comites\QuejasLaboralesController::class, 'index'])->name('quejaslaborales.show');
    Route::get('/comite/cocola/quejaslaborales/crear', [App\Http\Controllers\Comites\QuejasLaboralesController::class, 'create'])->name('quejaslaborales.create');
    Route::post('/comite/cocola/quejaslaborales/guardar', [App\Http\Controllers\Comites\QuejasLaboralesController::class, 'store'])->name('quejaslaborales.store');
    Route::get('/comite/cocola/quejaslaborales/editar/{id}', [App\Http\Controllers\Comites\QuejasLaboralesController::class, 'edit'])->name('quejaslaborales.edit');
    Route::put('/comite/cocola/quejaslaborales/actualizar/{id}', [App\Http\Controllers\Comites\QuejasLaboralesController::class, 'update'])->name('quejaslaborales.update');
    Route::get('/comite/cocola/quejaslaborales/eliminar/{id}', function($id){
        $quejalaboral = QuejaLaboral::findOrFail($id);
        $quejalaboral->papelera = 1;
        $quejalaboral->save();
        return redirect()->route('quejaslaborales.show')->with('confirmacion','El registro ha sido eliminado');
    })->name('quejaslaborales.delete');
});




