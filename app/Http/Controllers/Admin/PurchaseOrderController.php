<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $items = PurchaseOrder::latest()->get();
        return view('admin.pages.purchase-order.index', [
            'title' => 'Data Purchase Order',
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
        $products = Product::orderBy('name', 'ASC')->get();
        return view('admin.pages.purchase-order.create', [
            'title' => 'Create Purchase Order',
            'products' => $products
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
            'product_id' => ['required'],
            'qty' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],
            'total' => ['required', 'numeric']
        ]);

        // DB::beginTransaction();
        try {
            $data = request()->only(['product_id', 'qty']);
            $data['discount'] = (int) request('discount');
            $data['total'] = (int) request('total');
            PurchaseOrder::create($data);
            return redirect()->route('admin.purchase-orders.index')->with('success', 'Purchase Order berhasil disimpan.');
        } catch (\Throwable $th) {
            // throw $th;
            // DB::rollback();
            return redirect()->route('admin.purchase-orders.index')->with('error', 'Ada kesalahan sistem.');
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
        $item = PurchaseOrder::findOrFail($id);
        return view('admin.pages.purchase-order.edit', [
            'title' => 'Edit Purchase Order',
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
            'qty' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],
            'total' => ['required', 'numeric']
        ]);

        $item = PurchaseOrder::findOrFail($id);

        // DB::beginTransaction();
        try {
            $data['qty'] = request('qty');
            $data['discount'] = (int) request('discount');
            $data['total'] = (int) request('total');
            $item->update($data);
            return redirect()->route('admin.purchase-orders.index')->with('success', 'Purchase Order berhasil update.');
        } catch (\Throwable $th) {
            // throw $th;
            // DB::rollback();
            return redirect()->route('admin.purchase-orders.index')->with('error', 'Ada kesalahan sistem.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PurchaseOrder::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.purchase-orders.index')->with('success', 'Purchase Order berhasil dihapus.');
    }
}
