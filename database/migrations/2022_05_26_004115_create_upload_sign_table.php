<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadSignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_sign', function (Blueprint $table) {
            $table->unsignedBigInteger('upload_id'); 
            $table->foreign('upload_id')->references('id')->on('uploads')->onDelete('cascade'); 

            $table->unsignedBigInteger('sign_id'); 
            $table->foreign('sign_id')->references('id')->on('signs')->onDelete('cascade');

            $table->primary(['upload_id', 'sign_id']); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_sign');
    }
}
