@extends('layouts')

@section('title', 'Detail Potong Tembaga')

@section('content')
    <div class="container-fluid p-5" style="background: linear-gradient(to right, #eef2f3, #8e9eab);">

        <!-- Header Buttons -->
        <div class="container bg-white shadow-lg rounded p-3 mb-4 d-flex justify-content-between align-items-center"
            style="border-radius: 12px;">
            <a href="{{ url()->previous() }}" class="btn btn-secondary rounded-pill px-4 py-2">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
            <a href="{{ route('request.add', $request->id) }}" target="_blank" class="btn btn-primary rounded-pill px-4 py-2">
                <i class="bi bi-printer"></i> Cetak Bon
            </a>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Main Content -->
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

            <!-- Summary Table -->
            <div class="mt-5">
                <h5 class="fw-bold">Total Permintaan</h5>

                <form action="{{ route('cutting.approve', $request->id) }}" method="POST">
                    @csrf
                    <table class="table table-bordered text-center shadow-sm">
                        <thead class="table-secondary">
                            <tr>
                                <th>Ukuran CU</th>
                                <th>Total Quantity</th>
                                <th>Total Panjang</th>
                                <th>Ambil Stok</th>
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
                                    @php
                                        $stokUtuh = DB::table('utuh_produk')->where('ukuran', $dimension) ->where('quantity', '>', 0)->get();
                                        $stokPotong = DB::table('stok_produk')->where('ukuran', $dimension)->get();
                                    @endphp
                                    <tr>
                                        <td>{{ $dimension }}</td>
                                        <td>{{ $totals['total_quantity'] }}</td>
                                        <td>{{ $totals['total_length'] }}</td>
                                        <td>
                                            @if ($stokUtuh->isEmpty() && $stokPotong->isEmpty())
                                                <span class="text-danger">Stok tidak tersedia untuk ukuran
                                                    {{ $dimension }}</span>
                                            @else
                                                <div class="d-flex flex-column gap-3">
                                                    <!-- Stok Utuh -->
                                                    @if (!$stokUtuh->isEmpty())
                                                        <div class="border border-success p-2 rounded"
                                                            style="background-color: #e9f7ef;">
                                                            <strong>Stok Utuh</strong>
                                                            <select class="form-select mt-1"
                                                                name="stok_utuh[{{ $dimension }}]">
                                                                <option value="">Pilih Stok Utuh</option>
                                                                @foreach ($stokUtuh as $utuh)
                                                                    <option value="{{ $totals['total_length'] }}">
                                                                        {{ $utuh->ukuran }} ({{ $utuh->quantity }} barang)
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endif

                                                    <!-- Stok Potong -->
                                                    @if (!$stokPotong->isEmpty())
                                                        <div class="border border-warning p-2 rounded"
                                                            style="background-color: #fff3cd;">
                                                            <strong>Stok Potong</strong>
                                                            <select class="form-select mt-1"
                                                                name="stok_potong[{{ $dimension }}]">
                                                                <option value="">Pilih Stok Potong</option>
                                                                @foreach ($stokPotong as $potong)
                                                                    <option value="{{ $totals['total_length'] }}">
                                                                        {{ $potong->ukuran }}
                                                                        ({{ $potong->total_panjang }} mm)
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada data untuk dirangkum</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    @if ($request->status != 'Sudah disetujui')
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-success rounded-pill px-4 py-2">
                                <i class="bi bi-check-circle"></i> Setuju
                            </button>
                        </div>
                    @endif
                    
                </form>

            </div>

            <!-- Approval Buttons -->
            {{-- <div class="d-flex justify-content-end gap-3 mt-4">
                <form action="{{ route('cutting.approve', $request->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success rounded-pill px-4 py-2">
                        <i class="bi bi-check-circle"></i> Setuju
                    </button>
                </form>
                <form action="{{ route('request.add', $request->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger rounded-pill px-4 py-2">
                        <i class="bi bi-x-circle"></i> Tolak
                    </button>
                </form>
            </div> --}}


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
