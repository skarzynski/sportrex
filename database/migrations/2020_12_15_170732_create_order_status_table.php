<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderStatus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        DB::table('orderStatus')
            ->insert([
                ['name' => 'Utworzone'],
                ['name' => 'Nieopłacone'],
                ['name' => 'W trakcie realizacji'],
                ['name' => 'W doręczeniu'],
                ['name' => 'Zakończone'],
                ['name' => 'Anulowane']
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderStatus');
    }
}
