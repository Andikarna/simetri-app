@extends('layouts')

@section('title', 'Tambah Potong Tembaga')

@section('content')
<div class="container-fluid p-5">
    <div class="card shadow rounded mx-auto"
        style="border-radius: 12px; background: linear-gradient(to bottom, #EFF3F8, #D7E3F1); max-height: 70vh; overflow-y: auto;">
        <div class="card-body p-4">
            <h3 class="text-center mb-4" style="color: #4B79A1; font-weight: bold;">Tambah Potong Tembaga</h3>
            <form action="{{ route('request.save') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="production_code" class="form-label" style="font-size: 0.875rem;">Kode Produksi</label>
                        <input type="text" class="form-control form-control-sm rounded-pill" id="production_code"
                            name="production_code" placeholder="Masukkan Kode Produksi" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="project_code" class="form-label" style="font-size: 0.875rem;">Kode Proyek</label>
                        <input type="text" class="form-control form-control-sm rounded-pill" id="project_code"
                            name="project_code" placeholder="Masukkan Kode Proyek" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="project_name" class="form-label" style="font-size: 0.875rem;">Nama Proyek</label>
                        <input type="text" class="form-control form-control-sm rounded-pill" id="project_name"
                            name="project_name" placeholder="Masukkan Nama Proyek" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="production_date" class="form-label" style="font-size: 0.875rem;">Tanggal Produksi</label>
                        <input type="date" class="form-control form-control-sm rounded-pill" id="production_date"
                            name="production_date" required>
                    </div>
                </div>
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success btn-sm rounded-pill px-4 py-2"
                        style="background: linear-gradient(to right, #4CAF50, #388E3C); border: none;">
                        Simpan
                    </button>
                    <a href="{{ route('request') }}" class="btn btn-secondary btn-sm rounded-pill px-4 py-2"
                        style="border: none;">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
