@extends('layouts.app')

@section('content')
    <h1>Tambah Perushaan</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('Customer.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Nama" class="form-label">Nama Perushaan</label>
            <input type="text" name="Nama" class="form-control" required value="{{ old('Nama') }}">
        </div>
        <div class="mb-3">
            <label for="No_Telepon" class="form-label">Telepon</label>
            <input type="text" name="No_Telepon" class="form-control" value="{{ old('No_Telepon') }}">
        </div>
        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <textarea name="Alamat" class="form-control">{{ old('Alamat') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('Customer.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
