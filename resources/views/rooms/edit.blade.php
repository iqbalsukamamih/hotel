<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Room</title>
</head>
<body>
    <h1>Edit Room</h1>
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="room_number">Room Number:</label>
        <input type="text" name="room_number" value="{{ $room->room_number }}" required>
        <br>
        <label for="room_type">Room Type:</label>
        <input type="text" name="room_type" value="{{ $room->room_type }}" required>
        <br>
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" value="{{ $room->price }}" required>
        <br>
        <button type="submit">Update Room</button>
    </form>
    <a href="{{ route('rooms.index') }}">Back to Room List</a>
</body>
</html>
