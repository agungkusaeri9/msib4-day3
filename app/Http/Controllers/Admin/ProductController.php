<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::latest()->get();
        return view('admin.pages.product.index',[
            'title' => 'Data product',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.product.create',[
            'title' => 'Create Product',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required'],
            'code' => ['required','unique:products,code'],
            'price' => ['required','numeric']
        ]);

        $data = request()->all();
        Product::create($data);
        return redirect()->route('admin.products.index')->with('success','Product berhasil disimpan.');
    }


    public function show($id)
    {
        if(request()->ajax()){
            $product = Product::find($id);
            if($product)
            {
                return response()->json($product);
            }else{
                return response()->json([]);
            }
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::findOrFail($id);
        return view('admin.pages.product.edit',[
            'title' => 'Edit product',
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => ['required'],
            'code' => ['required',Rule::unique('products','code')->ignore($id)],
            'price' => ['required','numeric']
        ]);

        $item = Product::findOrFail($id);
        $data = request()->all();
        $item->update($data);
        return redirect()->route('admin.products.index')->with('success','product berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.products.index')->with('success','product berhasil dihapus.');
    }
}
