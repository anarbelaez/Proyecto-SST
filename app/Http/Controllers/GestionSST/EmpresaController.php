<?php

namespace App\Http\Controllers\GestionSST;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(){
        return view('gestionsst.documentacion.empresa.show');
    }

    public function create(){
        return view('gestionsst.documentacion.empresa.create');
    }

    public function store(){

    }

    public function edit(){
        return view('gestionsst.documentacion.empresa.edit');
    }

    public function update(){

    }
}
