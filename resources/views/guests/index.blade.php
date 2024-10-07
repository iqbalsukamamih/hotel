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
                <th>Name</th>
                <th>Email</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guests as $guest)
                <tr>
                    <td>{{ $guests->links() }} </td>
                    <td>{{ $guest->name }}</td>
                    <td>{{ $guest->email }}</td>
                    <td>{{ $guest->checkin_date }}</td>
                    <td>{{ $guest->checkout_date }}</td>
                    <td>
                        @if (!$guest->checkout_date)
                        <form action="{{ route('guests.index') }}" method="GET">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search guests...">
                            <button type="submit">Search</button>
                        </form>
                        @endif
                    </td>
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

