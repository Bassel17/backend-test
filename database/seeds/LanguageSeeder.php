<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'language' => 'EN'
        ]);

        DB::table('languages')->insert([
            'language' => 'AR'
        ]);

        DB::table('languages')->insert([
            'language' => 'FR'
        ]);
    }
}
