<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AuditoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auditoria')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'CCB Auditorium',
            'capacity' => 300,
            'accessible' => true,
            'obs' => null,
            'location' => 'KTU',
        ]);

        DB::table('auditoria')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'Administration Auditorium',
            'capacity' => 80,
            'accessible' => true,
            'obs' => null,
            'location' => 'KTU',
        ]);

        DB::table('auditoria')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'ABBA Bentil',
            'capacity' => 100,
            'accessible' => true,
            'obs' => null,
            'location' => 'KTU',
        ]);

        DB::table('auditoria')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'FBMS Theatre',
            'capacity' => 120,
            'accessible' => false,
            'obs' => null,
            'location' => 'KTU',
        ]);

        DB::table('auditoria')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'Cyber Lab',
            'capacity' => 120,
            'accessible' => false,
            'obs' => null,
            'location' => 'KTU',
        ]);
    }
}
