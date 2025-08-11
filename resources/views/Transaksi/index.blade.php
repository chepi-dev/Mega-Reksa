@extends('layouts.app')

@section('title', 'Daftar Customer')

@section('content')

    <style>
        /* Tambahkan style ini di head atau file CSS terpisah */
        .compact-table {
            font-size: 12px;
        }

        .compact-table th,
        .compact-table td {
            padding: 6px 8px;
            white-space: nowrap;
        }

        .compact-table .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }

        .compact-table .table-actions {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 4px;
            min-width: 200px;
        }

        .compact-table .table-actions .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }
    </style>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('Transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

    <h2>Daftar Customer</h2>
    <table class="table table-bordered table-striped compact-table">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Perusahaan</th>
                <th>Customer</th>
                <th>AWB</th>
                <th>Barang</th>
                <th>Tujuan</th>
                <th>Koli</th>
                <th>Berat</th>
                <th>Tarif 1</th>
                <th>Tarif 2</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $index => $t)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($t->Tanggal)->format('d/m/y') }}</td>
                    <td>{{ Str::limit($t->Customer->Nama, 15) }}</td>
                    <td>{{ Str::limit($t->Nama_Customer, 15) }}</td>
                    <td>{{ $t->AWB }}</td>
                    <td>{{ Str::limit($t->Nama_Barang, 15) }}</td>
                    <td>{{ Str::limit($t->Tujuan, 15) }}</td>
                    <td>{{ $t->Koli }}</td>
                    <td>{{ number_format($t->Berat, 0, ',', '.') }}kg</td>
                    <td>@rupiah($t->Tarif_Pertama)</td>
                    <td>@rupiah($t->Tarif_Selanjutnya)</td>
                    <td>@rupiah($t->Total_Tarif)</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('Transaksi.edit', $t->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>Edit
                            </a>
                            {{-- <a href="{{ route('Transaksi.invoice', $t->id) }}" class="btn btn-sm btn-secondary"
                                target="_blank" title="Invoice">
                                <i class="fas fa-file-invoice"></i>Invoice
                            </a> --}}
                            <form action="{{ route('Transaksi.destroy', $t->id) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                    class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
