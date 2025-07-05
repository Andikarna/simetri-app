@extends('layouts')

@section('title', 'Produk Tembaga')

@section('content')
    <style>
        /* Custom styles */
        .nav-tabs .nav-link {
            font-weight: 600;
            font-size: 1.05rem;
            color: #495057;
            transition: color 0.3s ease;
        }

        .nav-tabs .nav-link.active {
            color: #0d6efd;
            border-bottom: 3px solid #0d6efd;
        }

        .table thead {
            background-color: #f8f9fa;
        }

        .btn-detail {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        /* Pagination center and spacing */
        .pagination {
            justify-content: center;
            margin-top: 1rem;
        }
    </style>

    <div class="container-fluid p-5">
        <div class="card shadow-sm">
            <div class="card-header bg-white" style="display: flex; justify-content: space-between; align-items: center;">
                <ul class="nav nav-tabs card-header-tabs" id="productTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="stok-produk-tab" data-bs-toggle="tab"
                            data-bs-target="#stok-produk" type="button" role="tab" aria-controls="stok-produk"
                            aria-selected="true">
                            Stok Potong
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="stok-utuh-produk-tab" data-bs-toggle="tab"
                            data-bs-target="#stok-utuh-produk" type="button" role="tab"
                            aria-controls="stok-utuh-produk" aria-selected="false">
                            Stok Utuh
                        </button>
                    </li>
                </ul>


                <div class="mb-3">
                    <a class="btn btn-success" style="font-size: 12px">
                        <i class="bi bi-plus-lg"></i> Tambah Stok
                    </a>
                </div>

            </div>

            <div class="card-body tab-content" id="productTabContent">
                <!-- Stok Produk Tab -->
                <div class="tab-pane fade show active" id="stok-produk" role="tabpanel" aria-labelledby="stok-produk-tab">


                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center"scope="col" style="width:5%;">No</th>
                                    <th class="text-center" scope="col">Ukuran Produk</th>
                                    <th class="text-center" scope="col">Total Panjang</th>
                                    <th class="text-center" scope="col" style="width:15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stokProduk as $produk)
                                    <tr>
                                        <th class="text-center" scope="row">{{ $stokProduk->firstItem() + $loop->index }}
                                        </th>
                                        <td class="text-center">{{ $produk->ukuran }}</td>
                                        <td class="text-center">{{ $produk->total_panjang }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('detailStokProduct', ['id' => $produk->id]) }}"
                                                class="btn btn-sm btn-warning btn-detail"
                                                aria-label="Lihat detail produk {{ $produk->ukuran }}">
                                                <i class="bi bi-eye"></i> Lihat Detail {{ $produk->ukuran }}
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Data stok produk tidak tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination Stok Produk --}}
                    <div>
                        {{ $stokProduk->links() }}
                    </div>
                </div>

                <!-- Stok Utuh Produk Tab -->
                <div class="tab-pane fade" id="stok-utuh-produk" role="tabpanel" aria-labelledby="stok-utuh-produk-tab">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">No</th>
                                    <th class="text-center" scope="col">Nama Produk</th>
                                    <th class="text-center" scope="col">Ukuran</th>
                                    <th class="text-center" scope="col">Jumlah</th>
                                    <th class="text-center" scope="col">Tanggal</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stokUtuhProduk as $produk)
                                    <tr>
                                        <th class="text-center" scope="row">
                                            {{ $stokUtuhProduk->firstItem() + $loop->index }}</th>
                                        <td class="text-center">{{ $produk->name }}</td>
                                        <td class="text-center">{{ $produk->ukuran }}</td>
                                        <td class="text-center">{{ $produk->quantity }}</td>
                                        <td class="text-center">{{ $produk->created_at->format('d M Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Data stok utuh produk tidak
                                            tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination Stok Utuh Produk --}}
                    <div>
                        {{ $stokUtuhProduk->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahStokModal" tabindex="-1" aria-labelledby="tambahStokModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="tambahStokModalLabel">Tambah Stok</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="tambahStokForm" action="{{ route('addStok') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="jenisStok" class="form-label">Jenis Stok</label>
                            <select class="form-select" id="jenisStok" name="jenis_stok" required>
                                <option value="" selected disabled>Pilih Jenis Stok</option>
                                <option value="potong">Stok Potong</option>
                                <option value="utuh">Stok Utuh</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ukuranProduk" class="form-label">Ukuran Produk</label>
                            <select class="form-select" id="ukuranProduk" name="ukuranProduk" required>
                                <option value="" selected disabled>Pilih Jenis Ukuran</option>
                                @foreach ($ukuran as $dataSize)
                                    <option value="{{ $dataSize->ukuran }}">{{ $dataSize->ukuran }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="panjangProduk" class="form-label">Panjang (m)</label>
                            <input type="number" class="form-control" id="panjangProduk" name="panjang" step="0.01"
                                placeholder="Masukkan panjang produk" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsiProduk" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsiProduk" name="deskripsi" rows="3"
                                placeholder="Masukkan deskripsi (opsional)"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tambahStokButton = document.querySelector('.btn-success');
            tambahStokButton.addEventListener('click', function() {
                const tambahStokModal = new bootstrap.Modal(document.getElementById('tambahStokModal'));
                tambahStokModal.show();
            });
        });
    </script>
@endsection
