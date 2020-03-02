@extends('layouts.app')

@section('main')
<!-- Seleccionamos el tipo de usuario y despues mostramos el formulario -->
<a href="{{ route('admin.index') }}" class="btn btn-outline-primary">Regresar</a>

<form action="{{ route('admin.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm">
            
            <label for="name"> Nombre(s): </label>
            <input type="text" class="form-control form-control-sm" id="name" name="name" required>

            <label for="first_surname"> Apellido paterno: </label>
            <input type="text" class="form-control form-control-sm" id="first_surname" name="first_surname"required>

            <label for="second_surname"> Apellido materno: </label>
            <input type="text" class="form-control form-control-sm" id="second_surname" name="second_surname" required>

            <label for="phone_number"> Numero de telefono : </label>
            <input type="text" class="form-control form-control-sm" id="phone_number" name="phone_number" required>
    
            <label for="activity"> Actividad : </label>
            <input type="text" class="form-control form-control-sm" id="activity" name="activity" required>
            
            <label for="birthday"> Cumpleaños : </label>
            <input type="text" class="form-control form-control-sm" id="birthday" name="birthday" required>
    
        </div>
        <div class="col-sm">

            <label for="type_user">Tipo de usuario:</label>
            <select name="type_user" id="type_user" class="custom-select" required>
                <option value="none" disabled selected hidden>Selecciona una opcion...</option>
                <option value="client">Cliente</option>
                <option value="accountant">Contador</option>
            </select>

            <label for="rfc"> RFC: </label>
            <input type="text" class="form-control form-control-sm" id="rfc" name="rfc" required>

            <label for="email"> Correo : </label>
            <input type="text" class="form-control form-control-sm" id="email" name="email" required>
    
            <label for="password"> Contraseña : </label>
            <input type="password" class="form-control form-control-sm" id="password" name="password" required>
    
            <label for="password_r"> Confirma contraseña : </label>
            <input type="password" class="form-control form-control-sm" id="password_r" required>

        </div>
        <div class="col-sm">
            
            <label for="address_street"> Calle : </label>
            <input type="text" class="form-control form-control-sm" id="address_street" name="address_street" required>
    
            <label for="address_streat_number"> Numero : </label>
            <input type="text" class="form-control form-control-sm" id="address_street_number" name="address_street_number" required>
    
            <label for="address_colony"> Colonia : </label>
            <input type="text" class="form-control form-control-sm" id="address_colony" name="address_colony" required>
    
            <label for="address_town"> Municipio : </label>
            <input type="text" class="form-control form-control-sm" id="address_town" name="address_town" required>
    
            <label for="address_cp"> Codigo Postal : </label>
            <input type="text" class="form-control form-control-sm" id="address_cp" name="address_cp" required>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <button type="submit">Crear</button>
        </div>
    </div>
</form>  

@endsection