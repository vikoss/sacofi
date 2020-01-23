<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@sacofi.com',
            'password' => Hash::make('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'client01',
            'email' => 'client01@sacofi.com',
            'password' => Hash::make('secret'),
        ]);
    }
}
