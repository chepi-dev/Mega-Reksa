@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Transaksi</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('Transaksi.update', $transaksi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="customer_id" class="form-label">Nama Customer</label>
                <select class="form-control" name="customer_id" id="customer_id" required>
                    <option value="">-- Pilih Customer --</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}"
                            {{ $customer->id == $transaksi->customer_id ? 'selected' : '' }}>
                            {{ $customer->Nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tanggal --}}
            <div class="mb-3">
                <label for="Tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="Tanggal" id="Tanggal"
                    value="{{ old('Tanggal', $transaksi->Tanggal) }}" required>
            </div>

            {{-- Nama Customer --}}
            <div class="mb-3">
                <label for="Nama_Customer" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" name="Nama_Customer" id="Nama_Customer"
                    value="{{ old('Nama_Customer', $transaksi->Nama_Customer) }}" required>
            </div>

            {{-- AWB --}}
            <div class="mb-3">
                <label for="AWB" class="form-label">AWB</label>
                <input type="text" class="form-control" name="AWB" id="AWB"
                    value="{{ old('AWB', $transaksi->AWB) }}" required>
            </div>

            {{-- Nama Barang --}}
            <div class="mb-3">
                <label for="Nama_Barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="Nama_Barang" id="Nama_Barang"
                    value="{{ old('Nama_Barang', $transaksi->Nama_Barang) }}" required>
            </div>

            {{-- Tujuan --}}
            <div class="mb-3">
                <label for="Tujuan" class="form-label">Tujuan</label>
                <input type="text" class="form-control" name="Tujuan" id="Tujuan"
                    value="{{ old('Tujuan', $transaksi->Tujuan) }}" required>
            </div>

            {{-- Koli --}}
            <div class="mb-3">
                <label for="Koli" class="form-label">Koli</label>
                <input type="number" class="form-control" name="Koli" id="Koli"
                    value="{{ old('Koli', $transaksi->Koli) }}" required>
            </div>

            {{-- Berat --}}
            <div class="mb-3">
                <label for="Berat" class="form-label">Berat (kg)</label>
                <input type="number" step="0.01" class="form-control" name="Berat" id="Berat"
                    value="{{ old('Berat', $transaksi->Berat) }}" required>
            </div>

            {{-- Tarif Pertama --}}
            <div class="mb-3">
                <label for="Tarif_Pertama" class="form-label">Tarif Pertama</label>
                <input type="number" class="form-control" name="Tarif_Pertama" id="Tarif_Pertama"
                    value="{{ old('Tarif_Pertama', $transaksi->Tarif_Pertama) }}" required>
            </div>

            {{-- Tarif Selanjutnya --}}
            <div class="mb-3">
                <label for="Tarif_Selanjutnya" class="form-label">Tarif Selanjutnya</label>
                <input type="number" class="form-control" name="Tarif_Selanjutnya" id="Tarif_Selanjutnya"
                    value="{{ old('Tarif_Selanjutnya', $transaksi->Tarif_Selanjutnya) }}" required>
            </div>

            {{-- Total Tarif --}}
            <div class="mb-3">
                <label for="Total_Tarif" class="form-label">Total Tarif</label>
                <input type="text" class="form-control" id="Total_Tarif_display"
                    value="Rp {{ number_format(old('Total_Tarif', $transaksi->Total_Tarif), 0, ',', '.') }}" readonly>
                <input type="hidden" name="Total_Tarif" value="{{ old('Total_Tarif', $transaksi->Total_Tarif) }}">
            </div>


            <button type="submit" class="btn btn-primary">Update Transaksi</button>
            <a href="{{ route('Transaksi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
