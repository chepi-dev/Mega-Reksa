<!DOCTYPE html>
<html>

<head>
    <title>REKAPAN BULANAN - MEGA REKSA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            color: #333;
            font-size: 10px;
        }

        .Rekapan {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 15px;
            font-size: 9px;
        }

        .header {
            text-align: left;
            margin-bottom: 10px;
        }

        .header img {
            max-width: 100px;
            margin-bottom: 5px;
        }

        .Rekapan-title {
            margin-top: 0;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .divider {
            border-top: 1px solid #eee;
            margin: 10px 0;
        }

        .section {
            margin-bottom: 10px;
            text-align: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px 0;
            font-size: 9px;
        }

        th,
        td {
            border: 1px solid #000000;
            padding: 4px;
            text-align: left;
            line-height: 1.2;
        }

        th {
            background-color: #f5f5f5;
            padding: 4px;
        }

        .text-right {
            text-align: right;
        }

        .total-box {
            margin-top: 10px;
            padding: 8px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }

        .footer {
            margin-top: 15px;
            font-size: 8px;
            text-align: center;
            color: #777;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                padding: 0;
                font-size: 9px;
            }

            .Rekapan {
                border: none;
                padding: 10px;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }
    </style>
</head>

<body>
    <div class="Rekapan">
        <!-- Header dengan logo -->
        <div class="header">
            <img src="{{ asset('img/invoices/logo.jpg') }}" alt="Mega Reksa Logo" style="margin-bottom: 20px">
            <h1 class="Rekapan-title">REKAPAN PENGIRIMAN</h1>
            <h3 style="font-size: 11px; margin: 5px 0;">{{ $customer->Nama }}</h3>
            <p><strong>Periode:</strong> {{ \Carbon\Carbon::parse($month)->format('F Y') }}</p>
        </div>

        <div class="divider"></div>

        <!-- Detail Transaksi -->
        <div class="section">
            <table class="table">
                <thead>
                    <tr>
                        <th width="8%">TANGGAL</th>
                        <th width="15%">NAMA BARANG</th>
                        <th width="6%">AWB</th>
                        <th width="15%">TUJUAN</th>
                        <th width="5%">KOLI</th>
                        <th width="8%">BERAT (Kg)</th>
                        <th width="15%">TARIF 5/KG PERTAMA</th>
                        <th width="15%">TARIF KG SELANJUTNYA</th>
                        <th width="15%">TOTAL HARGA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaksi)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($transaksi->Tanggal)->format('d/m/Y') }}</td>
                            <td>{{ $transaksi->Nama_Barang }}</td>
                            <td>{{ $transaksi->AWB }}</td>
                            <td>{{ $transaksi->Tujuan }}</td>
                            <td>{{ $transaksi->Koli }}</td>
                            <td>{{ number_format($transaksi->Berat, 0, ',', '.') }}</td>
                            <td class="text-right">Rp {{ number_format($transaksi->Tarif_Pertama, 0, ',', '.') }}</td>
                            <td class="text-right">Rp {{ number_format($transaksi->Tarif_Selanjutnya, 0, ',', '.') }}
                            </td>
                            <td class="text-right">Rp {{ number_format($transaksi->Total_Tarif, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8" class="text-right"><strong>TOTAL</strong></td>
                        <td class="text-right"><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="footer">
            <p>Terima kasih telah menggunakan layanan Mega Reksa</p>
            <p>Dokumen ini sah sebagai bukti rekapan transaksi bulanan</p>
        </div>
    </div>

    <button class="no-print" onclick="window.print()"
        style="margin: 10px auto; display: block; padding: 5px 10px; background: #0c0950; color: white; border: none; cursor: pointer; border-radius: 4px; font-size: 10px;">
        Cetak Rekapan
    </button>

    <script>
        // Auto print jika parameter print=1 ada di URL
        if (window.location.search.includes('print=1')) {
            window.print();
        }
    </script>
</body>

</html>
