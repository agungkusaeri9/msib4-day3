<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function purchase_orders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }

}
