<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Product A',
            'code' => 'P001',
            'price' => 200000
        ]);

        Product::create([
            'name' => 'Product B',
            'code' => 'P002',
            'price' => 100000
        ]);

        Product::create([
            'name' => 'Product C',
            'code' => 'P003',
            'price' => 220000
        ]);

        Product::create([
            'name' => 'Product D',
            'code' => 'P004',
            'price' => 200000
        ]);

        Product::create([
            'name' => 'Product E',
            'code' => 'P005',
            'price' => 320000
        ]);

        // factory(Product::class,300)->create();
    }
}
