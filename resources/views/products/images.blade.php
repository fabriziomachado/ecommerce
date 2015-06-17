@extends('layouts.store')

@section('content')

    <div class="container">
        <h1>Images of {{ $product->name }}</h1>

        <a href="{{ route('products.images.create', ['id'=>$product->id]) }}" class="btn btn-primary">New Image</a>
        <br/>
        <br/>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Extension</th>
                <th>Action</th>
            </tr>

            @foreach($product->images as $image)
                <tr>
                    <td>{{ $image->id  }}</td>
                    <td>
                        <img src="{{ asset('uploads/'.$image->id.'.'.$image->extension) }}" width="80px"></td>
                    <td>{{ $image->extension }}</td>
                    <td>
                        <a href="{{ route('products.images.destroy',['id'=>$image->id]) }}" class="btn btn-xs btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach

        </table>

        <a href="{{ route('products.index') }}" class="btn btn-default">Voltar</a>

    </div>

@endsection