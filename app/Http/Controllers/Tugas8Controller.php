<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tugas8Controller extends Controller
{
    public function index()
    {
        return view('pages.tugas8.index',[
            'title' => 'Tugas 8'
        ]);
    }
}
