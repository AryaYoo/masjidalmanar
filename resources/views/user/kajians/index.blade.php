@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h2 class="mb-4">Daftar Kegiatan</h2>
            <table class="table table-borderless">
                <tbody>
                    @foreach ($kajians as $kajian)
                    <tr class="align-middle">
                        <td style="width: 100px;">
                            @if($kajian->image)
                                <a href="{{ $kajian->youtube_link }}" target="_blank">
                                    <img src="/images/{{ $kajian->image }}" alt="{{ $kajian->title }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 10px;">
                                </a>
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>
                            <h5 class="mb-0">{{ $kajian->jeniskajian->name}} {{$kajian->title}} | oleh {{$kajian->ustadz->name}} </h5>
                        </td>
                        <td style="width: 150px;">
                            <a class="btn btn-primary btn-sm text-white" style="background-color: #622200; border-color: #622200;" href="{{ route('user.kajians.show', $kajian->id) }}">
                                Show Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
