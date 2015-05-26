@extends('app')

@section('content')

    <h1>{{ trans('app.create_category') }}</h1>

    @include('errors.list')

    {!! Form::open(['route'=>'categories.store']) !!}
        @include('categories._form',['submit_button_text' => trans('app.create_category')])
    {!! Form::close() !!}

@endsection