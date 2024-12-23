@extends('layouts.app')

@section('content')

<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="{{ Vite::asset('resources/images/sholat-ied.JPG') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="{{ Vite::asset('resources/images/view-masjid.JPG') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="{{ Vite::asset('resources/images/ceramah.jpg') }}" class="d-block w-100" alt="...">
        </div>
    </div>
</div>

@if($nextKajian)
<div class="container my-5">
    <div class="row justify-content-between align-items-center" style="background-color:#a36231; box-shadow: 0 4px 8px rgba(0,0,0,0.2); padding: 20px; border-radius: 10px;">
        <!-- Left Side: Kajian Terdekat Information -->
        <div class="col-md-5 text-md-start text-center">
            <h2 class="text-white mb-3">Kajian Terdekat:</h2>
            <h1 class="fw-bold text-white mb-3">{{$nextKajian->jeniskajian->name}} {{ $nextKajian->title }}</h1>
            <h3 class="text-white mb-3">Oleh {{$nextKajian->ustadz->name}}</h3>
        </div>

        <!-- Right Side: Countdown Timer -->
        <div class="col-md-5 text-md-end text-center">
            <h3 class="text-white mb-4">InsyaAllah akan dimulai dalam:</h3>
            <div id="timer" style="font-size: 4rem; font-weight: 700; color: #fff; border-radius: 5px; display: inline-block;"></div>
        </div>
    </div>
</div>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("{{ $nextKajian->start_time }}").getTime();

        // Update the countdown every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes, and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="timer"
            document.getElementById("timer").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // If the countdown is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "Kajian telah dimulai";
            }
        }, 1000);
    </script>
@else
    <div id="countdown" class="text-center py-4" style="background-color:rgb(93, 103, 240); box-shadow: 0 4px 8px rgba(0,0,0,0.2); box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <h2 class="text-white">Tidak ada Kajian untuk saat ini.</h2>
    </div>
@endif

<div id="jadwalsholat" class="" style="background-color: rgb(26, 24, 156)">
    <div class="container py-5 px-4 background-color text-white" style="background-color: rgb(26, 24, 156)">
        <div class="row py-2 px-4 bg-transparent">
            <div class="col-4 card-header">
                <h1 class="fw-bold text-white">Jadwal Sholat</h1>
                <h5 class=" my-4 text-white"><i class="bi bi-geo-fill text-white"></i> Surabaya, {{ \Carbon\Carbon::now()->format('d F Y') }}</h5>
                {{-- <div class="card-footer text-white mt-4">
                    {{ \Carbon\Carbon::now()->format('d F Y') }}
                </div> --}}
                {{-- <form action="{{ route('welcome') }}" method="GET" class="mb-3">
                    <div class="input-group mt-5">
                        <input type="text" class="form-control mt-5" placeholder="Cari kotamu!" name="search_city" value="{{ $searchCity ?? '' }}">
                        <button class="btn btn-outline-light mt-5" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form> --}}
            </div>
            <div class="col bg-transparent">
                <ul class="list-group bg-transparent">
                    @if(isset($jadwalDefault['data']['jadwal']))
                        @php $jadwal = $jadwalDefault['data']['jadwal'][0]; @endphp
                        <h4 class="d-flex justify-content-between align-items-center bg-transparent m-3">
                            Imsak
                            <span class="badge bg-secondary">{{ $jadwal['imsak'] }}</span>
                        </h4>
                        <h4 class="d-flex justify-content-between align-items-center bg-transparent m-3">
                            Shubuh
                            <span class="badge bg-secondary">{{ $jadwal['subuh'] }}</span>
                        </h4>
                        <h4 class="d-flex justify-content-between align-items-center bg-transparent m-3">
                            Terbit
                            <span class="badge bg-secondary">{{ $jadwal['terbit'] }}</span>
                        </h4>
                        <h4 class="d-flex justify-content-between align-items-center bg-transparent m-3">
                            Dhuha
                            <span class="badge bg-secondary">{{ $jadwal['dhuha'] }}</span>
                        </h4>
                    @else
                        <p class="text-white">Data tidak tersedia untuk Surabaya.</p>
                    @endif
                </ul>
            </div>
            <div class="col bg-transparent">
                <ul class="list-group bg-transparent">
                    @if(isset($jadwalDefault['data']['jadwal']))
                        <h4 class="d-flex justify-content-between align-items-center bg-transparent m-3">
                            Dzuhur
                            <span class="badge bg-secondary">{{ $jadwal['dzuhur'] }}</span>
                        </h4>
                        <h4 class="d-flex justify-content-between align-items-center bg-transparent m-3">
                            Ashar
                            <span class="badge bg-secondary">{{ $jadwal['ashar'] }}</span>
                        </h4>
                        <h4 class="d-flex justify-content-between align-items-center bg-transparent m-3">
                            Maghrib
                            <span class="badge bg-secondary">{{ $jadwal['maghrib'] }}</span>
                        </h4>
                        <h4 class="d-flex justify-content-between align-items-center bg-transparent m-3">
                            Isya'
                            <span class="badge bg-secondary">{{ $jadwal['isya'] }}</span>
                        </h4>
                    @else
                        <p class="text-white">Data tidak tersedia untuk Surabaya.</p>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="divisioncard" class="container my-5">
    <div class="row">
        <div class="col-md-3">
            <a href="https://example.com/masjid" target="_blank" style="text-decoration: none; color: inherit;">
                <div class="card division-card">
                    <div style="width: 70px; height: 70px; background-color: rgb(46, 44, 179); border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 20px;">
                        <img src={{ Vite::asset('resources/images/masjid.svg')}} style="color: #fff; width: 43px; height: 43px;"></i>
                    </div>
                    <h5 class="card-title">Ibadah & Dakwah</h5>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="https://example.com/pendidikan" target="_blank" style="text-decoration: none; color: inherit;">
                <div class="card division-card">
                    <div style="width: 70px; height: 70px; background-color: rgb(46, 44, 179); border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 20px;">
                        <i class="bi bi-mortarboard" style="color: #fff; font-size: 30px;"></i>
                    </div>
                    <h5 class="card-title">Pendidikan</h5>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="https://example.com/sosial" target="_blank" style="text-decoration: none; color: inherit;">
                <div class="card division-card">
                    <div style="width: 70px; height: 70px; background-color: rgb(46, 44, 179); border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 20px;">
                        <i class="bi bi-people" style="color: #fff; font-size: 30px;"></i>
                    </div>
                    <h5 class="card-title">Sosial</h5>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="https://example.com/usaha" target="_blank" style="text-decoration: none; color: inherit;">
                <div class="card division-card">
                    <div style="width: 70px; height: 70px; background-color: rgb(46, 44, 179); border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 20px;">
                        <i class="bi bi-bank" style="color: #fff; font-size: 30px;"></i>
                    </div>
                    <h5 class="card-title">Usaha</h5>
                </div>
            </a>
        </div>
    </div>
</div>

<div id="totalinfaq" class="container-sm mt-5">
    <div class="row">
        <!-- Bagian Kiri: List 5 Infaq Terbaru -->
        <div class="col-md-6">
            <div class="p-5 bg-light rounded-3 border">
                <h4 class="fs-4 fw-bold">Daftar Infaq Terbaru</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tujuan Infaq</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentJamaah as $jamaah)
                            <tr>
                                <td>{{ $jamaah->nama }}</td>
                                <td>{{ $jamaah->Infaq->name ?? 'N/A' }}</td>
                                <td>Rp {{ number_format($jamaah->nominal, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bagian Kanan: Total Infaq -->
        <div class="col-md-6">
            <div class="p-5 bg-light rounded-3 border">
                <h4 class="fs-4 fw-bold">Total Infaq Masuk</h4>
                <div class="card">
                    <div class="card-body">
                        <h2>Rp {{ number_format($totalInfaq, 2, ',', '.') }}</h2>
                    </div>
                </div>
                <!-- Informasi Rekening -->
                    <div class="mt-4 row align-items-center">
                        <!-- Logo Bank -->
                        <div class="col-md-4 text-center">
                            <img src="{{ Vite::asset('resources/images/logobsi.png') }}" alt="Logo Bank" class="img-fluid" style="max-width: 150px;">
                        </div>
                        <!-- Informasi Rekening -->
                        <div class="col-md-8">
                            <h5 class="fs-5 fw-bold">Informasi No. Rekening</h5>
                            <h3>Bank Syariah Indonesia</h3>
                            <h3>6011333336</strong></h3>
                            <p>A/N YYS Masjid Al Iman Sutorejo Indah</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>


<div id="infaq" class="container-sm mt-5">
    <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 border col-xl-6">
                <div class="mb-4 text-center">
                    <h4 class="fs-2 fw-bold">Siapkan Infaq Terbaikmu!</h4>
                </div>
                <div class="row">
                    <!-- Nama Input -->
                    <div class="col-mb-3">
                        <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" value="{{ Auth::check() ? Auth::user()->name : old('nama') }}" placeholder="Masukkan Nama">
                        <input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::id() : '' }}">
                        @error('nama')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <!-- Nomor HP Input -->
                    <div class="mt-3">
                        <label for="nomor" class="form-label">No. Handphone</label>
                        <input class="form-control @error('nomor') is-invalid @enderror" type="text" name="nomor" id="nomor" value="{{ Auth::check() ? Auth::user()->nomor : old('nomor') }}" placeholder="Masukkan No. HP">
                        @error('nomor')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <!-- Alamat Input -->
                    <div class="mt-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat">
                        @error('alamat')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <!-- Nominal Infaq Input -->
                    <div class="mt-3">
                        <label for="nominal" class="form-label">Nominal Infaq</label>
                        <input class="form-control @error('nominal') is-invalid @enderror" type="number" name="nominal" id="nominal" value="{{ old('nominal') }}" placeholder="Masukkan Nominal Infaq">
                        @error('nominal')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <!-- Tujuan Infaq (Dropdown) -->
                    <div class="mt-3">
                        <label for="infaq" class="form-label">Tentukan tujuan Infaqmu</label>
                        <select name="infaq" id="infaq" class="form-select @error('infaq') is-invalid @enderror">
                            @foreach ($infaqs as $Infaq)
                            <option value="{{ $Infaq->id }}" {{ old('infaq') == $Infaq->id ? 'selected' : '' }}>{{ $Infaq->code.' - '.$Infaq->name }}</option>
                            @endforeach
                        </select>
                        @error('infaq')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <!-- File Upload -->
                    <div class="mt-3">
                        <label for="file" class="form-label">Upload Bukti Transfer</label>
                        <input class="form-control @error('file') is-invalid @enderror" type="file" id="formFile" name="file">
                        @error('file')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-outline-light" style="background-color: rgb(46, 44, 179)">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<div id="feedback" class="container mt-5">
    <h2>Layanan Kritik & Saran</h2>

    <form action="{{ route('feedback.send') }}" method="POST">
        @csrf
        <div class="mb-3">
            {{-- Input for Name --}}
            <input type="text" name="name" class="form-control" value="{{ Auth::check() ? Auth::user()->name : '' }}" placeholder="Nama" required>
            @error('name')
                <div class="text-danger"><small>{{ $message }}</small></div>
            @enderror
        </div>

        <div class="mb-3">
            {{-- Input for Phone Number --}}
            <input type="text" name="nomor" class="form-control" value="{{ Auth::check() ? Auth::user()->nomor : '' }}" placeholder="Masukkan Nomor HP" required>
            @error('nomor')
                <div class="text-danger"><small>{{ $message }}</small></div>
            @enderror
        </div>

        <div class="mb-3">
            {{-- Textarea for Message --}}
            <textarea name="message" class="form-control" rows="5" placeholder="Sampaikan saran & pesan untuk Kami." required></textarea>
            @error('message')
                <div class="text-danger"><small>{{ $message }}</small></div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-whatsapp"></i> Kirim Saran & Masukan
        </button>
    </form>
</div>

<div id="footer" class="">
    <div class="container py-5 px-4">
        <div class="row py-2 px-4">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col">
                        <a href="#" class="logo text-decoration-none">
                            <div class="d-flex">
                                <img class="img-fluid mb-4" src="{{ Vite::asset('resources/images/logo.png') }}" alt="Bootstrap Logo" width="90">
                            </div>
                        </a>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <i class="bi bi-map"></i>
                                    </div>
                                    <div class="col">
                                        <a>Jl. Sutorejo Tengah VIII No.12, Dukuh Sutorejo, Kec. Mulyorejo, Surabaya, Jawa Timur 60113</a>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <div class="col">
                                        <a class="  " href="#">+62 85369369517</a>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <i class="bi bi-envelope-paper-heart"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#">masjidalimansurabaya@gmail.com</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <h5 class="mb-4">Kajian</h5>
                            <ul class="list-unstyled ">
                                <li class="mb-2"><a >Kajian Hari Besar Islam</a></li>
                                <li class="mb-2"><a >Kajian Rutin  Ahad Pagi</a></li>
                                <li class="mb-2"><a >Kajian Tafsir Qur'an</a></li>
                            </ul>
                        <h5 class="my-4">Kegiatan</h5>
                            <ul class="list-unstyled ">
                                <li class="mb-2"><a >Pesantrean Mahasiswa</a></li>
                                <li class="mb-2"><a >Tadarus Al Qur'an</a></li>
                                <li class="mb-2"><a >Syabab Rimayah Community Al Iman</a></li>
                                <li class="mb-2"><a >Panitia Ramadhan 1445 H</a></li>
                                <li class="mb-2"><a >Panitia Idul Adha 1445 H</a></li>
                            </ul>
                    </div>
                    <div class="col">
                        <h5 class="mb-4">Profil</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><a >Sejarah</a></li>
                                    <li class="mb-2"><a >Struktur Organisasi</a></li>
                                    <li class="mb-2"><a >Struktur Organisasi</a></li>
                                </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
</div>

<div id="copyright" class="container-fluid py-3" style="background-color: rgb(46, 44, 179">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xs-12 text-center" style="color: white;">Masjid Al Iman Sutorejo Indah Surabaya | ©2024</div>
        </div>
    </div>
</div>

@endsection
