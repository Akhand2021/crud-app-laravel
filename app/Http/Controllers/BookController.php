<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('books.create');
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'description' => 'required',
    ]);
    // Create a new book
    $book = new Book();
    $book->title = $validatedData['title'];
    $book->author = $validatedData['author'];
    $book->description = $validatedData['description'];
    $book->save();
    // Redirect to the books index page with a success message
    return redirect()->route('books.index')->with('success', 'Book created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $book = Book::find($id);
       return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
        ]);
      $book = Book::find($id); 
      $bookData = [
          'title' => $request->title,
          'author' => $request->author,
          'description' => $request->description,
      ];
      $book->update($bookData);
      
       return redirect()->route('books.index');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Get the book
        $book = Book::find($id);
        // Delete the book
        $book->delete();
        // Redirect to the books index page with a success message
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
