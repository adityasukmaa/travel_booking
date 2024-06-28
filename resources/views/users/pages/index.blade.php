@extends ('users.layouts_user.main')

@section ('content')
<div class="container mt-4">
    <h1>Welcome to TravelClass</h1>
    <p>Ini adalah halaman beranda.</p>
</div>
<!-- Booking Form Start -->
<section class="py-5">
    <div class="container px-5 my-3">
        <div class="card" id="booking">
            <div class="card-body">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Cari Tiket Mobil Travel</h2>
                    <p class="lead mb-0">Isi form di bawah ini untuk melakukan pencarian</p>
                </div>
                <form id="bookingForm" method="POST" action="{{ route('booking.store') }}">
                    @csrf
                    <!-- Travel Agency selection-->
                    <div class="form-floating mb-3">
                        <select class="form-select" id="travelAgency" name="travelAgency" aria-label="Pilih Agen Travel" required>
                            <option selected disabled value="">Pilih Agen Travel</option>
                            @foreach ($travels as $travel)
                                <option value="{{ $travel->id }}">{{ $travel->nama_travel }}</option>
                            @endforeach
                        </select>
                        <label for="travelAgency">Agen Travel</label>
                    </div>
                    <!-- Departure selection-->
                    <div class="form-floating mb-3">
                        <select class="form-select" id="departure" name="departure" aria-label="Pilih Keberangkatan" required>
                            <option selected disabled value="">Pilih Keberangkatan</option>
                            {{-- @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->depature }}</option>
                            @endforeach --}}
                        </select>
                        <label for="departure">Keberangkatan</label>
                    </div>
                    <!-- Destination selection-->
                    <div class="form-floating mb-3">
                        <select class="form-select" id="destination" name="destination" aria-label="Pilih Tujuan" required>
                            <option selected disabled value="">Pilih Tujuan</option>
                            {{-- @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->destination }}</option>
                            @endforeach --}}
                        </select>
                        <label for="destination">Tujuan</label>
                    </div>
                    <!-- Date input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="travelDate" name="travelDate" type="date" placeholder="Tanggal Perjalanan" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required />
                        <label for="travelDate">Tanggal Perjalanan</label>
                    </div>
                    <!-- Passengers input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="passengers" name="passengers" type="number" placeholder="Jumlah Penumpang" required />
                        <label for="passengers">Jumlah Penumpang</label>
                    </div>
                    <!-- Submit Button-->
                    <div class="d-grid">
                        <button class="btn btn-success btn-lg" type="submit">Cari Tiket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Booking Form End -->
@endsection