@extends('layouts.app')

@section('main')
    
    <a href="{{ route('admin.create') }}" class="btn btn-outline-primary">Crear nuevo usuario</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">RFC</th>
            <th scope="col">Codigo Postal</th>
            <th scope="col">Actividad</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <th>{{ $user->name }}</th>
                <td>{{ $user->rfc }}</td>
                <td>{{ $user->address_cp }}</td>
                <td>{{ $user->activity }}</td>
                <td>
                    <a href="{{ route('admin.show', $user->id) }}" class="btn btn-outline-danger">Ver usuario</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection