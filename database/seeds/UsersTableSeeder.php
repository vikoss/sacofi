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
            'first_surname' => 'apellido1',
            'second_surname' => 'apellido2',
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
           'name' => 'Gilberto',
           'first_surname' => 'Hernandez',
           'second_surname' => 'Conde',
           'rfc' => 'FGJ090890TG3T',
           'address_street_number' => '19',
           'address_street' => 'Circonio',
           'address_colony' => 'Ex-hacianda del Pedregal',
           'address_town' => 'Atizapan de zaragoza',
           'address_cp' => '56541',
           'phone_number' => '5565258715',
           'activity' => 'Es contador',
           'birthday' => '1990-03-03',
           'email' => 'gilberto.conde@sacofi.com',
           'password' => Hash::make('secret'),
           ]);
           $accountant->roles()->attach(Role::where('name', 'accountant')->first());
           
           $client = User::create([
               'name' => 'Victor Israel',
               'first_surname' => 'Torrecillas',
               'second_surname' => 'Garcia',
               'rfc' => 'HPS44FGX55L0P',
               'address_street_number' => '563',
               'address_street' => 'Jalisco',
               'address_colony' => 'Jacaranda',
               'address_town' => 'Atizapan de Zaragoza',
               'address_cp' => '54269',
               'phone_number' => '5612960583',
               'activity' => 'Tiene una microempresa de pan.',
               'birthday' => '1990-04-13',
               'email' => 'victor.torrecillas@sacofi.com',
               'password' => Hash::make('secret'),
               'accountant_id' => 2,
           ]);
           $client->roles()->attach(Role::where('name', 'client')->first());
    }
}
