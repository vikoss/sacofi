@extends('layouts.app')

@section('content')

<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

<h1>Bienvenido al sistema</h1>
@if( Auth::user()->hasRole('client') )
<h2> Su rol es de cliente </h2>
@endif

@if( Auth::user()->hasRole('accountant') )
<h2> Su rol es de contador </h2>
@endif

@if( Auth::user()->hasRole('admin') )
<h2> Su rol es de admin </h2>
@endif

<p> {{ Auth::user()->roles }} </p>

@if( Auth::user()->isAdmin() )
<h2>Si es admin</h2>
@endif


@endsection
