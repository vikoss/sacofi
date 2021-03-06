@extends('layouts.app')

@section('main')

<div class="row">
  <div class="col-sm d-flex d-flex justify-content-between mb-3">
    <a href="{{ route('accountant') }}" class="btn btn-outline-secondary">Regresar</a>
    <a href="{{ route('report.create', $client->id) }}" class="btn btn-outline-primary">Nuevo documento</a>
  </div>
</div>

{{-- $reports }}
{{ $client --}}
@foreach ($reports as $report)
<div class="list-group">
<a type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modal{{ $report->id }}">
    <div class="d-flex w-100 justify-content-between">
    <h5 class="mb-1">{{ $report->name }}</h5>
    <small>{{ $report->created_at }}</small>
    </div>
    <small>{{ $report->description }}</small>
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

    
@endsection