<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
//            $table->string('slug', 100)->unique();
            $table->string('title', 100);
            $table->string('author', 100);
            $table->string('quote', 100);
            $table->text('type')->nullable();
            $table->text('content')->nullable();
//        $table->enum('view', array('PopUp News','Notice'));
            $table->enum('view', array('PopUp News','Notice'));
            $table->boolean('is_published')->default(false);
            $table->boolean('is_primary')->default(false);
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
        Schema::dropIfExists('notices');
    }
}
