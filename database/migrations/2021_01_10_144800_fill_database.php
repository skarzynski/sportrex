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
                ['name' => 'produkt1','netto_price' => 15.10, 'tax_percent' => 23, 'amount' => 10 ],
                ['name' => 'produkt2','netto_price' => 23.50, 'tax_percent' => 15, 'amount' => 5 ],
                ['name' => 'produkt3','netto_price' => 10.11, 'tax_percent' => 10, 'amount' => 15 ],
                ['name' => 'produkt4','netto_price' => 40.10, 'tax_percent' => 23, 'amount' => 20 ]
            ]);

        DB::table('payments')->insert([  ['name' => 'Blik'],  ['name' => 'Przelew'], ['name' => 'Karta'] ]);
        DB::table('banks')->insert([  ['name' => 'GetinBank'],  ['name' => 'PKO'] ]);
        DB::table('deliveries')->insert([  ['name' => 'Kurier','price' => 12],  ['name' => 'Poczta','price' => 10],['name' => 'Paczkomat','price' => 8] ]);

        DB::table('complaintStatus')
            ->insert([
                'name' => 'Utworzone'
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
