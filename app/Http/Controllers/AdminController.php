<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{

    public function index()
    {   
        // regresar todos los usuarios y listarlos usando la paginacion

        

        return view('admin.home', [ 'users' => User::all() ]);
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
        // tipo get para mostrar el usuario /users/{user}
        return view( 'admin.show', [ 'user' => User::findOrFail($id) ] );
    }

    public function edit($id)
    {
        // tipo get para mostrar el usuario en modo edicion /users/{user}/edit

        return view( 'admin.edit', [ 'user' => User::findOrFail($id) ] );
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail( $id );

        $user->name                  = $request->name;
        $user->first_surname         = $request->first_surname;
        $user->second_surname        = $request->second_surname;
        $user->rfc                   = $request->rfc;
        $user->address_street_number = $request->address_street_number;
        $user->address_street        = $request->address_street;
        $user->address_colony        = $request->address_colony;
        $user->address_town          = $request->address_town;
        $user->address_cp            = $request->address_cp;
        $user->phone_number          = $request->phone_number;
        $user->activity              = $request->activity;
        $user->birthday              = $request->birthday;
        $user->email                 = $request->email;

        $user->save();

        //return view( 'admin.show', [ 'user' => User::findOrFail($id) ] );
        return redirect()->route('admin.show', $id);
    }

    public function destroy($id)
    {
        User::destroy( $id );

        return redirect()->route('admin.index');

    }
}
