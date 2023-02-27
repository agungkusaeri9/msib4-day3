<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Tugas7Controller extends Controller
{

    public function data()
    {
        if(request()->ajax())
        {
            $data = Product::query();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($model){
                        $action = "-";
                        return $action;
                    })
                    ->editColumn('price', function($model){
                        return 'Rp. ' . number_format($model->price);
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }


    public function index()
    {
        return view('pages.tugas7.index',[
            'title' => 'Tugas 7'
        ]);
    }
}
