<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_wallets', function (Blueprint $table) {
            $table->id();
         
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams');

            // nick name
            $table->string('nick_name')->nullable($value = true);

            // indirizzo wallet
            $table->string('address')->nullable($value = true);
           
            // dividendo all'atto della prima vendita
            $table->float('royalty_mint')->nullable($value = true);
           

            // royalty del secondo mercato
            $table->float('royalty_scd_market')->nullable($value = true);
            


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_wallets');
    }
};
