@extends('layouts.app')

@section('title', 'Daftar Rekapan Bulanan')

@section('content')

    <style>
        :root {
            --primary-color: #0c0950;
            --secondary-color: #f8f9fa;
            --accent-color: #4e73df;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        .header {
            background: var(--primary-color);
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            margin-bottom: 0;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .filter-section {
            padding: 20px;
            background: var(--secondary-color);
            border-bottom: 1px solid #ddd;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: var(--primary-color);
        }

        .filter-group select,
        .filter-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .customer-list {
            padding: 20px;
        }

        .customer-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .customer-card:hover {
            background-color: #f9f9f9;
        }

        .customer-info h3 {
            margin: 0 0 5px 0;
            color: var(--primary-color);
        }

        .customer-info p {
            margin: 0;
            color: #666;
            font-size: 14px;
        }

        .transaction-summary {
            text-align: right;
        }

        .transaction-summary .count {
            font-weight: 600;
            color: var(--primary-color);
        }

        .transaction-summary .date {
            font-size: 12px;
            color: #888;
        }

        .btn {
            padding: 8px 20px;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
            background-color: var(--primary-color);
            color: white;
        }

        .btn:hover {
            background-color: #07063a;
            transform: translateY(-2px);
        }

        .btn i {
            margin-right: 5px;
        }

        .no-customers {
            text-align: center;
            padding: 40px;
            color: #666;
        }

        .pagination {
            display: flex;
            justify-content: center;
            padding: 20px;
            list-style: none;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination a {
            display: block;
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            color: var(--primary-color);
            text-decoration: none;
        }

        .pagination a.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .filter-section {
                flex-direction: column;
                gap: 10px;
            }

            .customer-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .transaction-summary {
                text-align: left;
                width: 100%;
            }
        }

        .select2-container--default .select2-selection--single {
            height: 38px;
            padding: 6px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 36px;
        }
    </style>

    <body>
        <div class="container">
            <div class="card">
                <div class="header">
                    <h1><i class="fas fa-users"></i> Pilih Pelanggan untuk Rekapan</h1>
                </div>

                <div class="filter-section">
                    <div class="filter-group">
                        <label for="month">Bulan</label>
                        <select id="month" class="form-control">
                            @php
                                $future = now()->startOfMonth()->copy()->addMonths(6);
                                $past = now()->startOfMonth()->copy()->subMonths(18);
                                $date = $past;

                                while ($date <= $future) {
                                    $value = $date->format('Y-m');
                                    $label = $date->isoFormat('MMMM Y');
                                    $selected = $value === $selectedMonth ? 'selected' : '';
                                    echo "<option value='$value' $selected>$label</option>";
                                    $date->addMonth();
                                }

                            @endphp
                        </select>
                    </div>

                    <div class="filter-group">
                        <label for="customer-search">Cari Pelanggan</label>
                        <select id="customer-search" class="form-control select2">
                            <option value="">Pilih PT/Customer...</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">
                                    {{ $customer->Nama }}
                                    @if ($customer->No_Telepon)
                                        - {{ $customer->No_Telepon }}
                                    @endif
                                    @if ($customer->Alamat)
                                        ({{ Str::limit($customer->Alamat, 20) }})
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-group" style="align-self: flex-end;">
                        <button class="btn" onclick="applyFilters()">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>

                    <!-- Tambahkan ini di bagian atas setelah filter section -->
                    @if ($customerId)
                        <div class="alert alert-info mt-3">
                            Filter Aktif:
                            <strong>{{ \App\Models\Customer::find($customerId)->Nama }}</strong> |
                            Bulan: <strong>{{ \Carbon\Carbon::parse($selectedMonth)->isoFormat('MMMM Y') }}</strong>
                            <a href="{{ route('Summaries.index') }}" class="float-right text-danger">
                                <i class="fas fa-times"></i> Hapus Filter
                            </a>
                        </div>
                    @endif
                </div>

                <div class="customer-list">
                    @if ($customers->count() > 0)
                        @foreach ($customers as $customer)
                            <div class="customer-card">
                                <div class="customer-info">
                                    <h3>{{ $customer->Nama }}</h3>
                                    <p>{{ $customer->Alamat }}</p>
                                    <p>Telp: {{ $customer->No_Telepon }}</p>
                                </div>

                                <div class="transaction-summary">
                                    <div class="count">
                                        {{ $customer->transactions_count }} transaksi
                                    </div>
                                    <div class="date">
                                        Terakhir:
                                        {{ $customer->last_transaction_date ? \Carbon\Carbon::parse($customer->last_transaction_date)->format('d M Y') : '-' }}
                                    </div>
                                    <form action="{{ route('Summaries.show', ['customer_id' => $customer->id]) }}"
                                        method="GET">
                                        <input type="hidden" name="month" value="{{ $selectedMonth }}">
                                        <button type="submit" class="btn">
                                            <i class="fas fa-file-invoice"></i> Buat Rekapan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                        <div class="pagination">
                            {{ $customers->withQueryString()->links() }}
                        </div>
                    @else
                        <div class="no-customers">
                            <i class="fas fa-user-slash" style="font-size: 50px; margin-bottom: 15px;"></i>
                            <h3>Tidak ada pelanggan ditemukan</h3>
                            <p>Silakan coba dengan filter yang berbeda</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Font Awesome for icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <script>
            function applyFilters() {
                const month = document.getElementById('month').value;
                const customerId = document.getElementById('customer-search').value;

                // Debugging
                console.log('Applying filters:', {
                    month,
                    customerId
                });

                // Build URL
                const url = new URL(window.location.href);
                url.searchParams.set('month', month);
                if (customerId) {
                    url.searchParams.set('customer_id', customerId);
                } else {
                    url.searchParams.delete('customer_id');
                }

                window.location.href = url.toString();
            }
            console.log('Bulan yang dipilih:', document.getElementById('month').value);
        </script>
    </body>
@endsection
