@extends('app')

@section('content')
    <h1>Categories</h1>

    <p><a href="{{ route('categories.create') }}" class="btn btn-primary">New Category</a></p>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id  }}</td>
                    <td>
                        <a href="{{ route('categories.index',['id'=>$category->id]) }}" class="">{{ $category->name  }}</a>
                    </td>
                    <td>{{ $category->description  }}</td>
                    <td>
                        <a href="{{ route('categories.edit',['id'=>$category->id]) }}" class="btn btn-xs btn-primary">Edit</a>
                        <a href="{{ route('categories.destroy',['id'=>$category->id]) }}" class="btn btn-xs btn-danger" >Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $categories ->render() !!}

    </div>
@endsection