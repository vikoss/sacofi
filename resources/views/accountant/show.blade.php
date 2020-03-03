@extends('layouts.app')

@section('main')

{{ $reports }}
@foreach ($reports as $report)
<div class="list-group">
<a href="#Pon el evento para que visualize el PDF" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
    <h5 class="mb-1">{{ $report->name }}</h5>
    <small>{{ $report->created_at }}</small>
    </div>
    <p class="mb-1">{{ $report->description }}</p>
    <small>Donec id elit non mi porta.</small>
</a>
</div>
@endforeach
    
@endsection