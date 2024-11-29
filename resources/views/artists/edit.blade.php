<form action="{{ url('artists/'.$artist->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" placeholder="title" value="{{$artist->name}}" required>
    <input type="number" name="birth_year" placeholder="birth_year" value="{{$artist->birth_year}}" required>
    <input type="text" name="biography" placeholder="biography" value="{{$artist->biography}}" required>
    <button type="submit">Edit artist</button>
</form>
