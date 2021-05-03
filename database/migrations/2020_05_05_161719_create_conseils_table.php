<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConseilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conseils', function (Blueprint $table) {
            $table->id();
            $table->string('conseil');
            $table->bigInteger('dossier_medical')->insigned();
            $table->boolean('isDeleted');
            $table->boolean('isRead');
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
        Schema::dropIfExists('conseils');
    }
}
