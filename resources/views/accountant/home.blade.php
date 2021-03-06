@extends('layouts.app')

@section('main')

{{-- $clients --}}
    <div class="d-flex">
        @foreach ($clients as $client)
        <div class="card mr-2" style="width: 10rem;">
            <img src="{{ asset('imagess/user.png') }}" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">{{ $client->name }}</h5>
                <p class="card-text">{{ $client->activity }}</p>
                <a href="{{ route('reports.show', $client->id) }}" class="btn btn-primary">Subir PDF</a>
            </div>
        </div>
        @endforeach
    </div>
    
@endsection