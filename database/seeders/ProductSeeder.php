<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            [
                'name' => 'Omega Seamaster',
                'brand' => 'OMEGA',
                'gender' => 'nam',
                'price' => 120000000,
                'image' => 'https://images.unsplash.com/photo-1622434641406-a158123450f9?auto=format&fit=crop&w=600&q=80',
            ],

            [
                'name' => 'Rolex Submariner',
                'brand' => 'ROLEX',
                'gender' => 'nam',
                'price' => 350000000,
                'image' => 'https://images.unsplash.com/photo-1522312346375-d1a52e2b99b3?auto=format&fit=crop&w=600&q=80',
            ],

            [
                'name' => 'Tissot PRX',
                'brand' => 'TISSOT',
                'gender' => 'nam',
                'price' => 15000000,
                'image' => 'https://images.unsplash.com/photo-1612817288484-6f916006741a?auto=format&fit=crop&w=600&q=80',
            ],

        ];

        for ($i = 1; $i <= 8; $i++) {

            foreach ($products as $product) {

                DB::table('products')->insert([

                    'name' => $product['name'].' '.$i,

                    'brand' => $product['brand'],

                    'gender' => $product['gender'],

                    'price' => $product['price'],

                    'image' => $product['image'],

                    'created_at' => now(),

                    'updated_at' => now(),

                ]);

            }

        }
    }
}