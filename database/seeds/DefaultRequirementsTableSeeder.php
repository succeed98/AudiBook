<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DefaultRequirementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('default_requirements')->insert([
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'Dean',
        ]);

        DB::table('default_requirements')->insert([
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'HOD',
        ]);

        DB::table('default_requirements')->insert([
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'Projector',
        ]);

        DB::table('default_requirements')->insert([
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'Computer',
        ]);

        DB::table('default_requirements')->insert([
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'Table of Honors',
        ]);
    }
}
