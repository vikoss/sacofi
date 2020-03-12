<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Twilio\Rest\Client as SMS;
use Carbon\Carbon;
use App\Report;
use App\User;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('clients.home', ['reports' => User::find(Auth::user()->id)->reports]);
    }

    public function viewAccountant()
    {   
        $clients = User::find(Auth::user()->id)->clients;

        return view('accountant.home', ['clients' => $clients]);
    }
    public function showClient($id)
    {
        $client = User::find($id);
        $reports = $client->reports;
        // Tomar en cuenta si se quiere obtener datos de el contador que subio sus reporte
        // User::find(3)->accountant->name;
        $payload = [
                    'reports'   => $reports,
                    'client'    => $client
        ];
        return view('accountant.show', $payload);
    }

    public function createReport($id)
    {
        $client = User::find($id);

        return view('accountant.create', ['client' => $client]);
    }

    public function pdf(Request $request)
    {
        $pdf = PDF::loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

    public function uploadPDF(Request $request)
    {
        $ClientName = $request->client_name.$request->client_first_surname.'/';
        $year = Carbon::now()->format('Y').'/';
        $month = Carbon::now()->format('m');

        $folderName = $ClientName.$year.$month;
        
        $urlFile = $request->file('pdf')->store($folderName, 's3');

        $urlBase = getenv("AWS_URL");
        
        $url = $urlBase.'/'.$urlFile;
        
        $report = new Report;

        $report->name           = $request->name;
        $report->description    = $request->description;
        $report->url            = $url;
        $report->client_id      = $request->client_id;

        $report->save();

        // Cliente 
        $clientData = User::find($request->client_id);

        // sendSMS(); Llamar mi funcion
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new SMS($account_sid, $auth_token);
        $client->messages->create('+52'.$clientData->phone_number, 
                [   
                    'from' => $twilio_number, 
                    'body' => 'Hola '.$clientData->name.' le informamos que ya puede revisar su '.$request->name.' en nuestra pagina oficial https://sacofi.com. Atentamente el equipo de Sacofi.'
                ] 
        );
        
        return redirect()->route('reports.show', $request->client_id);
    }

    public function sendSMS(Request $request)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new SMS($account_sid, $auth_token);
        $client->messages->create($request->recipient, 
                ['from' => $twilio_number, 'body' => $request->message] );

        return "sucessful";
    }
}
