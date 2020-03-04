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
        $role->url = 'https://incidentes-pdf.s3.ca-central-1.amazonaws.com/incidente_2019-12-12_08_48_54.pdf';
        $role->description = 'Este pago es cada tres meses y sirve para comprobar...';
        $role->client_id = 3;
        $role->save();
        
        $role = new Report();
        $role->name = 'Reporte SEDENA';
        $role->url = 'https://incidentes-pdf.s3.ca-central-1.amazonaws.com/incidente_2019-12-12_08_48_54.pdf';
        $role->description = 'Se pueden ver las dependencias de gobierno que intervinieron.';
        $role->client_id = 3;
        $role->save();

        $role = new Report();
        $role->name = 'Comprobante de pago';
        $role->url = 'https://incidentes-pdf.s3.ca-central-1.amazonaws.com/incidente_2019-12-12_08_48_54.pdf';
        $role->description = 'Este comprobante es para verificar que realmente se pago esa cantidad.';
        $role->client_id = 3;
        $role->save();
    }
}
