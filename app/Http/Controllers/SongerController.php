<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongerController extends Controller
{
    public function display($name){

        $data = Song::where('id', $name)->all();
        return view('songer')->with('');
    }
}
