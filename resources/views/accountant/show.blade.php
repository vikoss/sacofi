@extends('layouts.app')

@section('main')

<a href="{{ route('accountant') }}" class="btn btn-outline-primary">Regresar</a>

{{-- $reports }}
{{ $client --}}
@foreach ($reports as $report)
<div class="list-group">
<a type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modal{{ $report->id }}">
    <div class="d-flex w-100 justify-content-between">
    <h5 class="mb-1">{{ $report->name }}</h5>
    <small>{{ $report->created_at }}</small>
    </div>
    <p class="mb-1">{{ $report->description }}</p>
    <small>Donec id elit non mi porta.</small>
</a>
</div>
<!-- Modal -->
<div class="modal fade" id="modal{{ $report->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 90%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $report->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <embed src="{{ $report->url }}" width="100%" height="700px" type='application/pdf'>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
@endforeach

    <button v-on:click="formUpload = true" class="btn btn-outline-secondary">Subir nuevo documento</button>

    <form v-if="formUpload" action="{{ route('uploadPDF') }}" method="post" enctype="multipart/form-data">
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