<form action="{{ url('artworks/'.$artwork->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="title" placeholder="title" value="{{$artwork->title}}" required>
    <input type="number" name="creation_year" placeholder="creation_year" value="{{$artwork->creation_year}}" required>
    <input type="text" name="category" placeholder="category" value="{{$artwork->category}}" required>
    <div>
        <label for="artist_id"></label>
        <select name="artist_id" id="artist_id">
            <option value="">Select a artist</option>
            @foreach ($artists as $artist)
                @if($artist->id ===  $artwork->artist->id)
                    <option value="{{$artist->id}}" selected>{{ $artist->name}}</option>
                @else
                    <option value="{{$artist->id}}">{{ $artist->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <button type="submit">Edit artwork</button> 
</form>