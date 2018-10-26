<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::beginTransaction();
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        DB::table('profiles')->insert([
            'name' => 'ADMIN', 
        ]);
        DB::table('profiles')->insert([
            'name' => 'RECEPTION', 
        ]);
        DB::table('profiles')->insert([
            'name' => 'OFFICER', 
        ]);
        DB::commit();
        
        /*
        public function up() { 
            DB::beginTransaction(); 
            Schema::create('town', function (Blueprint $table) {
                $table->increments('id'); 
                $table->string('name'); 
                $table->timestamps(); } 
            ); 

            DB::table('town')->insert(array(array('London'), array('Paris'), array('New York'))); 

            Schema::create('location', function (Blueprint $table) { 
                $table->increments('id'); 
                $table->integer('town_id')->unsigned()->index(); 
                $table->float('lat'); 
                $table->float('long'); 
                $table->timestamps(); 
                $table->foreign('town_id')->references('id')->on('town')->onDelete('cascade'); 
            }); 
            DB::commit(); 
        } 
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
