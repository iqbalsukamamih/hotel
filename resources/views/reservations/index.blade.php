@extends('layouts.app')

@section('content')
<div class="page-heading">
<div class="page-title mb-3">
    <h3>
        <span class="bi bi-people"></span>Checkin/Checkout</h3>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
            <table id="datatablel" class="table table-striped">
                <thead>
            <tr>
                <th>Guest Name</th>
                <th>Room Number</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->guest->name }}</td>
                    <td>{{ $reservation->room->room_number }}</td>
                    <td>{{ $reservation->checkin_date }}</td>
                    <td>{{ $reservation->checkout_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</section>
</div>
@endsection
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

