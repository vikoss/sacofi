<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'first_surname' => 'admin@sacofi.com',
            'second_surname' => 'admin@sacofi.com',
            'rfc' => 'rfc',
            'address_street_number' => 'address_street_number',
            'address_street' => 'address_street',
            'address_colony' => 'address_colony',
            'address_town' => 'address_town',
            'address_cp' => 'address_cp',
            'phone_number' => 'phone_number',
            'activity' => 'activity',
            'birthday' => 'birthday',
            'password' => Hash::make('secret'),
            'email' => 'admin@sacofi.com',
        ]);
       $admin->roles()->attach(Role::where('name', 'admin')->first());

        $client = User::create([
            'name' => 'client01',
            'first_surname' => 'first_surname',
            'second_surname' => 'second_surname',
            'rfc' => 'rfc',
            'address_street_number' => 'address_street_number',
            'address_street' => 'address_street',
            'address_colony' => 'address_colony',
            'address_town' => 'address_town',
            'address_cp' => 'address_cp',
            'phone_number' => 'phone_number',
            'activity' => 'activity',
            'birthday' => 'birthday',
            'email' => 'client01@sacofi.com',
            'password' => Hash::make('secret'),
        ]);
        $client->roles()->attach(Role::where('name', 'client')->first());

        $accountant = User::create([
            'name' => 'accountant01',
            'first_surname' => 'first_surname',
            'second_surname' => 'second_surname',
            'rfc' => 'rfc',
            'address_street_number' => 'address_street_number',
            'address_street' => 'address_street',
            'address_colony' => 'address_colony',
            'address_town' => 'address_town',
            'address_cp' => 'address_cp',
            'phone_number' => 'phone_number',
            'activity' => 'activity',
            'birthday' => 'birthday',
            'email' => 'accountant01@sacofi.com',
            'password' => Hash::make('secret'),
        ]);
        $accountant->roles()->attach(Role::where('name', 'accountant')->first());

    }
}
