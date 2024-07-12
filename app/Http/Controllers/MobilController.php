<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Author;

class MobilController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $mobils = Mobil::where('merek', 'like', "%{$search}%")
                    ->orWhere('tahun', 'like', "%{$search}%")
                    ->orWhere('warna', 'like', "%{$search}%")
                    ->orWhereHas('author', function($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    })
                    ->paginate(5);

        return view('mobils.index', compact('mobils'));
    }

    public function show($id)
    {
        $mobil = Mobil::with('author')->findOrFail($id);
        return view('mobils.show', compact('mobil'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('mobils.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'author_id' => 'required|exists:authors,id',
        ]);

        Mobil::create($request->all());

        return redirect('/mobils')->with(['success' => 'Data Mobil Berhasil Disimpan!']);
    }


    public function edit($id)
    {
        $mobil = Mobil::findOrFail($id);
        $authors = Author::all();
        return view('mobils.edit', compact('mobil', 'authors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'merek' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'author_id' => 'required|exists:authors,id',
        ]);

        $mobil = Mobil::findOrFail($id);
        $mobil->update($request->all());

        return redirect('/mobils')->with(['success' => 'Data Mobil Berhasil Diubah!']);
    }

    public function delete($id)
    {
        $mobil = Mobil::findOrFail($id);
        $mobil->delete();
        return redirect('/mobils')->with(['success' => 'Data Mobil Berhasil Dihapus!']);
    }
}
