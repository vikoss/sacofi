@extends('layouts.app')

@section('main')

<div class="row">
    <div class="col-sm">
        <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary">Regresar</a>
    </div>
    <div class="col-sm d-flex justify-content-end">
        <button type="submit" class="btn btn-outline-danger mr-3" v-on:click="confirmDelete">Eliminar</button>
        <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-outline-info">Editar</a>
    </div>
</div>


<form action="{{ route('admin.destroy', $user->id) }}" method="POST" id="destroy-form">
    @csrf
    @method('DELETE')
</form>

<div class="row mt-4">

    <div class="col-sm">
        <label>Nombre completo:</label>
        <p class="text-muted">{{ $user->name.' '.$user->first_surname.' '.$user->second_surname }}</p>

        <label>RFC:</label>
        <p class="text-muted">{{ $user->rfc }}</p>

        <label>Telefono Movil:</label>
        <p class="text-muted">{{ $user->phone_number }}</p>

        <label>Correo:</label>
        <p class="text-muted">{{ $user->email }}</p>
    </div>
    <div class="col-sm">
        <label>Direccion:</label>
        <p class="text-muted">{{ $user->address_street_number.' '.$user->address_street.' '.$user->address_colony.' '.$user->address_town }}</p>

        <label>Actividad:</label>
        <p class="text-muted">{{ $user->activity }}</p>

        <label>Fecha de Nacimiento:</label>
        <p class="text-muted">{{ $user->birthday }}</p>
    </div>

</div>


<!--table class="table">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido materno</th>
            <th scope="col">Numero de Telefono</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>   
        <tr>
            <th>{{ $user->name }}</th>
            <td>{{ $user->first_surname }}</td>
            <td>{{ $user->second_surname }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>
                <form action="{{ route('admin.destroy', $user->id) }}" method="POST" id="destroy-form">
                    @csrf
                    @method('DELETE')
                </form>
                <button type="submit" class="btn btn-outline-danger" v-on:click="confirmDelete">Eliminar</button>
                <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-outline-warning">Editar</a>
            </td>
        </tr>
    </tbody>
  </table-->

@endsection