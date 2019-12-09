<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Product';

    /**
     * Run the migrations.
     * @table Product
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('image', 45)->nullable();
            $table->string('title', 30)->nullable();
            $table->string('description', 255)->nullable();
            $table->integer('price')->nullable();
            $table->string('category', 30)->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamps();
            $table->integer('users_id')->unsigned();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
