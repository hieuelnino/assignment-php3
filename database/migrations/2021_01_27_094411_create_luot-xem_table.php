<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuotXemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luot-xem',function (Blueprint $table){
           $table->bigIncrements('id');
           $table->foreignId('bai-viet_id')->constrained('bai-viet');
           $table->timestamps();
           $table->bigInteger('luot-xem');
        });
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
