@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h3 class="fw-bold mb-2 pb-2 border-bottom">Edit Guest</h3>

        <a href="{{ route('guests.index')}}" class="btn btn-sm btn-secondary mb-2"> Kembali</a>

        <form action="{{ route('guests.update', $guest->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="form-group mb-2">
                <label for="name">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name', $guest->name) }}" class="form-control @error('name') is-invalid @enderror" required/>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group mb-2">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" value="{{ old('email', $guest->email) }}" class="form-control @error('email') is-invalid @enderror" required/>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group mb-2">
                <label for="checkin_date">Check-in Date:</label>
                <input type="date" name="checkin_date" id="checkin_date" value="{{ old('checkin_date', $guest->checkin_date) }}" class="form-control @error('checkin_date') is-invalid @enderror" required>
                @error('checkin_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <button type="submit" class="btn btn-sm mb-2 btn-primary">
                Simpan
            </button>
    
            <a href="{{ route('guests.index')}}" class="btn btn-sm btn-secondary mb-2"> Batal</a>
    
        </form> 
    </div>
@endsection