<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiVietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai-viet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 191);
            $table->foreignId('danh-muc_id')
                  ->constrained('danh-muc')
                  ->onDelete('cascade');
            $table->text('content');
            $table->string('image',191)->default('default.jpg');
            $table->text('short_desc');
            $table->foreignId('author_id')
                  ->constrained('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
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
        //
    }
}
