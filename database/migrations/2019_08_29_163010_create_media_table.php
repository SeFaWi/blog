<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatemediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text("path");
            $table->unsignedBigInteger('post_id');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::table('media', function (Blueprint $table) {
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
