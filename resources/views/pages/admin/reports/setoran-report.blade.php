<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Setoran Sampah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        .report-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .report-info {
            margin-bottom: 20px;
        }

        .report-info p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        thead {
            background-color: #f3f4f6;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px 10px;
            text-align: left;
        }

        th {
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .summary {
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .signature-section {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }

        .signature-box {
            width: 45%;
        }

        .signature-line {
            margin-top: 80px;
            border-top: 1px solid #000;
        }

        @media print {
            body {
                padding: 0;
                margin: 10mm;
            }

            button {
                display: none;
            }
        }
    </style>
</head>

<body>
    <button onclick="window.print()"
        style="padding: 8px 16px; background: #ea580c; color: white; border: none; border-radius: 4px; cursor: pointer; margin-bottom: 20px;">
        Print Laporan
    </button>

    <div class="report-header">
        <h1>Laporan Setoran Sampah</h1>
        <p>Periode: {{ date('d/m/Y', strtotime($startDate)) }} - {{ date('d/m/Y', strtotime($endDate)) }}</p>
    </div>

    <div class="report-info">
        <p><strong>Tanggal Cetak:</strong> {{ date('d/m/Y') }}</p>
        <p><strong>Jumlah Setoran:</strong> {{ count($deposits) }} setoran</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Nasabah</th>
                <th>Jenis Sampah</th>
                <th>Berat (KG)</th>
                <th>Harga/KG</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($deposits as $index => $deposit)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $deposit->deposit_date->format('d/m/Y') }}</td>
                    <td>{{ $deposit->user->name }}</td>
                    <td>{{ $deposit->wasteType->name }}</td>
                    <td>{{ number_format($deposit->weight_kg, 2) }}</td>
                    <td class="text-right">Rp {{ number_format($deposit->price_per_kg, 0, ',', '.') }}</td>
                    <td class="text-right">Rp {{ number_format($deposit->total_amount, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center">Tidak ada data setoran</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="summary">
        <table>
            <tr>
                <th>Total Berat</th>
                <td class="text-right">{{ number_format($totalWeight, 2) }} KG</td>
            </tr>
            <tr>
                <th>Total Nilai</th>
                <td class="text-right">Rp {{ number_format($totalAmount, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    <div class="signature-section">
        <div class="signature-box">
            <p>Mengetahui,</p>
            <div class="signature-line"></div>
            <p>Ketua Bank Sampah</p>
        </div>
        <div class="signature-box" style="text-align: right">
            <p>{{ date('d F Y') }}</p>
            <div class="signature-line"></div>
            <p>{{ auth()->user()->name }}</p>
        </div>
    </div>
</body>

</html>
