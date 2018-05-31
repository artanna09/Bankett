<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Attēlot galveno lapu
    public function index()
    {
        return view('index');
    }

    // Attēlot kļūdu par bildes izmēru
    public function imageError(){
        return view('imageError');
    }

}
