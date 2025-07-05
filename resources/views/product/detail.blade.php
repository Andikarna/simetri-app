@extends('layouts')

@section('title', 'Detail Produk')

@section('content')
    <div class="container py-5">
        <div class="card shadow-lg rounded-4 border-0">
            <div
                class="card-header bg-gradient-primary text-white rounded-top d-flex justify-content-between align-items-center">
                <a href="{{ url()->previous() }}" class="btn btn-light btn-sm" aria-label="Kembali ke halaman sebelumnya">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Ukuran Produk</th>
                                <th scope="col">Panjang</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stockProduct as $data)
                                <tr>
                                    <td>
                                        {{ $data->stok->ukuran ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $data->panjang }}
                                    </td>
                                    <td>
                                        {{ $data->created_at->format('d M Y') }}
                                    </td>
                                    <td class="text-start text-wrap">
                                        {{ $data->description }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-light border-0 text-muted fst-italic small text-center">
                Pastikan data produk sudah benar sebelum melakukan tindakan lebih lanjut.
            </div>
        </div>
    </div>
@endsection
