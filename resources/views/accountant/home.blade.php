@extends('layouts.app')

@section('main')

{{-- $clients --}}
    <div class="d-flex">
        @foreach ($clients as $client)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('imagess/user.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $client->name }}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="{{ route('reports.show', $client->id) }}" class="btn btn-primary">Subir PDF</a>
            </div>
        </div>
        @endforeach
    </div>
    
@endsection