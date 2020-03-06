@extends('layouts.app')

@section('main')
    
    <a href="{{ route('admin.create') }}" class="btn btn-outline-primary">Nuevo usuario</a>

    <!--table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">Tipo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Actividad</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <th>{{ $user->type == 'client' ? 'Cliente':'Contador' }}</th>
                <th>{{ $user->name.' '.$user->first_surname }}</th>
                <td>{{ $user->activity }}</td>
                <td>
                    <a href="{{ route('admin.show', $user->id) }}" class="btn btn-outline-secondary">Ver...</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table-->


    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Tipo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Actividad</th>
                <th scope="col">Acciones</th>
              </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->type == 'client' ? 'Cliente':'Contador' }}</th>
                <th>{{ $user->name.' '.$user->first_surname }}</th>
                <td>{{ $user->activity }}</td>
                <td>
                    <a href="{{ route('admin.show', $user->id) }}" class="btn btn-outline-secondary">Ver...</a>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>


    <!--form action="{{ route('send') }}" method="post">
    @csrf
    <label for="message">Mesnage:</label>
    <input type="text" name="message">
    <label for="recipient">Destino:</label>
    <input type="text" name="recipient" value="+525612960583">
    
    <input type="submit" value="Enviar">

  </form-->

@endsection