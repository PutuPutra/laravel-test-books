<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'serial_number' => 'required|unique:books,serial_number',
            'published_at' => 'required|date',
            'author_id' => 'required|exists:authors,id',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'serial_number' => 'required|unique:books,serial_number,' . $book->id,
            'published_at' => 'required|date',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        try {
            $book->delete();
            return response()->json(['message' => 'Book deleted successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete the book.'], 500);
        }
    }
}
