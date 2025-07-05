@extends('layouts')

@section('title', 'Daftar Potong Tembaga')

@section('content')
    <div class="container-fluid p-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive rounded shadow" style="background: linear-gradient(to bottom, #EFF3F8, #D7E3F1);">
            <table class="table table-hover text-center" style="border-radius: 12px;">
                <thead style="background: linear-gradient(to right, #4B79A1, #283E51); color: white; border-radius: 12px;">
                    <tr>
                        <th>No</th>
                        <th>Kode Produksi</th>
                        <th>Kode Barang</th>
                        <th>Proyek</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cuttingLists as $index => $cutting)
                        <tr style="background-color: #F8FBFF;">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $cutting->production_code }}</td>
                            <td>{{ $cutting->project_code }}</td>
                            <td>{{ $cutting->project_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($cutting->production_date)->format('d M Y') }}</td>
                            <td class="text-center">
                                @if ($cutting->status != 'Sudah disetujui')
                                    <a href="{{ route('cutting.edit', $cutting->id) }}"
                                        class="btn btn-warning btn-sm rounded-pill"
                                        style="background-color: #F4B400; border: none;">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <form action="{{ route('request.delete', $cutting->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill"
                                            style="background-color: #D93025; border: none;">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('cutting.detail', $cutting->id) }}"
                                        class="btn btn-warning btn-sm rounded-pill"
                                        style="background-color: blue; color: white; border: none;">
                                        <i class="bi bi-pencil-square"></i> Detail
                                    </a>
                                @endif



                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Add custom scripts here if needed
    </script>
@endsection
