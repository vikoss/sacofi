<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
