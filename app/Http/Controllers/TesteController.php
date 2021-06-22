<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste($a, $b){
        // return view('site.teste', ['x' => $a, 'y' => $b]); //array associativo

        // return view('site.teste', compact('a', 'b')); //compact()

        return view('site.teste')->with('x', $a)->with('y', $b); //with()
    }
}
