<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class AdminController extends Controller
{

    public function index()
    {   
        // regresar todos los usuarios y listarlos usando la paginacion
        $users = User::all();

        foreach ($users as $key => $user) {
            if ($user->hasRole('client')) {
                $user->type = 'client';
            } else if ($user->hasRole('accountant')){
                $user->type = 'accountant';
            } else {
                unset($users[$key]);
            }
        }

        

        return view('admin.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $user = new User;

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
        $user->password              = Hash::make($request->password);

        $user->save();

        if ($request->type_user == 'client') {
            
            $user->roles()->attach(Role::where('name', 'client')->first());

        } else { // Validar tambien si es de tipo contador

            $user->roles()->attach(Role::where('name', 'accountant')->first());
        }
        
        return redirect()->route('admin.index');
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
