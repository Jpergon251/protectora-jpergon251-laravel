<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto__mascotas', function (Blueprint $table) {
            $table->id();

            // Atributos entidad foto_mascota
            $table->string("rutafoto", 100);
            $table->foreignId('mascota_id');
            $table->foreign('mascota_id')->references('id')->on('mascotas');

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
        Schema::dropIfExists('foto__mascotas');
    }
};
