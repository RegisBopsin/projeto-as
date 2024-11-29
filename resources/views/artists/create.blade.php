<form action="{{ url('artists/') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="biography" placeholder="Biography" required>
    <input type="number" name="birth_year" placeholder="Birth_year" required>
    <button type="submit">Create artist</button>
</form>