@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h2 class="fw-bold text-center mb-4">Daftar Infaq {{ Auth::user()->name }}</h2>
            @if($jamaahs->isEmpty())
                <p class="text-center">Tidak ada data infaq untuk pengguna ini.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped bg-white">
                        <thead style="background-color:rgb(46, 44, 179); color: white;">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">No.Tlp</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nominal Infaq</th>
                                <th scope="col">Tujuan Infaq</th>
                                <th scope="col">Bukti Transfer</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #f5e9e1;">
                            @foreach($jamaahs as $jamaah)
                            <tr>
                                <td>{{ $jamaah->nama }}</td>
                            <td>{{ $jamaah->nomor }}</td>
                            <td>{{ $jamaah->alamat }}</td>
                            <td>{{ $jamaah->nominal }}</td>
                            <td>{{ $jamaah->infaq_name }}</td>
                            <td>
                                @if ($jamaah->file_path)
                                    <a href="{{ asset('storage/' . $jamaah->file_path) }}" class="btn btn-link p-0">Lihat Bukti</a>
                                @else
                                    Tidak ada bukti
                                @endif
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script type="module">
    $(function () {
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('jamaah.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'nama', name: 'nama'},
                {data: 'nomor', name: 'nomor'},
                {data: 'alamat', name: 'alamat'},
                {data: 'nominal', name: 'nominal'},
                {data: 'infaq_name', name: 'infaq_name'},
                {data: 'file_path', name: 'file_path', render: function (data, type, full, meta) {
                    return data ?
                        '<a href="' + '{{ asset('storage') }}/' + data + '" class="btn btn-link p-0" target="_blank">Lihat Bukti</a>'
                        : 'Tidak ada bukti';
                }},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endpush
@endsection
