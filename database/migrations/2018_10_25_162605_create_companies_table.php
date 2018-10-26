<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::beginTransaction(); 
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('prefixcdocument');
            $table->datetime('startdate');
            $table->timestamps();
        });
        DB::table('companies')->insert([
            'name' => 'CONSULTORIA Y SERVICIOS DE SOFTWARE S.A.S.', 
            'email' => 'info@css-sas.com', 
            'prefixcdocument' => 'CSS', 
            'startdate' => '2014-04-14'
        ]);         

        Schema::table('documents', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned();
        });
        DB::table('documents')->update(['company_id' => 1]);
        Schema::table('documents', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('company_id')->nullable()->unsigned();
        });
        DB::table('users')->update(['company_id' => 1]);
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });
        DB::commit();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign('documents_company_id_foreign');
            $table->dropColumn('company_id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_company_id_foreign');
            $table->dropColumn('company_id');
        });
        Schema::dropIfExists('companies');
    }
}
