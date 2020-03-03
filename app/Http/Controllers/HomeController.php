<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client as SMS;
use Carbon\Carbon;
use App\Report;
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
        return view('clients.home');
    }

    public function viewAccountant()
    {
        return view('accountant.home');
    }

    public function pdf(Request $request)
    {
        $pdf = PDF::loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

    public function uploadPDF(Request $request)
    {
        $nameClient = 'juan/';
        $year = Carbon::now()->format('Y').'/';
        $month = Carbon::now()->format('m').'/';
        
        $urlBase = 'https://incidentes-pdf.s3.ca-central-1.amazonaws.com';
        $urlFile = $request->file('pdf')->store($nameClient.$year.$month, 's3');

        $url = $urlBase.$urlFile;
        
        $report = new Report;

        $report->name           = 'ISR';//$request->name;
        $report->description    = 'Se subio con retardo de dos dias';$request->description;
        $report->url            = $url;
        $report->user_id        = 2;

        $report->save();
        
        return "Succesful";
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
