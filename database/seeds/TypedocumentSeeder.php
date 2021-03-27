<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypedocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typedocuments')->insert([
            'name' => Str::random(10),
        ]);        
        DB::table('typedocuments')->insert([
            'name' => Str::random(10),
        ]);        
        DB::table('typedocuments')->insert([
            'name' => Str::random(10),
        ]);
    }
}
