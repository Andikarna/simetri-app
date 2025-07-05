<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bon - {{ $request->production_code }}</title>
    <style>
 
        .footer {
            width: 100%;
            margin-top: 60px;
            text-align: end;
            padding: 0 40px;
        }

        .signature {
            width: 200px;
            text-align: center;
        }

        .signature p {
            margin-bottom: 60px;
        }

        .signature div {
            border-top: 1px solid #000;
            width: 100%;
        }

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

        @media print {
            @page {
                margin: 10mm;
            }
        }
    </style>
</head>

<body>

    {{-- <table style="width: 100%; margin-bottom: 20px; border: none;">
        <tr>
            <td style="width: 25%; text-align: left;">
                <img src="{{ public_path('images/detailPotongLeft.png') }}" style="width: 80px;">
            </td>
            <td style="width: 50%; text-align: center;">
                <h2 style="margin: 0;">Daftar Potong Tembaga</h2>
            </td>
            <td style="width: 25%; text-align: right;">
                <img src="{{ public_path('images/detailPotongRight.png') }}" style="width: 80px;">
            </td>
        </tr>
    </table> --}}

    <div class="header">
        <img src="{{ public_path('images/detailPotongLeft.png') }}" height="50" style="float: left;">
        <img src="{{ public_path('images/detailPotongRight.png') }}" height="50" style="float: right;">
        <div class="title">HASIL POTONG TEMBAGA</div>
    </div>


    <div>
        <p></p>
        <p>Kode Produksi: {{ $request->production_code }}</p>
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($request->production_date)->format('d M Y') }}</p>
    </div>


    <h4>Daftar Barang</h4>
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
                <tr>
                    <td>1</td>
                    <td colspan="6">{{ $detail->first()->panel_name_utama }}</td>
                </tr>
                @foreach ($detail as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
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
                    <td colspan="7" class="text-center text-muted">Belum ada detail yang ditambahkan</td>
                </tr>
            @endif
        </tbody>
    </table>

    <h4>Total Permintaan</h4>
    <table>
        <thead>
            <tr>
                <th>Ukuran CU</th>
                <th>Total Quantity</th>
                <th>Total Panjang</th>
            </tr>
        </thead>
        <tbody>
            @if ($detail->isNotEmpty())
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
            @else
                <tr>
                    <td colspan="3" class="text-center text-muted">Belum ada data untuk dirangkum</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="footer">
        <div class="signature">
            <p>Dibuat oleh,</p>
            <div>{{ $username }}</div>
        </div>
    </div>
</body>

</html>
