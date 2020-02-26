<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{

    public function index()
    {   
        // regresar todos los usuarios y listarlos usando la paginacion

        return view('admin.home');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        /*
        $table->string('name');
        $table->string('first_surname');
        $table->string('second_surname');
        $table->string('rfc');
        $table->string('address_street_number');
        $table->string('address_street');
        $table->string('address_colony');
        $table->string('address_town');
        $table->string('address_cp');
        $table->string('phone_number');
        $table->string('activity');
        $table->string('birthday');
        //$table->string('accountant_id');
        //$table->foreign('accountant_id')->references('id')->on('accountant');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
        */


        User::create($request->all());
        
        return 'stored';
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
