@extends('layout/header')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar Mobil</h1>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</section>

<section class="content">
    @include('layout/feedback')
    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <table class="table table-border table-hover dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Merek</th>
                            <th>Model</th>
                            <th>No. Plat</th>
                            <th>Harga Sewa/Hari</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(@$result as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ @$r->merek }}</td>
                                <td>{{ @$r->model }}</td>
                                <td>{{ @$r->no_plat }}</td>
                                <td>Rp{{ number_format(@$r->harga_sewa_harian,0,',','.') }},-</td>
                                <td>
                                    @if(@$r->status_mobil == 1)
                                        Mobil Tersedia
                                    @else
                                        Mobil dalam penyewaan
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
@endsection