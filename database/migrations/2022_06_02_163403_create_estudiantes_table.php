<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nombre', 30);
            $table->string('apellido_paterno', 30);
            $table->string('apellido_materno', 30);
            $table->string('fecha_nacimiento', 20);
            $table->string('sexo');
            $table->string('codigo');
            $table->string('nrc');

            $table->string("pitch", 100)->nullable();
            $table->string("plan_negocios", 100)->nullable();
            $table->string("embajador", 2)->default('0')->nullable();
            $table->foreignId('profesor_id')->nullable()->constrained('profesors', 'id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
