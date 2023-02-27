<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tugas5Controller extends Controller
{
    public function index()
    {
        return view('pages.tugas5.index');
    }

    public function bootstrap()
    {
        return view('pages.tugas5.bootstrap');
    }

    public function semantic()
    {
        return view('pages.tugas5.semantic');
    }
}
