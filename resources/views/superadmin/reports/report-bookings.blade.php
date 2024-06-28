@extends('superadmin.layouts_superadmin.main')

@section('title', 'Laporan Pemesanan')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Rekap Laporan Pemesanan</h1>
            <div class="text-center mb-4">
                <a href="{{ route('report.download') }}" class="btn btn-success">Unduh PDF</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Agen Travel</th>
                        <th>Keberangkatan</th>
                        <th>Tujuan</th>
                        <th>Tanggal Perjalanan</th>
                        <th>Jumlah Penumpang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->nama_pemesan }}</td>
                            <td>{{ $booking->travel->nama_travel }}</td>
                            <td>{{ $booking->depature->depature }}</td>
                            <td>{{ $booking->destination->destination }}</td>
                            <td>{{ $booking->travelDate }}</td>
                            <td>{{ $booking->passengers }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection