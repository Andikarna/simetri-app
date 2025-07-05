@extends('layouts')

@section('title', 'Pembelian Tembaga')

@section('content')
    <div class="container mt-5">
        <!-- Tombol Pemesanan -->
        <div class="mb-3 text-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#orderModal">
                <i class="bi bi-plus-circle"></i> Buat Pemesanan
            </button>
        </div>

        <!-- Pesan Sukses -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Tabel Daftar Pembelian -->
        <div class="card shadow-lg rounded-lg">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0"><i class="bi bi-table"></i> Daftar Pembelian</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="bi bi-calendar-event"></i> Dibuat</th>
                            <th><i class="bi bi-receipt"></i> NO SPP/T</th>
                            <th><i class="bi bi-list-ol"></i> No.</th>
                            <th><i class="bi bi-box"></i> Item No.</th>
                            <th><i class="bi bi-info-circle"></i> Item Description</th>
                            <th><i class="bi bi-tags"></i> Merk</th>
                            <th><i class="bi bi-calendar-x"></i> Tanggal Datang</th>
                            <th><i class="bi bi-gear"></i> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buyCopper as $item)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($item->date)->format('d M Y') }}</td>
                                <td>{{ $item->no_sppt }}</td>
                                <td>{{ $item->no }}</td>
                                <td>{{ $item->item_number }}</td>
                                <td>{{ $item->item_description }}</td>
                                <td>{{ $item->merk }}</td>
                                <td>{{ Carbon\Carbon::parse($item->expired_date)->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('buying.detail', $item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-eye"></i> Lihat Detail
                                    </a>
                                    <a href="{{ route('buying.done', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-check2-circle"></i> Selesaikan Pemesanan
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Pemesanan -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">
                        <i class="bi bi-pencil-square"></i> Form Pemesanan Baru
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('buying.add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="no_sppt" class="form-label"><i class="bi bi-receipt"></i> No SPPT</label>
                            <input type="text" class="form-control" id="no_sppt" name="no_sppt" required>
                        </div>
                        <div class="mb-3">
                            <label for="item_number" class="form-label"><i class="bi bi-box"></i> Item Number</label>
                            <input type="text" class="form-control" id="item_number" name="item_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="item_description" class="form-label"><i class="bi bi-info-circle"></i> Item
                                Description</label>
                            <input type="text" class="form-control" id="item_description" name="item_description"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="merk" class="form-label"><i class="bi bi-tags"></i> Merk</label>
                            <input type="text" class="form-control" id="merk" name="merk" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label"><i class="bi bi-boxes"></i> Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="expired_date" class="form-label"><i class="bi bi-calendar-x"></i>Tanggal Barang
                                Datang</label>
                            <input type="date" class="form-control" id="expired_date" name="expired_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label"><i class="bi bi-chat-left-dots"></i> Catatan</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Simpan Pemesanan
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle"></i> Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // JavaScript tambahan jika diperlukan
    </script>
@endsection
