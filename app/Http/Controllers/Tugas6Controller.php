<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tugas6Controller extends Controller
{
    public function index()
    {
        return view('pages.tugas6.index');
    }

    public function jqueryui()
    {
        return view('pages.tugas6.jqueryui');
    }

    public function leafletjs()
    {
        return view('pages.tugas6.leafletjs');
    }
}
