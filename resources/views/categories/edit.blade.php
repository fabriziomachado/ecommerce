@extends('layouts.store')

@section('content')

    <h1>{{ trans('app.category_editing', ['name' => $category->name]) }}</h1>

    @include('errors.list')

    {!! Form::model($category, ['route'=>['categories.update', $category->id], 'method'=>'patch']) !!}
        @include('categories._form', ['submit_button_text' => trans('app.update_category')])
    {!! Form::close() !!}

@endsection