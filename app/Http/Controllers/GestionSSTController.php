<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionSSTController extends Controller
{
    public function index(){
        return view('gestionsst.index_sst');
    }
}
