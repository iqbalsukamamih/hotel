@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3>
            <span class="bi bi-people"></span> Checkin/Checkout
        </h3>
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
                            <td>{{ $guest->name }}</td>
                            <td>{{ $guest->email }}</td>
                            <td>{{ $guest->checkin_date }}</td>
                            <td>{{ $guest->checkout_date ?? 'Not Checked Out' }}</td>
                            <td>
                                @if (Auth::user()->hasRole('admin'))
                                @if (!$guest->checkout_date)
                                <form action="{{ route('guests.checkout', $guest->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">Checkout</button>
                                </form>
                                @endif
                                <a href="{{ route('guests.edit', $guest->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('destroy', $guest->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                                @elseif (Auth::user()->hasRole('guest'))
                                <a href="{{ route('guests.info', $guest->id) }}" class="btn btn-sm btn-warning">info</a>
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
<script src="{{ asset('/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#datatablel');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endpush