@extends('layouts.app')

@section('main')

    <form action="{{ route('uploadPDF') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <input type="file" name="pdf">
        <button type="submit">Subir</button>
    </form>
    
@endsection