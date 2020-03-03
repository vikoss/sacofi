<?php

use Illuminate\Database\Seeder;

class AccountantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounttant = Accountant::create([
            'name' => 'Sergio',
            'first_surname' => 'Guerrero',
            'second_surname' => 'Jimenez',
            'rfc' => 'GJS9823SD4O4',
            'address_street_number' => '19',
            'address_street' => 'Circonio',
            'address_colony' => 'Ex-hacienda del Pedregal',
            'address_town' => 'Atizapan de Zaragoza',
            'address_cp' => '55896',
            'phone_number' => '55-5498-6254',
            'activity' => 'Contador que se dedica a....',
            'birthday' => '1995-02-02',
            'password' => Hash::make('secret'),
            'email' => 'sergio.gj@sacofi.com',
        ]);
       //$accounttant->roles()->attach(Role::where('name', 'admin')->first());
    }
}
