@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4">Daftar Kegiatan</h2>
                <a href="{{ route('kajians.create') }}" class="btn btn-primary btn-block" style="background-color: #622200; border-color: #622200;">
                    <i class="bi bi-plus-circle me-2"></i> Tambah Kajian
                </a>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead style="background-color: #8e4c28; color: white;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul Kajian</th>
                            <th scope="col">Jenis Kajian</th>
                            <th scope="col">Pemateri</th>
                            <th scope="col">Waktu Mulai</th> <!-- Menambahkan kolom Waktu Mulai -->
                            <th scope="col">Countdown</th> <!-- Menambahkan kolom Countdown -->
                            <th scope="col" style="width: 250px;">Action</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #f5e9e1;">
                        @foreach ($kajians as $kajian)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $kajian->title }}</td>
                            <td>{{ $kajian->jeniskajian->name }}</td> <!-- Akses nama JenisKajian -->
                            <td>{{ $kajian->ustadz->name }}</td> <!-- Akses nama Ustadz -->
                            <td>
                                @if ($kajian->start_time)
                                    {{ \Carbon\Carbon::parse($kajian->start_time)->format('d-m-Y H:i') }}
                                @else
                                    Tidak ada waktu mulai
                                @endif
                            </td>
                            <td>
                                @if ($kajian->start_time)
                                    <div id="countdown-{{ $kajian->id }}"></div>
                                    <script>
                                        var countDownDate{{ $kajian->id }} = new Date("{{ $kajian->start_time }}").getTime();
                                        var x{{ $kajian->id }} = setInterval(function() {
                                            var now = new Date().getTime();
                                            var distance = countDownDate{{ $kajian->id }} - now;
                                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                            document.getElementById("countdown-{{ $kajian->id }}").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
                                            if (distance < 0) {
                                                clearInterval(x{{ $kajian->id }});
                                                document.getElementById("countdown-{{ $kajian->id }}").innerHTML = "Kajian Dimulai!";
                                            }
                                        }, 1000);
                                    </script>
                                @else
                                    Tidak ada waktu mulai
                                @endif
                            </td>
                            <td>
                                <a href="{{ $kajian->youtube_link }}" target="_blank" class="btn btn-outline-danger btn-sm" title="View on YouTube">
                                    <i class="bi bi-youtube"></i>
                                </a>
                                <a href="{{ route('kajians.show', $kajian->id) }}" class="btn btn-outline-info btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('kajians.edit', $kajian->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('kajians.destroy', $kajian->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
