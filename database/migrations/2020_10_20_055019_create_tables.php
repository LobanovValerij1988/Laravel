<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   
        public function up()
    {
        Schema::create('Topics',function(Blueprint $table){
            $table->increments('id');
            $table->string('topicname',128)->unique();
            $table->timestamps();       //создание полей создания и изменения БД
        });

 

        Schema::create('Blocks',function(Blueprint $table){
            $table->increments('id');
            $table->integer('topicid')->unsigned();
            $table->foreign('topicid')->references('id')->on('Topics')->onDelete('cascade');        //связь таблиц один ко многим
            $table->string('title',128);
            $table->longText('content')->nullable();
            $table->string('iPath',255)->nullable();
            $table->timestamps();       //создание полей создания и изменения БД
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Topics');
		Schema::drop('Blocks');
    }
}

