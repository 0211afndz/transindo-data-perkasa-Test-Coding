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
        <div class="card-header">
            <h3 class="card-title"></h3>

            <div class="card-tools">
                @if(Auth::user()->user_level == 1)
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add-mobil"><i class="fa fa-plus"></i> Tambah Data Mobil</button>
                    @include('mobil/add')
                @endif
            </div>
        </div>
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
                            <th>Aksi</th>
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
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit-mobil-{{ @$r->idmobil }}" title="Ubah data"><i class="fa fa-pen"></i></button>
                                    @include('mobil/edit')
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