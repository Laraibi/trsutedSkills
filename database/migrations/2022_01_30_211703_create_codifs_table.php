<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codifs', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('prospect_id');
            $table->integer('prestation_id');
            $table->integer('prestation_id_2')->nullable();

            $table->enum('joining',['1','0','Rep','Trc','FNU']); // 1=> oui, 0=>Refus , Rep=> Répondeur , TRC => to Recall , FNU => Faux Numéro
            $table->integer('attempts');
            $table->integer('size')->nullable();
            $table->bigInteger('capital')->nullable();
            $table->text('responseCutomer')->nullable();
            $table->string('customerContactName')->nullable();
            $table->string('customerContactPoste')->nullable();
            $table->string('customerContactTel')->nullable();
            
            
            $table->string('porpale')->nullable();
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
        Schema::dropIfExists('codifs');
    }
}
