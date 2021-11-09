<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComitesController extends Controller
{
    public function index(){

        return view('comite.index_comite');
    }
}
