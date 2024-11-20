<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::paginate(10);
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
        ]);

        Author::create($request->all());
        return redirect()->route('authors.index')->with('success', 'Author added successfully!');
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email,' . $author->id,
        ]);

        $author->update($request->all());
        return redirect()->route('authors.index')->with('success', 'Author updated successfully!');
    }

    public function destroy(Author $author)
    {
        try {
            $author->delete();
            return response()->json(['message' => 'Author deleted successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete the author.'], 500);
        }
    }
}
