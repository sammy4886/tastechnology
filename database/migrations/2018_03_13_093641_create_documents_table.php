<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table)
        {
            $table->engine= 'InnoDB';
            $table->increments('id');
            $table->string('slug', 100)->unique();
            $table->string('title', 100);
            $table->string('path');
            $table->string('file_name', 100);
            $table->integer('size');
            $table->string('extension');
            $table->enum('view', array('Downloads'));
            $table->integer('count')->default(0);
            $table->tinyInteger('is_published')->default(false);
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
        Schema::drop('documents');
    }
}
