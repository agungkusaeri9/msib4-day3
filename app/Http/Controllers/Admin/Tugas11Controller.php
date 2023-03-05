<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Tugas11Controller extends Controller
{
    public function index()
    {
        return view('admin.pages.tugas11.reporting',[
            'products' => Product::orderBy('name','ASC')->get()
        ]);
    }

    public function purchaseOrderJson()
    {

        if (request()->ajax()) {
            $query = DB::table('purchase_orders')
                ->select('products.name', DB::RAW('count(purchase_orders.id) as jumlah'))
                ->join('products', 'products.id', '=', 'purchase_orders.product_id', 'right')
                ->groupBy('products.id')
                ->get();


            $data = [
                $query->pluck('name'),
                $query->pluck('jumlah')
            ];
            return response()->json($data);
        }
    }
}
