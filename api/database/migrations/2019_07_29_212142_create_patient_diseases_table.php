<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_diseases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patient')->unsigned()->index();
            $table->bigInteger('disease')->unsigned()->index();
            $table->timestamps();

            $table->foreign('patient')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('disease')
                ->references('id')
                ->on('diseases')
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
        Schema::dropIfExists('patient_diseases');
    }
}
