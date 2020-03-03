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

       
       $accountant = User::create([
           'name' => 'Juan',
           'first_surname' => 'Fernandez',
           'second_surname' => 'Guerreo',
           'rfc' => 'rfc',
           'address_street_number' => '19',
           'address_street' => 'Circonio',
           'address_colony' => 'Ex-hacianda del Pedregal',
           'address_town' => 'Atizapan de zaragoza',
           'address_cp' => '56541',
           'phone_number' => '55-6525-8715',
           'activity' => 'Solo es contador',
           'birthday' => '1990-03-03',
           'email' => 'juan@sacofi.com',
           'password' => Hash::make('secret'),
           ]);
           $accountant->roles()->attach(Role::where('name', 'accountant')->first());
           
           $client = User::create([
               'name' => 'Sergio',
               'first_surname' => 'Hernandez',
               'second_surname' => 'Perez',
               'rfc' => 'HPS44FGX55L0P',
               'address_street_number' => '563',
               'address_street' => 'Jalisco',
               'address_colony' => 'Jacaranda',
               'address_town' => 'Atizapan de Zaragoza',
               'address_cp' => '54269',
               'phone_number' => '55-6924-9832',
               'activity' => 'En sus ratos libres el es Chofer de Uber',
               'birthday' => '1990-04-13',
               'email' => 'sergio@sacofi.com',
               'password' => Hash::make('secret'),
               'accountant_id' => 2,
           ]);
           $client->roles()->attach(Role::where('name', 'client')->first());
    }
}
