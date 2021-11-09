<?php

use App\Models\GestionSST\PersonalSST;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\support\Facades\Auth;
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
    Route::get('/gestionsst', [App\Http\Controllers\GestionSSTController::class, 'index'])->name('gestionsst.index_sst');

    //Rutas Personal SST
    Route::get('/gestionsst/personal/', [App\Http\Controllers\GestionSST\PersonalController::class, 'index'])->name('personal.show');
    Route::get('/gestionsst/personal/crear', [App\Http\Controllers\GestionSST\PersonalController::class, 'create'])->name('personal.create');
    Route::post('/gestionsst/personal/guardar', [App\Http\Controllers\GestionSST\PersonalController::class, 'store'])->name('personal.store');
    Route::get('/gestionsst/personal/editar', [App\Http\Controllers\GestionSST\PersonalController::class, 'edit'])->name('personal.edit');

    Route::get('/personalsst/{id}/documento', function($id) {
        $personalsst = PersonalSST::find($id);
        foreach ($personalsst->documentos as $documento) {
            return $documento->ruta_archivo;
        }
    });


    //Rutas Informacion Empresa
    Route::get('/gestionsst/empresa/', [App\Http\Controllers\GestionSST\EmpresaController::class, 'index'])->name('empresa.show');
    Route::get('/gestionsst/empresa/crear', [App\Http\Controllers\GestionSST\EmpresaController::class, 'create'])->name('empresa.create');
    Route::get('/gestionsst/empresa/editar', [App\Http\Controllers\GestionSST\EmpresaController::class, 'edit'])->name('empresa.edit');

    //Rutas Aliados Estrategicos
    Route::get('/gestionsst/aliados/', [App\Http\Controllers\GestionSST\AliadosController::class, 'index'])->name('aliados.show');
    Route::get('/gestionsst/aliados/crear', [App\Http\Controllers\GestionSST\AliadosController::class, 'create'])->name('aliados.create');
    Route::get('/gestionsst/aliados/editar', [App\Http\Controllers\GestionSST\AliadosController::class, 'edit'])->name('aliados.edit');

    //Rutas Documentos Empresa
    Route::get('/gestionsst/documentos/', [App\Http\Controllers\GestionSST\DocumentosEmpresaController::class, 'index'])->name('documentos.show');
    Route::get('/gestionsst/documentos/crear', [App\Http\Controllers\GestionSST\DocumentosEmpresaController::class, 'create'])->name('documentos.create');
    Route::get('/gestionsst/documentos/editar', [App\Http\Controllers\GestionSST\DocumentosEmpresaController::class, 'edit'])->name('documentos.edit');

});

//Rutas del comite

Route::middleware(['role:3,4,5'])->group(function () {
    Route::get('/comite', [App\Http\Controllers\ComitesController::class, 'index'])->name('comite.index_comite');
});

