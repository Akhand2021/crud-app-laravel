@extends('layouts.app')
@section('content')
    <h1>Edit Book</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('books.update', ['id' => $book->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $book->title }}">
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" name="author" class="form-control" id="author" value="{{ $book->author }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" id="description">{{ $book->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
        <a href="{{route('books.index')}}"  class="btn btn-dark">Back</a>
    </form>
@endsection