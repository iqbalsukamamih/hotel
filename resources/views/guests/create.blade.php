@extends('layouts.app')

@section('content')
<div class="page-heading">
<div class="page-title mb-3">
    <h3>
        <span class="bi bi-people"></span>Checkin</h3>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
    <h1>Check In Guest</h1>
    <form action="{{ route('guests.store') }}" method="POST">
        @csrf

        <div class="form-group mb-2">
        <label for="name">Name <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"/>
        @error('name')
            <div>{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group mb-2">
        <label for="name">Email<span class="text-danger">*</span></label>
        <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"/>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group mb-2">
        <label for="checkin_date">Check-in Date:</label>
        <input type="date" name="checkin_date" required>
        @error('checkin_date')
            <div>{{ $message }}</div>
        @enderror
        </div>
        <button type="submit">Check In</button>
    </form>    
    <a href="{{ route('guests.index') }}">kembali</a>
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
