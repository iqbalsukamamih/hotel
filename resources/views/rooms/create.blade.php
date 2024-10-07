<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Room</title>
</head>
<body>
    <h1>Add Room</h1>
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <label for="room_number">Room Number:</label>
        <input type="text" name="room_number" required>
        <br>
        <label for="room_type">Room Type:</label>
        <input type="text" name="room_type" required>
        <br>
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" required>
        <br>
        <button type="submit">Add Room</button>
    </form>
    <a href="{{ route('rooms.index') }}">Back to Room List</a>
</body>
</html>
