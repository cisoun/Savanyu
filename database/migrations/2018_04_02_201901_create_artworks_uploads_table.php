<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtworksUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artworks_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('artwork_id')->unsigned();
            $table->integer('upload_id')->unsigned();
            $table->integer('index')->unsigned();
            
            $table->foreign('artwork_id')
                  ->references('id')->on('artworks');
                  
            $table->foreign('upload_id')
                  ->references('id')->on('uploads')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artworks_uploads');
    }
}
