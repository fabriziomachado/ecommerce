@extends('app')

@section('content')

    <div class="container">
        <h1>Categories</h1>

        <a href="{{ route('category.create') }}" class="btn btn-primary">New Category</a>
        <br/>
        <br/>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>

            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id  }}</td>
                    <td>{{ $category->name  }}</td>
                    <td>{{ $category->description  }}</td>
                    <td>
                        <a href="{{ route('category.edit',['id'=>$category->id])  }}" class="btn btn-xs btn-primary">Edit</a>
                        <a href="{{ route('category.destroy',['id'=>$category->id])  }}" class="btn btn-xs btn-danger" >Delete</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

@endsection