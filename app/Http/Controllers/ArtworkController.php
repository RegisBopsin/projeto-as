<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\artwork;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
        public function index()
    {
        $artworks = artwork::all();
        return view('artworks.index', compact('artworks'));
    }

    public function create()
    {
        $artists = Artist::all();
        return view('artworks.create', compact('artists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'creation_year' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        

        $artwork = new artwork();
        $artwork->title = $request->title;
        $artwork->category = $request->category;
        $artwork->creation_year = $request->creation_year;
        $artwork->image = 'images/'.$imageName;
        $artwork->artist_id = $request->artist_id;
        $artwork->save();

        return redirect('artworks')->with('success', 'artwork created successfully.');
    }

    public function edit($id)
    {
        $artwork = artwork::findOrFail($id);
        $artists = artist::all();
        return view('artworks.edit', compact('artwork', 'artists'));
    }

    public function update(Request $request, $id)
    {
        $artwork = artwork::findOrFail($id);
        $artwork->update($request->all());

        $artwork->title = $request->title;
        $artwork->category = $request->category;
        $artwork->creation_year = $request->creation_year;

        if(!is_null($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $artwork->image = 'images/'.$imageName;
            $request->image->move(public_path('images'), $imageName);
        }
        $artwork->save();
        
        return redirect('artworks')->with('success', 'artwork updated successfully.');
    }

    public function destroy($id)
    {
        $artwork = artwork::findOrFail($id);
        $artwork->delete();
        return redirect('artworks')->with('success', 'artwork deleted successfully.');
    }
}
