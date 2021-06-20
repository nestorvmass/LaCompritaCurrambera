<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $table->integer('id_vendedor');
        // $table->string('nom_producto');
        // $table->integer('precio_producto');
        // $table->integer('stock_producto');
        // $table->text('desc_producto');
        // $table->String('imagen_producto');
        // $table->boolean('estado_producto');

        Producto::create([
            'id_vendedor'      =>  '3',
            'nom_producto'      =>  'Mochila',
            'precio_producto'     =>  90000,
            'stock_producto'  =>  2,
            'imagen_producto'      =>  'uploads/B3MyoG2MtzGK4BuE839jg5mp6mSYs9p6GbIvfOge.jpg',

            'desc_producto'  =>  "Mochila Wayu",
            'estado_producto'  =>  1,

        ]);
        Producto::create([
            'id_vendedor'      =>  '3',
            'nom_producto'      =>  'Mesedora Veloz',
            'precio_producto'     =>  100000,
            'stock_producto'  =>  2,
            'imagen_producto'      =>  'uploads/B3MyoG2MtzGK4BuE839jg5mp6mSYs9p6GbIvfOge.jpg',

            'desc_producto'  =>  "Mesedora para dormirse",
            'estado_producto'  =>  1,

        ]);
        Producto::create([
            'id_vendedor'      =>  '3',
            'nom_producto'      =>  'TV 32 Pulgadas',
            'precio_producto'     =>  190000,
            'stock_producto'  =>  3,
            'imagen_producto'      =>  'uploads/B3MyoG2MtzGK4BuE839jg5mp6mSYs9p6GbIvfOge.jpg',
            'desc_producto'  =>  "TV SAMSUNG",
            'estado_producto'  =>  1,

        ]);
        Producto::create([
            'id_vendedor'      =>  '3',
            'nom_producto'      =>  'Mochila Artesanal',
            'precio_producto'     =>  290000,
            'stock_producto'  =>  3,
            'imagen_producto'      =>  'uploads/YNp3Xt7TJd2AUqpTAYXbnzz9EqhEP6HJLYoE23uL.jpg',
            'desc_producto'  =>  "Mochila Artesanal",
            'estado_producto'  =>  1,

        ]);
        Producto::create([
            'id_vendedor'      =>  '3',
            'nom_producto'      =>  'Silla Gamer',
            'precio_producto'     =>  800000,
            'stock_producto'  =>  31,
            'imagen_producto'      =>  'uploads/Fdp9JyG1Mk0daXlLfRt4KNEgASkvAmt0APPsxz6K.jpg',
            'desc_producto'  =>  "Silla Gamer",
            'estado_producto'  =>  1,

        ]);

        // Producto::factory(4)->create();
    }
}