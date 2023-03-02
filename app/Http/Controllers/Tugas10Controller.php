<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Tugas10Controller extends Controller
{
    public function index()
    {
        return view('pages.tugas10.index',[
            'title' => 'Tugas 10',
            'items' => Product::orderBy('name','ASC')->get()
        ]);
    }

    public function excel()
    {
        return Excel::download(new ProductExport, 'product.xlsx');
    }
}
