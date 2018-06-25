<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('typedocument_id')->unsigned();
            $table->datetime('daterec');
            $table->datetime('datedocument');
            $table->string('codedocument');
            $table->string('sender');
            $table->string('subject');
            $table->integer('pages')->default(1);
            $table->string('project')->nullable();
            $table->integer('category_id')->unsigned();
            $table->string('comments')->nulleable();
            $table->integer('userrec_id')->unsigned();
            $table->integer('userenc_id')->unsigned();
            $table->timestamps();
            $table->foreign('typedocument_id')->references('id')->on('typedocuments');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('userrec_id')->references('id')->on('users');
            $table->foreign('userenc_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
