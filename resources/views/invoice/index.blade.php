@extends('layouts.app')

@section('title', 'Pilih Invoice Bulanan')

@section('content')
    <style>
        :root {
            --primary-color: #0c0950;
            --secondary-color: #f8f9fa;
            --accent-color: #4e73df;
        }

        .invoice-selection-container {
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
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
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

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            border: 1px solid #bee5eb;
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
    </style>

    <div class="invoice-selection-container">
        <div class="card">
            <div class="header">
                <h1><i class="fas fa-file-invoice"></i> Pilih Pelanggan untuk Invoice Bulanan</h1>
            </div>

            <div class="filter-section">
                <div class="filter-group">
                    <label for="month">Bulan</label>
                    <select id="month" class="form-control">
                        @php
                            $current = now()->startOfMonth();
                            $start = $current->copy()->subMonths(12);
                            $end = $current->copy()->addMonths(3);

                            while ($start <= $end) {
                                $value = $start->format('Y-m');
                                $label = $start->isoFormat('MMMM Y');
                                $selected = $value === request('month', $current->format('Y-m')) ? 'selected' : '';
                                echo "<option value='$value' $selected>$label</option>";
                                $start->addMonth();
                            }
                        @endphp
                    </select>
                </div>

                <div class="filter-group">
                    <label for="customer-search">Cari Pelanggan</label>
                    <select id="customer-search" class="form-control select2">
                        <option value="">Semua Pelanggan...</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}"
                                {{ request('customer_id') == $customer->id ? 'selected' : '' }}>
                                {{ $customer->Nama }}
                                @if ($customer->No_Telepon)
                                    - {{ $customer->No_Telepon }}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="filter-group" style="align-self: flex-end;">
                    <button class="btn btn-primary" onclick="applyFilters()">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                </div>
            </div>

            @if (request()->has('customer_id') || request()->has('month'))
                <div class="alert alert-info">
                    Filter Aktif:
                    @if (request('customer_id'))
                        <strong>{{ \App\Models\Customer::find(request('customer_id'))->Nama }}</strong> |
                    @endif
                    Bulan:
                    <strong>{{ \Carbon\Carbon::createFromFormat('Y-m', request('month', now()->format('Y-m')))->isoFormat('MMMM Y') }}</strong>
                    <a href="{{ route('Invoice.index') }}" class="float-right" style="color: #dc3545;">
                        <i class="fas fa-times"></i> Hapus Filter
                    </a>
                </div>
            @endif

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
                                    {{ $customer->transactions_count }}
                                </div>
                                <div class="date">
                                    Periode: {{ request('month', now()->format('Y-m')) | date('F Y') }}
                                </div>
                                <a href="{{ route('Invoice.show', [
                                    'customer' => $customer->id,
                                    'month' => request('month', now()->format('Y-m')),
                                ]) }}"
                                    class="btn btn-primary" target="_blank">
                                    <i class="fas fa-file-invoice"></i> Buat Invoice
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Untuk pagination -->
                    <div class="pagination">
                        {{ $customers->appends(request()->query())->links() }}
                    </div>

                    <!-- Untuk dropdown select2 -->
                    <select id="customer-search" class="form-control select2">
                        <option value="">Semua Pelanggan...</option>
                        @foreach ($allCustomers as $customer)
                            <option value="{{ $customer->id }}" {{ $customerId == $customer->id ? 'selected' : '' }}>
                                {{ $customer->Nama }}
                                @if ($customer->No_Telepon)
                                    - {{ $customer->No_Telepon }}
                                @endif
                            </option>
                        @endforeach
                    </select>
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


    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Pilih Pelanggan...",
                allowClear: true
            });
        });

        function applyFilters() {
            const month = document.getElementById('month').value;
            const customerId = document.getElementById('customer-search').value;

            let url = new URL(window.location.href);

            url.searchParams.set('month', month);
            if (customerId) {
                url.searchParams.set('customer_id', customerId);
            } else {
                url.searchParams.delete('customer_id');
            }

            window.location.href = url.toString();
        }
    </script>
@endsection
