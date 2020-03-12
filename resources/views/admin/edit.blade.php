@extends('layouts.app')

@section('main')

<form action="{{ route('admin.update', $user->id ) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-sm">
            
            <label for="name"> Nombre(s): </label>
            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ $user->name }}">

            <label for="first_surname"> Apellido paterno: </label>
            <input type="text" class="form-control form-control-sm" id="first_surname" name="first_surname" value="{{ $user->first_surname }}">

            <label for="second_surname"> Apellido materno: </label>
            <input type="text" class="form-control form-control-sm" id="second_surname" name="second_surname" value="{{ $user->second_surname }}">

            <label for="phone_number"> Numero de telefono : </label>
            <input type="text" class="form-control form-control-sm" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
            
            <label for="birthday"> Cumpleaños : </label>
            <input type="text" class="form-control form-control-sm" id="birthday" name="birthday" value="{{ $user->birthday }}">
    
        </div>
        <div class="col-sm">

            @if (App\User::find($user->id)->hasRole('client'))
                
                @php
                    $users = App\User::all();
                    $accountants = $users->filter(function($user){ 
                        return $user->hasRole('accountant'); 
                    }) 
                @endphp
            
                <label for="accountant_id">Contador asignado:</label>
                <select name="accountant_id" id="accountant_id" class="custom-select" required>
                    <option value="{{ $user->accountant->name }}" >{{ $user->accountant->name }}</option>
                    @foreach ($accountants as $accountant)
                            <option value="{{ $accountant->id }}">{{ $accountant->name }}</option>
                    @endforeach
                </select>
            @endif

            <label for="activity"> Actividad : </label>
            <input type="text" class="form-control form-control-sm" id="activity" name="activity" value="{{ $user->activity }}">

            <label for="rfc"> RFC: </label>
            <input type="text" class="form-control form-control-sm" id="rfc" name="rfc" value="{{ $user->rfc }}">

            <label for="email"> Correo : </label>
            <input type="text" class="form-control form-control-sm" id="email" name="email" value="{{ $user->email }}">
    
            <label for="address_cp"> Codigo Postal : </label>
            <input type="text" class="form-control form-control-sm" id="address_cp" name="address_cp" value="{{ $user->address_cp }}">
            <!--label for="password"> Contraseña : </label>
            <input type="password" class="form-control form-control-sm" id="password" name="password">
    
            <label for="password_r"> Confirma contraseña : </label>
            <input type="password" class="form-control form-control-sm" id="password_r"-->

        </div>
        <div class="col-sm">
            
            <label for="address_street"> Calle : </label>
            <input type="text" class="form-control form-control-sm" id="address_street" name="address_street" value="{{ $user->address_street }}">
    
            <label for="address_streat_number"> Numero : </label>
            <input type="text" class="form-control form-control-sm" id="address_street_number" name="address_street_number" value="{{ $user->address_street_number }}">
    
            <label for="address_colony"> Colonia : </label>
            <input type="text" class="form-control form-control-sm" id="address_colony" name="address_colony" value="{{ $user->address_colony }}">
    
            <label for="address_town"> Municipio : </label>
            <input type="text" class="form-control form-control-sm" id="address_town" name="address_town" value="{{ $user->address_town }}">

        </div>
    </div>
    <div class="row">
        <div class="col-sm d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-outline-primary mr-3">Actualizar</button>
            <a href="{{ route('admin.show', $user->id ) }}" class="btn btn-outline-danger">Cancelar</a>
        </div>
    </div>
</form>  

@endsection