@extends('layouts.app')

@section('content')
    <h1>Edit Customer</h1>

    <form action="{{ route('Customer.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Nama" class="form-label">Nama Customer</label>
            <input type="text" name="Nama" class="form-control" required value="{{ old('Nama', $customer->Nama) }}">
        </div>
        <div class="mb-3">
            <label for="No_Telepon" class="form-label">Telepon</label>
            <input type="text" name="No_Telepon" class="form-control"
                value="{{ old('No_Telepon', $customer->No_Telepon) }}">
        </div>
        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <textarea name="Alamat" class="form-control">{{ old('Alamat', $customer->Alamat) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('Customer.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
