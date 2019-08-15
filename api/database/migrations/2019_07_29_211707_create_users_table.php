<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users'))
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('role_id')->unsigned()->index();
                $table->bigInteger('doctor')->unsigned()->index()->nullable();
                $table->string('name');
                $table->string('surname');
                $table->date('birthday');
                $table->string('email')->unique()->index();
                $table->string('password');
                $table->string('reset_password_token')->nullable();
                $table->string('address');
                $table->string('city');
                $table->string('state');
                $table->string('postal');
                $table->string('phone_number');
                $table->timestamps();

                $table->foreign('role_id')
                    ->references('id')
                    ->on('roles')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('doctor')
                    ->references('id')
                    ->on('users')
                    ->onDelete('set null')
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
        Schema::dropIfExists('users');
    }
}
