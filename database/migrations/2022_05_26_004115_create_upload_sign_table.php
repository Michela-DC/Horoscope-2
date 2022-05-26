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
            $table->unsignedBigInteger('upload_id'); //creo la colonna della foreign key
            $table->foreign('upload_id')->references('id')->on('uploads')->onDelete('cascade'); 
            //specifico che la colonna della foreign key sarà corrispondente alla colonna id della tabella posts
            //onDelete('cascade') quindi quando cancello un post, cancellando il suo id, cancello anche tutti i collegamente di quel post all'altra tabella perché intanto non esiste più

            $table->unsignedBigInteger('sign_id'); 
            $table->foreign('sign_id')->references('id')->on('signs')->onDelete('cascade');

            // devo specificare che nella tabella pivot la coppia post_id e tag_id deve essere la chiave primaria univoca, quindi non posso salvare coppie che hano gli stessi id
            $table->primary(['upload_id', 'sign_id']); //in questo modo creo la chiave primaria formata dalla coppia dei due valori specificati
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
