@extends('layouts.store')

@section('content')

    <div class="container">

        <h1>User Profile with id {{ $user->id }}</h1>


        @if($user)

            <div class="col-md-2">
                <img src='{{  asset('uploads/no-img.jpg') }}'  />
            </div>

            <div class="col-md-8 col-lg-offset-1">
                <h2>Name:</h2> <p> <pre>{{ $user->name }}</pre></p>
                <h2>Email:</h2> <p> <pre>{{ $user->email }}</pre></p>
                <h2>Address:</h2> <p> <pre>{{  $user->profile->address }}</pre></p>
            </div>

        @else
            <h2>A Consulta retornou ZERO</h2>
        @endif
    </div>

@endsection