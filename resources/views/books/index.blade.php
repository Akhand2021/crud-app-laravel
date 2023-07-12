@extends('layouts.app')
@section('content')
    <h1>Books</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h3 class="text-center">ALgocodersmind|CRUD in laravel</h3>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-2">Add New Book</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->description }}</td>
                    <td>
                        <a href="{{ route('books.show', ['id' => $book->id]) }}" class="btn btn-sm btn-success">View</a>
                        <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" action="{{ route('books.destroy', ['id' => $book->id]) }}" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection