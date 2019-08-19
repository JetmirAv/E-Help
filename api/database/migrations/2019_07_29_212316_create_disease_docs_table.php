<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseaseDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('receipts'))
            Schema::create('receipts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('doctor_id')->unsigned()->index()->nullable();
                $table->bigInteger('patient_id')->unsigned()->index()->nullable();
                $table->bigInteger('disease_id')->unsigned()->index()->nullable();
                $table->longText('content');
                $table->timestamps();
                
                $table->foreign('doctor_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreign('patient_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreign('disease_id')
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
        Schema::dropIfExists('receipts');
    }
}
