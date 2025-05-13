<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penarikan Saldo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .total-section {
            margin-top: 20px;
            text-align: right;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }

        @media print {
            @page {
                margin: 1.5cm;
            }

            body {
                padding: 0;
            }

            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Laporan Penarikan Saldo</h1>
            <p>Periode: {{ \Carbon\Carbon::parse($startDate)->format('d-m-Y') }} sampai
                {{ \Carbon\Carbon::parse($endDate)->format('d-m-Y') }}</p>
            <p>Bank Sampah</p>
        </div>

        <div class="info-row">
            <p>Tanggal Cetak: {{ now()->format('d-m-Y H:i') }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Nasabah</th>
                    <th>Total Belanja</th>
                    <th>Dari Saldo</th>
                    <th>Tunai</th>
                    <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($withdrawals as $index => $withdrawal)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $withdrawal->withdrawal_date->format('d-m-Y') }}</td>
                        <td>{{ $withdrawal->user->name }}</td>
                        <td>Rp {{ number_format($withdrawal->total_amount, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($withdrawal->amount, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($withdrawal->cash_amount, 0, ',', '.') }}</td>
                        <td>{{ $withdrawal->processor->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center;">Tidak ada data penarikan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="total-section">
            <p><strong>Total Penarikan dari Saldo:</strong> Rp {{ number_format($totalAmount, 0, ',', '.') }}</p>
            <p><strong>Total Pembayaran Tunai:</strong> Rp {{ number_format($totalCashAmount, 0, ',', '.') }}</p>
            <p><strong>Total Keseluruhan:</strong> Rp {{ number_format($totalAmount + $totalCashAmount, 0, ',', '.') }}
            </p>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} Bank Sampah - Laporan Penarikan Saldo</p>
        </div>

        <div class="no-print" style="text-align: center; margin-top: 30px;">
            <button onclick="window.print()"
                style="padding: 10px 20px; background: #f0ad4e; border: none; border-radius: 4px; color: white; cursor: pointer;">
                Cetak Laporan
            </button>
            <button onclick="window.close()"
                style="padding: 10px 20px; background: #6c757d; border: none; border-radius: 4px; color: white; cursor: pointer; margin-left: 10px;">
                Tutup
            </button>
        </div>
    </div>

    <script>
        window.onload = function() {
            // Auto print when the page loads
            setTimeout(function() {
                window.print();
            }, 500);
        };
    </script>
</body>

</html>
