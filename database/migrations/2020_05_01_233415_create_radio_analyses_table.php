<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadioAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radio_analyses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dossier_medical')->unsigned();
            $table->string('titre');
            $table->string('description')->nullable();
            $table->boolean('etat');
            $table->boolean('type');
            $table->boolean('isDeleted');
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
        Schema::dropIfExists('radio_analyses');
    }
}
