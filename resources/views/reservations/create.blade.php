@extends('layouts.app')

@section('content')
<div class="page-heading">
<div class="page-title mb-3">
    <h3>
        <span class="bi bi-people"></span>Reservation</h3>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
    <h1>Create Reservation</h1>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <label for="guest_id">Guest:</label>
        <input type="text" name="guest_id" id="guest_id" value="{{ old('guest_id') }}" class="form-control @error('guest_id') is-invalid @enderror"/>
            @foreach($guests as $guest)
                <option value="{{ $guest->id }}">{{ $guest->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="room_id">Room:</label>
        <select name="room_id" required>
            @foreach($rooms as $room)
                <option value="{{ $room->id }}">{{ $room->room_number }}</option>
            @endforeach
        </select>
        <br>
        <label for="checkin_date">Check-in Date:</label>
        <input type="date" name="checkin_date" required>
        <br>
        <button type="submit">Create Reservation</button>
    </form>
    <a href="{{ route('reservations.index') }}">Back to Reservation List</a>
</div>
</div>
</section>
</div>
@endSection
@push('styles')
<link rel="stylesheet" href="{{ asset('/vendors/simple-datatables/style.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#datatablel');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endpush