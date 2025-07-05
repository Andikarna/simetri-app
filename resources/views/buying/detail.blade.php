@extends('layouts')

@section('title', 'Detail Pembelian')

@section('content')
    <div class="container mt-5">
        <div class="mb-4">

            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        </div>

        <div class="card shadow-lg rounded-lg">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0"><i class="bi bi-info-circle"></i> Detail Pembelian</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th><i class="bi bi-calendar-event"></i> Tanggal</th>
                        <td>{{ Carbon\Carbon::parse($detailBuy->date)->format('d M Y') }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-receipt"></i> NO SPP/T</th>
                        <td>{{ $detailBuy->no_sppt }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-list-ol"></i> No.</th>
                        <td>{{ $detailBuy->no }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-box"></i> Item Number</th>
                        <td>{{ $detailBuy->item_number }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-info-circle"></i> Item Description</th>
                        <td>{{ $detailBuy->item_description }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-tags"></i> Merk</th>
                        <td>{{ $detailBuy->merk }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-calendar-x"></i> Tanggal Kadaluarsa</th>
                        <td>{{ Carbon\Carbon::parse($detailBuy->expired_date)->format('d M Y') }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-chat-left-dots"></i> Catatan</th>
                        <td>{{ $detailBuy->description }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Tambahkan interaksi JavaScript jika diperlukan
    </script>
@endsection
