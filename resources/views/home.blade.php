@extends('layouts.main')
@section('content')
    <!-- Spinner Start -->
    {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div> --}}
    <!-- Spinner End -->

    <!-- start search -->
    <header class="bg-dark py-5 banner">
        <div class="container px-5">
            <div class="row gx-5 justify-content-left">
                <div class="col-lg-6">
                    <div class="text-left my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2">Keliling Dunia Perlu Travel <span
                                style="color:#F5B963">Class</span></h1>
                        <p class="lead text-white-55 mb-4">Jelajahi kenyamanan dan keamanan perjalanan Anda dengan
                            menggunakan jasa mobil travel kami. Nikmati layanan profesional, armada yang terawat, dan
                            pengalaman perjalanan yang menyenangkan.</p>
                        <div class="d-grid gap-3 d-sm-flex">
                            <a class="btn btn-success btn-lg px-4 me-sm-3" href="#booking">Cari Tiket!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

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
                            <select class="form-select" id="travelAgency" name="travelAgency" aria-label="Pilih Agen Travel"
                                required>
                                <option selected disabled value="">Pilih Agen Travel</option>
                                @foreach ($travels as $travel)
                                    <option value="{{ $travel->id }}">{{ $travel->nama_travel }}</option>
                                @endforeach
                            </select>
                            <label for="travelAgency">Agen Travel</label>
                        </div>
                        <!-- Departure selection-->
                        <div class="form-floating mb-3">
                            <select class="form-select" id="departure" name="departure" aria-label="Pilih Keberangkatan"
                                required>
                                <option selected disabled value="">Pilih Keberangkatan</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->depature }}</option>
                                @endforeach
                            </select>
                            <label for="departure">Keberangkatan</label>
                        </div>
                        <!-- Destination selection-->
                        <div class="form-floating mb-3">
                            <select class="form-select" id="destination" name="destination" aria-label="Pilih Tujuan"
                                required>
                                <option selected disabled value="">Pilih Tujuan</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->destination }}</option>
                                @endforeach
                            </select>
                            <label for="destination">Tujuan</label>
                        </div>
                        <!-- Date input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="travelDate" name="travelDate" type="date"
                                placeholder="Tanggal Perjalanan" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}"
                                required />
                            <label for="travelDate">Tanggal Perjalanan</label>
                        </div>
                        <!-- Passengers input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="passengers" name="passengers" type="number"
                                placeholder="Jumlah Penumpang" required />
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



    <!-- Bagian Fitur-->
    <section class="py-5 border-bottom" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-globe"></i></div>
                    <h2 class="h4 fw-bolder">Jelajahi Dunia</h2>
                    <p>Temukan destinasi baru, budaya unik, dan pengalaman yang tak terlupakan.</p>
                    <a class="text-decoration-none" href="#!">
                        Mulai Perjalanan Anda
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature bg-success bg-gradient text-white rounded-3 mb-3"><i class="bi bi-compass"></i>
                    </div>
                    <h2 class="h4 fw-bolder">Petualangan Menanti</h2>
                    <p>Memulai petualangan mendebarkan dan ciptakan kenangan yang akan bertahan seumur hidup.</p>
                    <a class="text-decoration-none" href="#!">
                        Temukan Petualangan
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="col-lg-4">
                    <div class="feature bg-danger bg-gradient text-white rounded-3 mb-3"><i class="bi bi-heart"></i></div>
                    <h2 class="h4 fw-bolder">Berwisata dengan Cinta</h2>
                    <p>Rencanakan liburan romantis atau liburan keluarga yang memenuhi minat semua orang.</p>
                    <a class="text-decoration-none" href="#!">
                        Rencanakan Perjalanan Anda
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Bagian Harga-->
    <section class="bg-light py-5 border-bottom">
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">Rencana Perjalanan Fleksibel</h2>
                <p class="lead mb-0">Pilih rencana yang sesuai dengan kebutuhan perjalanan Anda</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <!-- Kartu harga gratis-->
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-5 mb-xl-0">
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold text-muted">Pemula</div>
                            <div class="mb-3">
                                <span class="display-4 fw-bold">$0</span>
                                <span class="text-muted">/ perjalanan</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    <strong>Dukungan perjalanan dasar</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Tips perjalanan esensial
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Akses komunitas
                                </li>
                                <li class="text-muted">
                                    <i class="bi bi-x"></i>
                                    Layanan personalisasi
                                </li>
                            </ul>
                            <div class="d-grid"><a class="btn btn-outline-primary" href="#!">Pilih Pemula</a></div>
                        </div>
                    </div>
                </div>
                <!-- Kartu harga pro-->
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-5 mb-xl-0">
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold">
                                <i class="bi bi-star-fill text-warning"></i>
                                Premium
                            </div>
                            <div class="mb-3">
                                <span class="display-4 fw-bold">$49</span>
                                <span class="text-muted">/ perjalanan</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    <strong>Dukungan perjalanan lanjutan</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Itinerari perjalanan kustom
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Penawaran eksklusif
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Dukungan 24/7
                                </li>
                            </ul>
                            <div class="d-grid"><a class="btn btn-primary" href="#!">Pilih Premium</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials section-->
    <section class="py-5 border-bottom">
        <div class="container px-5 my-5 px-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">Pelanggan yang Bahagia</h2>
                <p class="lead mb-0">Dengarkan dari pelanggan kami yang puas</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <!-- Testimoni 1-->
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="mb-1">Our family trip was well organized and stress-free thanks to your
                                        amazing team. Highly recommend!</p>
                                    <div class="small text-muted">- The Johnsons</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 2-->
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="mb-1">I had an incredible solo adventure that was nothing short of
                                        spectacular. Can't wait for my next trip!</p>
                                    <div class="small text-muted">- Alex, Solo Traveler</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section-->
    <section class="bg-light py-5">
        <div class="container px-5 my-5 px-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h2 class="fw-bolder">Connect With Us</h2>
                <p class="lead mb-0">Let us help you plan your next unforgettable journey</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <!-- Contact form-->
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..."
                                data-sb-validations="required" />
                            <label for="name">Full name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com"
                                data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..."
                                style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Send
                                Message</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
