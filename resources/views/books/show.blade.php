@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ $book->title }}</h1>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <hr>
        <p>{{ $book->description }}</p>
        <hr>
        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection