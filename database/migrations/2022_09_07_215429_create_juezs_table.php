<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuezsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juezs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->string('apellido_paterno', 30);
            $table->string('apellido_materno', 30);
            $table->string('email');
            $table->string('telefono');
            $table->string('empresa');
            $table->string('puesto');
            $table->text('sintesis')->nullable();
            $table->string('fotografia');
            $table->foreignId('profesor_id')->constrained('profesors', 'id');
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
        Schema::dropIfExists('juezs');
    }
}
