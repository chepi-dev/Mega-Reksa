@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Data Transaksi</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <form action="{{ route('Transaksi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                <select class="form-control" name="jenis_transaksi" id="jenis_transaksi" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="normal">Normal (tarif pertama + tarif selanjutnya)</option>
                    <option value="tanpa_tarif_pertama">Tanpa Tarif Pertama</option>
                    <option value="manual">Manual (input total langsung)</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="customer_id" class="form-label">Nama Perushaan</label>
                <select class="form-control" name="customer_id" id="customer_id" required>
                    <option value="">-- Pilih Perushaan --</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->Nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="Nama_Customer" class="form-label">Nama_Customer</label>
                <input type="Text" class="form-control" name="Nama_Customer" required>
            </div>

            <div class="mb-3">
                <label for="Tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="Tanggal" required>
            </div>

            <div class="mb-3">
                <label for="AWB" class="form-label">AWB</label>
                <input type="text" class="form-control" name="AWB" required>
            </div>

            <div class="mb-3">
                <label for="Nama_Barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="Nama_Barang" required>
            </div>

            <div class="mb-3">
                <label for="Tujuan" class="form-label">Tujuan</label>
                <input type="text" class="form-control" name="Tujuan" required>
            </div>

            <div class="mb-3">
                <label for="Koli" class="form-label">Jumlah Koli</label>
                <input type="number" class="form-control" name="Koli" required>
            </div>

            <div class="mb-3" id="field-berat" style="display:none">
                <label for="Berat" class="form-label">Berat (Kg)</label>
                <input type="number" step="0.01" class="form-control" name="Berat">
            </div>

            <div class="mb-3" id="field-tarif-pertama" style="display:none">
                <label for="Tarif_Pertama" class="form-label">Tarif Pertama</label>
                <input type="number" class="form-control" name="Tarif_Pertama">
            </div>

            <div class="mb-3" id="field-tarif-selanjutnya" style="display:none">
                <label for="Tarif_Selanjutnya" class="form-label">Tarif Selanjutnya</label>
                <input type="number" class="form-control" name="Tarif_Selanjutnya">
            </div>

            <div class="mb-3" id="field-total-tarif" style="display:none">
                <label for="Total_Tarif" class="form-label">Total Tarif</label>
                <input type="number" class="form-control" name="Total_Tarif">
            </div>



            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('Transaksi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script>
        const jenisTransaksi = document.getElementById('jenis_transaksi');
        const fieldBerat = document.getElementById('field-berat');
        const fieldTarifPertama = document.getElementById('field-tarif-pertama');
        const fieldTarifSelanjutnya = document.getElementById('field-tarif-selanjutnya');
        const fieldTotalTarif = document.getElementById('field-total-tarif');

        jenisTransaksi.addEventListener('change', function() {
            const val = this.value;
            // Sembunyikan semua dulu
            fieldBerat.style.display = 'none';
            fieldTarifPertama.style.display = 'none';
            fieldTarifSelanjutnya.style.display = 'none';
            fieldTotalTarif.style.display = 'none';

            if (val === 'normal') {
                fieldBerat.style.display = 'block';
                fieldTarifPertama.style.display = 'block';
                fieldTarifSelanjutnya.style.display = 'block';
            } else if (val === 'tanpa_tarif_pertama') {
                fieldBerat.style.display = 'block';
                fieldTarifSelanjutnya.style.display = 'block';
            } else if (val === 'manual') {
                fieldTotalTarif.style.display = 'block';
            }
        });
    </script>


@endsection
