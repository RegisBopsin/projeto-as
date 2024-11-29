<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
        public function index()
    {
        $artists = Artist::all();
        return view('artists.index', compact('artists'));
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(Request $request)
    {
        artist::create($request->all());
        return redirect('artists')->with('success', 'artist created successfully.');
    }

    public function edit($id)
    {
        $artist = artist::findOrFail($id);
        return view('artists.edit', compact('artist'));
    }

    public function update(Request $request, $id)
    {
        $artist = artist::findOrFail($id);
        $artist->update($request->all());
        return redirect('artists')->with('success', 'artist updated successfully.');
    }

    public function destroy($id)
    {
        $artist = artist::findOrFail($id);
        $artist->delete();
        return redirect('artists')->with('success', 'artist deleted successfully.');
    }
}
