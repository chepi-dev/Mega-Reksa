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
                <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                <select class="form-control" name="jenis_transaksi" id="jenis_transaksi" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="normal" {{ $transaksi->jenis_transaksi == 'normal' ? 'selected' : '' }}>Normal (tarif
                        pertama + tarif selanjutnya)</option>
                    <option value="tanpa_tarif_pertama"
                        {{ $transaksi->jenis_transaksi == 'tanpa_tarif_pertama' ? 'selected' : '' }}>Tanpa Tarif Pertama
                    </option>
                    <option value="manual" {{ $transaksi->jenis_transaksi == 'manual' ? 'selected' : '' }}>Manual (input
                        total langsung)</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="customer_id" class="form-label">Nama Perushaan</label>
                <select class="form-control" name="customer_id" id="customer_id" required>
                    <option value="">-- Pilih Perushaan --</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}"
                            {{ $transaksi->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->Nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="Nama_Customer" class="form-label">Nama Customer</label>
                <input type="Text" class="form-control" name="Nama_Customer" value="{{ $transaksi->Nama_Customer }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="Tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="Tanggal"
                    value="{{ \Carbon\Carbon::parse($transaksi->Tanggal)->format('Y-m-d') }}" required> required>
            </div>

            <div class="mb-3">
                <label for="AWB" class="form-label">AWB</label>
                <input type="text" class="form-control" name="AWB" value="{{ $transaksi->AWB }}" required>
            </div>

            <div class="mb-3">
                <label for="Nama_Barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="Nama_Barang" value="{{ $transaksi->Nama_Barang }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="Tujuan" class="form-label">Tujuan</label>
                <input type="text" class="form-control" name="Tujuan" value="{{ $transaksi->Tujuan }}" required>
            </div>

            <div class="mb-3">
                <label for="Koli" class="form-label">Jumlah Koli</label>
                <input type="number" class="form-control" name="Koli" value="{{ $transaksi->Koli }}" required>
            </div>

            <div class="mb-3" id="field-berat"
                style="display:{{ in_array($transaksi->jenis_transaksi, ['normal', 'tanpa_tarif_pertama']) ? 'block' : 'none' }}">
                <label for="Berat" class="form-label">Berat (Kg)</label>
                <input type="number" step="0.01" class="form-control" name="Berat" value="{{ $transaksi->Berat }}">
            </div>

            <div class="mb-3" id="field-tarif-pertama"
                style="display:{{ $transaksi->jenis_transaksi == 'normal' ? 'block' : 'none' }}">
                <label for="Tarif_Pertama" class="form-label">Tarif Pertama</label>
                <input type="number" class="form-control" name="Tarif_Pertama" value="{{ $transaksi->Tarif_Pertama }}">
            </div>

            <div class="mb-3" id="field-tarif-selanjutnya"
                style="display:{{ in_array($transaksi->jenis_transaksi, ['normal', 'tanpa_tarif_pertama']) ? 'block' : 'none' }}">
                <label for="Tarif_Selanjutnya" class="form-label">Tarif Selanjutnya</label>
                <input type="number" class="form-control" name="Tarif_Selanjutnya"
                    value="{{ $transaksi->Tarif_Selanjutnya }}">
            </div>

            <div class="mb-3" id="field-total-tarif"
                style="display:{{ $transaksi->jenis_transaksi == 'manual' ? 'block' : 'none' }}">
                <label for="Total_Tarif" class="form-label">Total Tarif</label>
                <input type="number" class="form-control" name="Total_Tarif" value="{{ $transaksi->Total_Tarif }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('Transaksi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

    </div>
    <script>
        // Sama seperti di form create
        document.getElementById('jenis_transaksi').addEventListener('change', function() {
            const jenisTransaksi = this.value;

            // Sembunyikan semua field terlebih dahulu
            document.getElementById('field-berat').style.display = 'none';
            document.getElementById('field-tarif-pertama').style.display = 'none';
            document.getElementById('field-tarif-selanjutnya').style.display = 'none';
            document.getElementById('field-total-tarif').style.display = 'none';

            // Tampilkan field yang sesuai dengan jenis transaksi
            if (jenisTransaksi === 'normal') {
                document.getElementById('field-berat').style.display = 'block';
                document.getElementById('field-tarif-pertama').style.display = 'block';
                document.getElementById('field-tarif-selanjutnya').style.display = 'block';
            } else if (jenisTransaksi === 'tanpa_tarif_pertama') {
                document.getElementById('field-berat').style.display = 'block';
                document.getElementById('field-tarif-selanjutnya').style.display = 'block';
            } else if (jenisTransaksi === 'manual') {
                document.getElementById('field-total-tarif').style.display = 'block';
            }
        });
    </script>
@endsection
