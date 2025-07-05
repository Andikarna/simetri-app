@extends('layouts')

@section('title', 'Tambah Detail')

@section('content')
    <div class="container-fluid p-5">
        <div class="card shadow-lg rounded mx-auto" style="max-width: 1000px; border-radius: 12px; background: #ffffff;">
            <div class="card-body p-4 overflow-auto">
                <!-- Informasi Request -->
                <div class="mb-4">
                    <h5 class="fw-bold text-primary">Informasi Request</h5>
                    <p><strong>Proyek:</strong> {{ $request->project_name }}</p>
                    <p><strong>Kode Produksi:</strong> {{ $request->production_code }}</p>
                    <p><strong>Tanggal Produksi:</strong>
                        {{ \Carbon\Carbon::parse($request->production_date)->format('d-m-Y') }}</p>
                </div>

                <!-- Form Tambah Detail -->
                <h4 class="fw-bold text-center text-primary mb-4">Tambah Detail</h4>
                <form action="{{ route('detail.update', $request->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="copper_cutting_detail" class="form-label">Tambahkan Nama Panel Utama</label>
                                <input type="text" class="form-control form-control-sm rounded-pill"
                                    id="panel_name_utama" name="panel_name_utama" placeholder="Masukkan Nama Panel Utama"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="panel_name" class="form-label">Nama Panel</label>
                                <input type="text" class="form-control form-control-sm rounded-pill" id="panel_name"
                                    name="panel_name" placeholder="Masukkan nama panel" required>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Tipe</label>
                                <input type="text" class="form-control form-control-sm rounded-pill" id="type"
                                    name="type" placeholder="Masukkan tipe" required>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="size" class="form-label">Ukuran</label>
                                        <select class="form-control form-control-sm rounded-pill" id="size"
                                            name="size" required>
                                            <option value="" disabled selected>Pilih Ukuran</option>
                                            @foreach ($masterSize->all() as $size)
                                                <option value="{{ $size->ukuran }}">{{ $size->ukuran }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="length" class="form-label">Panjang (mm)</label>
                                        <input type="number" class="form-control form-control-sm rounded-pill"
                                            id="length" name="length" placeholder="Masukkan panjang" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Kuantitas</label>
                                <input type="number" class="form-control form-control-sm rounded-pill" id="quantity"
                                    name="quantity" placeholder="Masukkan kuantitas" required>
                            </div>
                            <div class="mb-3">
                                <label for="total_length" class="form-label">Jumlah Panjang</label>
                                <input type="number" class="form-control form-control-sm rounded-pill" id="total_length"
                                    name="total_length" placeholder="Masukkan jumlah panjang" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-success rounded-pill px-4 py-2"
                            style="background: linear-gradient(to right, #4CAF50, #388E3C); border: none;">Simpan</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary rounded-pill px-4 py-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const lengthInput = document.getElementById('length');
            const quantityInput = document.getElementById('quantity');
            const totalLengthInput = document.getElementById('total_length');

            function calculateTotalLength() {
                const length = parseFloat(lengthInput.value) || 0;
                const quantity = parseFloat(quantityInput.value) || 0;
                totalLengthInput.value = length * quantity;
            }

            lengthInput.addEventListener('input', calculateTotalLength);
            quantityInput.addEventListener('input', calculateTotalLength);
        });
    </script>
@endsection
