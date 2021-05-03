<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdennanceMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordennance_medicals', function (Blueprint $table) {
            $table->id();
            // $table->string('medicament');
            // $table->text('ModeEmploi');
            $table->text('medicamentsModeEmploi');
            $table->bigInteger('dossier_medical')->insigned();
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
        Schema::dropIfExists('ordennance_medicals');
    }
}
