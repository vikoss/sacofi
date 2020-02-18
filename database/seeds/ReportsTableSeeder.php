<?php

use Illuminate\Database\Seeder;
use App\Report;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Report();
        $role->name = 'ISR';
        $role->url = '/storage';
        $role->description = 'Este pago es cada tres meses y sirve para comprobar';
        $role->user_id = '2';
        $role->save();
        
        $role = new Report();
        $role->name = 'ISR';
        $role->url = '/storage/file';
        $role->description = 'Este pago es cada tres meses y sirve para comprobar';
        $role->user_id = '3';
        $role->save();

        $role = new Report();
        $role->name = 'ISR';
        $role->url = '/storage/file';
        $role->description = 'Este pago es cada tres meses y sirve para comprobar';
        $role->user_id = '3';
        $role->save();
    }
}
