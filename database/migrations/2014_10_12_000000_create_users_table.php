<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('nickname', 45)->nullable();
            $table->string('firstname', 45)->nullable();
            $table->string('phone', 15)->nullable();
            $table->date('date')->nullable();
            $table->string('street', 45)->nullable();
            $table->string('postal', 5)->nullable();
            $table->string('town', 45)->nullable();
            $table->string('country', 45)->nullable();
            $table->timestamps();
            $table->integer('Group_id')->default(1);
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
