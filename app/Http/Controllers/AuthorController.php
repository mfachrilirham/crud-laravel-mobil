<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $authors = Author::where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone_number', 'like', "%{$search}%")
                        ->orWhere('address', 'like', "%{$search}%")
                        ->paginate(5);
        
        return view('authors.index', compact('authors'));
    }

    public function show($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.show', compact('author'));
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
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        Author::create($request->all());
        return redirect('/authors')->with(['success' => 'Data Penjual Berhasil Disimpan!']);
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email,' . $author->id,
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        $author->update($request->all());
        return redirect('/authors')->with(['success' => 'Data Penjual Berhasil Diubah!']);
    }

    public function delete($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect('/authors')->with(['success' => 'Data Penjual Berhasil Dihapus!']);
    }


}
