<?php

namespace App\Http\Controllers\GestionSST;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AliadosController extends Controller
{
    public function index(){
        return view('gestionsst.documentacion.aliados.show');
    }

    public function create(){
        return view('gestionsst.documentacion.aliados.create');
    }

    public function store(){

    }

    public function edit(){
        return view('gestionsst.documentacion.aliados.edit');
    }

    public function update(){

    }
}
