@extends('layouts')

@section('title', 'Permintaan Tembaga')

@section('content')
    <div class="container-fluid p-5">
        <div class="mb-3 text-end">
            <a href="{{ route('request.add') }}" class="btn btn-primary rounded-pill px-4 py-2">
                <i class="bi bi-plus-lg"></i> Tambah Baru
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive rounded shadow">
            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Status</th>
                        <th>Kode Produksi</th>
                        <th>Kode Barang</th>
                        <th>Proyek</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cuttingLists as $index => $cutting)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if ($cutting->status === 'Baru')
                                    <span class="badge bg-primary">{{ $cutting->status }}</span>
                                @elseif ($cutting->status === 'Pengajuan Supervisor')
                                    <span class="badge bg-warning text-dark">{{ $cutting->status }}</span>
                                @elseif ($cutting->status === 'Sudah disetujui')
                                    <span class="badge bg-success">{{ $cutting->status }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($cutting->status) }}</span>
                                @endif
                            </td>
                            <td>{{ $cutting->production_code }}</td>
                            <td>{{ $cutting->project_code }}</td>
                            <td>{{ $cutting->project_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($cutting->production_date)->format('d M Y') }}</td>
                            <td class="text-center">
                                @if ($cutting->status != 'Sudah disetujui')
                                    <a href="{{ route('request.edit', $cutting->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('request.delete', $cutting->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('request.detail', $cutting->id) }}" class="btn btn-primary btn-sm">
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
