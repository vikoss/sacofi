@extends('layouts.app')

@section('main')

<form action="{{ route('uploadPDF') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="client_id" value="{{ $client->id }}">
    <!-- PReguntar si es mas factible solo mandar el CURP -->
    <input type="hidden" name="client_name" value="{{ $client->name }}">
    <input type="hidden" name="client_first_surname" value="{{ $client->first_surname }}">
    <!-- *****************************************************************  -->
    <div class="form-group">
        <label for="name">Nombre del documento:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
            <label for="description">Descripcion del documento:</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
    <div class="form-group">
        <label for="pdf">Selecciona el archivo...</label>
        <input type="file" class="form-control-file" name="pdf" id="pdf" required>
    </div>
    <button type="submit" class="btn btn-primary">Subir</button>
</form>
    
@endsection