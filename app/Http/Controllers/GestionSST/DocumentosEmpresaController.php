<?php

namespace App\Http\Controllers\GestionSST;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentosEmpresaController extends Controller
{
    public function index(){
        return view('gestionsst.documentacion.documentos.show');
    }

    public function create(){
        return view('gestionsst.documentacion.documentos.create');
    }

    public function store(){

    }

    public function edit(){
        return view('gestionsst.documentacion.documentos.edit');
    }

    public function update(){

    }
}
