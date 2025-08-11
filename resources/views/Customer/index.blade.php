@extends('layouts.app')

@section('content')
    <h1>Daftar Customer</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('Customer.create') }}" class="btn btn-primary mb-3">Tambah Customer</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Perusahaan</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $index => $c)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $c->Nama }}</td>
                    <td>{{ $c->No_Telepon }}</td>
                    <td>{{ $c->Alamat }}</td>
                    <td>
                        <a href="{{ route('Customer.edit', $c->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('Customer.destroy', $c->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
