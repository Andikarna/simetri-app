<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Bon - {{ $request->production_code }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #e3e3e3;
        }

        .header,
        .footer {
            text-align: center;
            margin-bottom: 15px;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .sub-title {
            font-size: 12px;
            margin-bottom: 20px;
        }

        .info {
            margin-bottom: 10px;
        }

        @media print {
            @page {
                margin: 10mm;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="header">
        <img src="{{ public_path('images/detailPotongLeft.png') }}" height="50" style="float: left;">
        <img src="{{ public_path('images/detailPotongRight.png') }}" height="50" style="float: right;">
        <div class="title">DAFTAR POTONG TEMBAGA</div>
        <div class="sub-title">SMP/F/PROD/24 (Rev: 00 / 10 Februari 2020)</div>

    </div>

    <div class="info">
        <p><b>Kepada Yth:</b> Production Manager</p>
        <p>Untuk memproduksi barang-barang sebagai berikut:</p>
        <p>Proyek: <b>{{ $request->project_name }}</b></p>
    </div>

    <!-- Tabel Detail Potong -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Panel</th>
                <th>Type</th>
                <th>Ukuran CU</th>
                <th>Panjang (mm)</th>
                <th>Quantity</th>
                <th>Jumlah Panjang</th>
            </tr>
        </thead>
        <tbody>
            @if ($detail->isNotEmpty())
                <tr style="background-color:#f7f7f7; font-weight:bold;">
                    <td>1</td>
                    <td colspan="6">{{ $detail->first()->panel_name_utama }}</td>
                </tr>
                @foreach ($detail as $item)
                    <tr>
                        <td></td>
                        <td>{{ $item->panel_name }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->dimension }}</td>
                        <td>{{ $item->length }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->total_length }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7">Tidak ada data</td>
                </tr>
            @endif
        </tbody>
    </table>

    <!-- Ringkasan Total Permintaan -->
    <h4 style="margin-top:30px;">Total Permintaan</h4>
    <table>
        <thead>
            <tr>
                <th>Ukuran CU</th>
                <th>Total Panjang</th>
                <th>Sisa Panjang</th>
            </tr>
        </thead>
        <tbody>
            @php
                $summary = $detail->groupBy('dimension')->map(function ($items) {
                    return [
                        'total_quantity' => $items->sum('quantity'),
                        'total_length' => $items->sum('total_length'),
                    ];
                });
            @endphp
            @foreach ($summary as $dimension => $totals)
                <tr>
                    <td>{{ $dimension }}</td>
                    <td>{{ $totals['total_quantity'] }}</td>
                    <td>{{ $totals['total_length'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Cutting Record -->
    <h4 style="margin-top:30px;">Total Pemotongan dari Cutting Record</h4>
    @php
        $cuttingRecords = \App\Models\CuttingRecord::where('copper_cutting_id', $request->id)->get()->groupBy('ukuran');

        $cuttingSummary = $cuttingRecords->map(function ($items) {
            return [
                'total_cut_quantity' => $items->sum('quantity'),
                'total_cut_length' => 4000 - $items->sum('quantity'), // sesuaikan rumus jika perlu
            ];
        });
    @endphp
    <table>
        <thead>
            <tr>
                <th>Ukuran CU</th>
                <th>Total Quantity Dipotong</th>
                <th>Total Panjang Dipotong</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cuttingSummary as $dimension => $totals)
                <tr>
                    <td>{{ $dimension }}</td>
                    <td>{{ $totals['total_cut_quantity'] }}</td>
                    <td>{{ $totals['total_cut_length'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 30px;"><b>Tanggal:</b>
        {{ \Carbon\Carbon::parse($request->production_date)->format('d M Y') }}</p>

    <br><br>
    <table style="width: 100%; margin-top: 50px; text-align: center; border: none;">
        <tr>
            <td style="width: 30%">
                <p>Diterima Oleh,</p>
                <br><br><br>
                <u><b>_________________</b></u><br>
                <span style="font-size: 11px;">(WAREHOUSE)</span>
            </td>
            <td style="width: 30%">
                <p>Disetujui Oleh,</p>
                <br><br><br>
                <u><b>{{ auth()->user()->name ?? '_________________' }}</b></u><br>
                <span style="font-size: 11px;">PPIC SPV)</span>
            </td>
            <td style="width: 30%">
                <p>Dibuat Oleh,</p>
                <br><br><br>
                <u><b>_________________</b></u><br>
                <span style="font-size: 11px;">(PPIC)</span>
            </td>
        </tr>
    </table>

</body>

</html>
