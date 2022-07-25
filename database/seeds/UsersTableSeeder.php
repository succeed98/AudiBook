<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'Bernard',
            'email' => 'bernard@example.com',
            'password' => bcrypt('123456'),
            'color' => '#E60474',
            'cel' => '(69) 9999-9990',
            'description' => 'The Administrator.',
        ]);
        $user->assign('admin');

        $user = User::create([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'Fourteen',
            'email' => 'fourteen@example.com',
            'password' => bcrypt('123456'),
            'color' => '#e5aff7',
            'cel' => '(69) 9999-9991',
            'description' => 'Secretary of the Adminstrator.',
        ]);
        $user->assign('secre');

        DB::table('users')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'Karla',
            'email' => 'karla@example.com',
            'password' => bcrypt('123456'),
            'color' => '#8529CF',
            'cel' => '(69) 9999-9992',
            'description' => 'secretary of the Administrator',
        ]);

        DB::table('users')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'Fahimy',
            'email' => 'fahimy@example.com',
            'password' => bcrypt('123456'),
            'color' => '#DA0905',
            'cel' => '(69) 9999-9993',
            'description' => 'Filho mais velho da chefe.',
        ]);

        DB::table('users')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'Quintus',
            'email' => 'quintus@example.com',
            'password' => bcrypt('123456'),
            'color' => '#e8d16d',
            'cel' => '(69) 9999-9994',
            'description' => 'Coordinator',
        ]);

        foreach (\App\User::all() as $user) {
            event(new \App\Events\UserRegistered($user));
        }
    }
}
