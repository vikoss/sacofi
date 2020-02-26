@extends('layouts.app')

@section('main')
<!-- Seleccionamos el tipo de usuario y despues mostramos el formulario -->
<select name="type_user">
    <option value="none" disabled selected hidden>Selecciona una opcion...</option>
    <option value="client">Cliente</option>
    <option value="accountant">Contador</option>
</select>

<form action="{{ route('admin.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm">
            
            <label for="name"> Nombre(s): </label>
            <input type="text" class="form-control form-control-sm" id="name" name="name">

            <label for="first_surname"> Apellido paterno: </label>
            <input type="text" class="form-control form-control-sm" id="first_surname" name="first_surname"> 

            <label for="second_surname"> Apellido materno: </label>
            <input type="text" class="form-control form-control-sm" id="second_surname" name="second_surname">

            <label for="phone_number"> Numero de telefono : </label>
            <input type="text" class="form-control form-control-sm" id="phone_number" name="phone_number">
    
            <label for="activity"> Actividad : </label>
            <input type="text" class="form-control form-control-sm" id="activity" name="activity">
            
            <label for="birthday"> Cumpleaños : </label>
            <input type="text" class="form-control form-control-sm" id="birthday" name="birthday">
    
        </div>
        <div class="col-sm">

            <label for="rfc"> RFC: </label>
            <input type="text" class="form-control form-control-sm" id="rfc" name="rfc">

            <label for="email"> Correo : </label>
            <input type="text" class="form-control form-control-sm" id="email" name="email">
    
            <label for="password"> Contraseña : </label>
            <input type="password" class="form-control form-control-sm" id="password" name="password">
    
            <label for="password_r"> Confirma contraseña : </label>
            <input type="password" class="form-control form-control-sm" id="password_r">

        </div>
        <div class="col-sm">
            
            <label for="address_street"> Calle : </label>
            <input type="text" class="form-control form-control-sm" id="address_street" name="address_street">
    
            <label for="address_streat_number"> Numero : </label>
            <input type="text" class="form-control form-control-sm" id="address_street_number" name="address_streat_number">
    
            <label for="address_colony"> Colonia : </label>
            <input type="text" class="form-control form-control-sm" id="address_colony" name="address_colony">
    
            <label for="address_town"> Municipio : </label>
            <input type="text" class="form-control form-control-sm" id="address_town" name="address_town">
    
            <label for="address_cp"> Codigo Postal : </label>
            <input type="text" class="form-control form-control-sm" id="address_cp" name="address_cp">
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <button type="submit">Crear</button>
        </div>
    </div>
</form>  

@endsection