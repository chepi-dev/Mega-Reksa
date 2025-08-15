<!DOCTYPE html>
<html>

<head>
    <title>INVOICE - MEGA REKSA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
            background-color: #f9f9f9;
        }

        .invoice {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000;
            padding: 10px 0;
        }

        .invoice-header .left,
        .invoice-header .center,
        .invoice-header .right {
            flex: 1;
            text-align: right;
        }

        .invoice-header .left {
            text-align: left;
        }

        .invoice-header .right {
            text-align: right;
        }

        .invoice-header .logo {
            max-height: 60px;
        }


        .left-title h1 {
            font-size: 36px;
            color: #0C0950;
            margin: 0;
        }

        .right-info {
            text-align: right;
        }

        .right-info img {
            height: 60px;
            margin-bottom: 10px;
        }

        .customer-info {
            margin-bottom: 20px;
        }

        .customer-info h2 {
            font-size: 16px;
            margin-bottom: 10px;
            color: #0C0950;
        }

        .customer-info p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .total-section {
            text-align: right;
            margin-top: 20px;
        }

        .total-amount {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        .bank-info {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
        }

        @media print {
            body {
                padding: 0;
                background: white;
            }

            .no-print {
                display: none;
            }

            .invoice {
                box-shadow: none;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="invoice">
        <!-- Header -->
        <div class="invoice-header">
            <div class="left">
                <h2>INVOICE</h2>
            </div>
            <div class="center">
                {{-- <p>Casa d' Grande Blok B-29, Jl. Cisaranten Kulon Bandung</p>
                <p>Phone: (022) 76765020</p>
                <p>Email: megarekasa.bandung@gmail.com</p> --}}
            </div>
            <div class="right">
                <img src="{{ asset('img/invoices/logo.jpg') }}" alt="Logo" class="logo">
            </div>
        </div>

        <div class="divider"></div>

        <!-- Periode -->
        <table style="width: 100%; margin-bottom: 20px; margin-top: 40px;">
            <tr>
                <td style="vertical-align: top; width: 50%;">
                    <strong>Kepada:</strong><br>
                    <strong>{{ $customer->Nama }}</strong><br><br>
                    {{ $customer->Alamat ?? 'Alamat tidak tersedia' }}
                </td>
                <td style="width: 25%;"></td>
                <td style="vertical-align: top; width: 25%;">
                    <strong>Tanggal:</strong><br>
                    {{ now()->format('d-m-Y') }}<br><br>
                    <strong>No Invoice:</strong><br><i>
                        I-{{ $customer->id }}/MR/BDG/VI/2025
                    </i>
                </td>
            </tr>
        </table>


        <div class="divider"></div>

        <!-- Transaction Total -->
        <table>
            <thead>
                <tr>
                    <th>TOTAL TRANSAKSI</th>
                    <th style="text-align: right">@rupiah($total)</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <!-- Terbilang -->
        <div class="total-section">
            <p><em>{{ $terbilang }}</em></p>
        </div>

        <table style="width: 100%; margin-top: 30px;">
            <tr>
                <td style="vertical-align: top; width: 33%;">
                    <p><strong>PEMBAYARAN</strong></p>
                    <p>NAMA: ROCHMAN YUDHOSWASONOSWASONO</p>
                    <p>BANK Central AsiaNo Rek: 4531213305</p>
                </td>
                <td style="width: 20%;"></td>
                <td style="vertical-align: top; text-align: right; width: 33%;">
                    <p>Bandung, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                    <br><br>
                    <p>ROCHMAN YUDHOSWASONO</p>
                </td>
            </tr>
        </table>


        <!-- Print Button -->
        <div class="no-print" style="text-align: center; margin-top: 20px;">
            <button onclick="window.print()"
                style="padding: 10px 20px; background: #0c0950; color: white; border: none; cursor: pointer; border-radius: 4px;">
                Cetak Invoice
            </button>
        </div>
</body>

</html>
