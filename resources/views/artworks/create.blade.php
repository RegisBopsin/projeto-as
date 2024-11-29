<form action="{{ url('artworks/') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Title" required>
    <input type="text" name="category" placeholder="Category" required>
    <input type="number" name="creation_year" placeholder="Creation_year" required>
    <input type="file" name="image" id="image">
    <button type="submit">Create artwork</button>
    <div class="mb-5">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="livro_id">livro</label>
    <select name="artist_id" id="artist_id">
        <option value="">Select artist</option>
        @foreach ($artists as $artist)
            <option value="{{$artist->id}}">{{$artist->name}}</option>
        @endforeach
    </select>
</form>