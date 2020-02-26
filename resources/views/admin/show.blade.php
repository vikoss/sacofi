@extends('layouts.app')

@section('main')

<a href="{{ route('admin.index') }}" class="btn btn-outline-primary">Regresar</a>

<table class="table">
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
                <form action="{{ route('admin.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form>
                <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-outline-warning">Editar</a>
            </td>
        </tr>
    </tbody>
  </table>

@endsection