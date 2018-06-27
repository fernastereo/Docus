<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableDocumentsDropFieldsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign('documents_userrec_id_foreign');
            $table->dropForeign('documents_userenc_id_foreign');
            $table->dropColumn('userrec_id');
            $table->dropColumn('userenc_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->integer('userenc_id')->unsigned();
            $table->integer('userrec_id')->unsigned();
            $table->foreign('userenc_id')->references('id')->on('users');
            $table->foreign('userrec_id')->references('id')->on('users');
        });
    }
}
