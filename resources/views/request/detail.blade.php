@extends('layouts')

@section('title', 'Detail Permintaan Tembaga')

@section('content')
    <div class="container-fluid p-5" style="background: linear-gradient(to right, #eef2f3, #8e9eab);">
        <!-- Action Buttons Card -->
        <div class="container bg-white shadow-lg rounded p-3 mb-4 d-flex justify-content-between align-items-center"
            style="border-radius: 12px;">
            <a href="{{ url()->previous() }}" class="btn btn-secondary rounded-pill px-4 py-2">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
            
            @if ($request->status == 'Sudah disetujui')
                <a href="{{ route('request.print', $request->id) }}" target="_blank"
                    class="btn btn-primary rounded-pill px-4 py-2">
                    <i class="bi bi-printer"></i> Cetak Bon
                </a>
            @endif

        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container bg-white shadow-lg rounded p-4" style="border-radius: 12px;">
            <!-- Header -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <img src="{{ asset('images/detailPotongLeft.png') }}" alt="Logo" class="me-3" style="height: 60px;">
                <div class="text-center">
                    <h3 class="fw-bold text-primary mb-0">DAFTAR POTONG TEMBAGA</h3>
                    <p class="text-muted">SMP/F/PROD/24 (Rev: 00 / 10 Februari 2020)</p>
                </div>
                <img src="{{ asset('images/detailPotongRight.png') }}" alt="Logo" class="me-3" style="height: 60px;">
            </div>

            <!-- Details Section -->
            <div class="row mb-4" style="font-size: 0.875rem;">
                <div class="col-md-8">
                    <p>Kepada Yth : <b>Production Manager</b></p>
                    <p>Untuk memproduksi barang-barang sebagai berikut:</p>
                    <p>Proyek : <b>{{ $request->project_name }}</b></p>
                    <p>Jenis barang yang diproduksi sebagai berikut:</p>
                </div>
                <div class="col-md-4 text-end">
                    <p>Kode Produksi: <span class="badge bg-primary px-3 py-2 fs-6">{{ $request->production_code }}</span>
                    </p>
                    <p><span class="badge bg-warning text-dark px-3 py-2 fs-6">{{ $request->project_code }}</span></p>
                </div>
            </div>

            <!-- Add Panel Button -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold">Daftar Barang</h5>

            </div>
            <!-- Table -->
            <table class="table table-hover table-bordered text-center shadow-sm">
                <thead class="table-primary">
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
                        <tr class="fw-bold bg-light">
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
                            <td colspan="7" class="text-center text-muted">Belum ada detail yang ditambahkan</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <!-- Summary Table -->
            <div class="mt-5">
                <h5 class="fw-bold">Total Permintaan</h5>
                <table class="table table-bordered text-center shadow-sm">
                    <thead class="table-secondary">
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
            </div>

            <!-- Date Section -->
            <div class="text-start mt-4">
                <p><b>Tanggal: </b> {{ \Carbon\Carbon::parse($request->production_date)->format('d M Y') }}</p>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
