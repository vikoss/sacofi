<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
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
        return $request->file('pdf')->store('myfile', 's3');
    }

    public function sendSMS(Request $request)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($request->recipient, 
                ['from' => $twilio_number, 'body' => $request->message] );

        return "sucessful";
    }
}
