@extends('layouts.app')
@section('content')
    <h1>Add New Book</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<h3 class="text-center">ALgocodersmind|CRUD in laravel</h3>
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" name="author" class="form-control" id="author">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" id="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
        <a href="{{route('books.index')}}"  class="btn btn-dark">Back</a>

    </form>
@endsection