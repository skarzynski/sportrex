<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FillDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('order_statuses')
            ->insert([
                ['name' => 'Utworzone'],
                ['name' => 'Nieopłacone'],
                ['name' => 'W trakcie realizacji'],
                ['name' => 'W doręczeniu'],
                ['name' => 'Zakończone'],
                ['name' => 'Anulowane']
            ]);

        DB::table('products')
            ->insert([
                ['name' => 'Piłka do koszykówki','netto_price' => 15.10, 'tax_percent' => 23, 'amount' => 10, 'picture' => 'pilka_koszykowka.jpg' ],
                ['name' => 'Piłka do siatkówki','netto_price' => 23.50, 'tax_percent' => 15, 'amount' => 5, 'picture' => 'pilka_siatkowka.jpg' ],
                ['name' => 'Piłka to tenisa ziemnego','netto_price' => 10.11, 'tax_percent' => 10, 'amount' => 15, 'picture' => 'pilka_tenis.jpg' ],
                ['name' => 'Rakieta do tenisa ziemnego','netto_price' => 40.10, 'tax_percent' => 23, 'amount' => 20, 'picture' => 'rakieta_tenis.jpg' ]
            ]);

        DB::table('payments')->insert([  ['name' => 'Blik'],  ['name' => 'Przelew'], ['name' => 'Karta'] ]);
        DB::table('banks')->insert([  ['name' => 'GetinBank'],  ['name' => 'PKO'] ]);
        DB::table('deliveries')->insert([  ['name' => 'Kurier','price' => 12],  ['name' => 'Poczta','price' => 10],['name' => 'Paczkomat','price' => 8] ]);

        DB::table('complaintStatus')
            ->insert([
                'name' => 'Utworzone'
            ]);

        DB::table('categories')
            ->insert([
                ['name' => 'Koszykówka'],
                ['name' => 'Siatkówka'],
                ['name' => 'Tenis ziemny'],
                ['name' => 'Tenis stołowy'],
                ['name' => 'Rakiety'],
                ['name' => 'Piłki']
            ]);

        DB::table('category_product')
            ->insert([
                ['product_id' => 1, 'category_id' => 1],
                ['product_id' => 1, 'category_id' => 6],
                ['product_id' => 2, 'category_id' => 2],
                ['product_id' => 2, 'category_id' => 6],
                ['product_id' => 3, 'category_id' => 3],
                ['product_id' => 3, 'category_id' => 6],
                ['product_id' => 4, 'category_id' => 3],
                ['product_id' => 4, 'category_id' => 5],
                ['product_id' => 4, 'category_id' => 6]
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
