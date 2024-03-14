@extends('layout/header')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail penyewaan</h1>
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
            <div class="card-title">
                <a href="{{ url('penyewaan') }}" class="btn btn-sm btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>

            <div class="card-tools">
                <form method="post" class="form-horizontal" action="{{ url('penyewaan/act') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="idpenyewaan" class="form-control" value="{{ @$penyewaan->idpenyewaan }}" readonly>
                    @if(Auth::user()->user_level == 1 && @$penyewaan->status_penyewaan == 1)
                        <button type="submit" class="btn btn-sm btn-success" name="status_penyewaan" value="2">
                            <i class="fa fa-check"></i> Terima pesanan sewaan
                        </button>
                    @elseif(Auth::user()->user_level == 1 && @$penyewaan->status_penyewaan == 2)
                        <button type="submit" class="btn btn-sm btn-info" name="status_penyewaan" value="3">
                            <i class="fa fa-check"></i> Konfirmasi mobil telah diambil oleh penyewa
                        </button>
                    @elseif(Auth::user()->user_level != 1 && @$penyewaan->status_penyewaan == 3)
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-pengembalian-confirm">
                            <i class="fa fa-check"></i> Pengembalian Mobil
                        </button>
                        @include('penyewaan/pengembalian-confirm')
                    @endif
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @if(Auth::user()->user_level == 1)
                    <div class="col-12 col-lg-3">
                        <p class="text-justify">
                            <strong>Nama Penyewa</strong>
                        </p>
                    </div>
                    <div class="col-12 col-lg-9">
                        <p class="text-justify">
                            {{ @$penyewaan->user->nama_user }}
                        </p>
                    </div>
                    <div class="col-12 col-lg-3">
                        <p class="text-justify">
                            <strong>Alamat Penyewa</strong>
                        </p>
                    </div>
                    <div class="col-12 col-lg-9">
                        <p class="text-justify">
                            {{ @$penyewaan->user->alamat_user }}
                        </p>
                    </div>
                    <div class="col-12 col-lg-3">
                        <p class="text-justify">
                            <strong>No. Telepon</strong>
                        </p>
                    </div>
                    <div class="col-12 col-lg-9">
                        <p class="text-justify">
                            {{ @$penyewaan->user->no_telp }}
                        </p>
                    </div>
                    <div class="col-12 col-lg-3">
                        <p class="text-justify">
                            <strong>No. SIM</strong>
                        </p>
                    </div>
                    <div class="col-12 col-lg-9">
                        <p class="text-justify">
                            {{ @$penyewaan->user->no_sim }}
                        </p>
                    </div>
                @endif
                <div class="col-12 col-lg-3">
                    <p class="text-justify">
                        <strong>Mobil yang Disewa</strong>
                    </p>
                </div>
                <div class="col-12 col-lg-9">
                    <p class="text-justify">
                        {{ @$penyewaan->mobil->merek }} {{ @$penyewaan->mobil->model }} ({{ @$penyewaan->mobil->no_plat }})
                    </p>
                </div>
                <div class="col-12 col-lg-3">
                    <p class="text-justify">
                        <strong>Harga Sewa/Hari</strong>
                    </p>
                </div>
                <div class="col-12 col-lg-9">
                    <p class="text-justify">
                        Rp{{ number_format(@$penyewaan->mobil->harga_sewa_harian,0,',','.') }},- 
                    </p>
                </div>
                <div class="col-12 col-lg-3">
                    <p class="text-justify">
                        <strong>Status Penyewaan</strong>
                    </p>
                </div>
                <div class="col-12 col-lg-9">
                    <p class="text-justify">
                        @if(@$penyewaan->status_penyewaan == 1)
                            Data penyewaan berhasil tersimpan, menunggu konfirmasi
                        @elseif(@$penyewaan->status_penyewaan == 2)
                            Penyewaan diterima, mobil dapat digunakan pada tanggal yang telah ditentukan
                        @elseif(@$penyewaan->status_penyewaan == 3)
                            Mobil sedang disewa
                        @elseif(@$penyewaan->status_penyewaan == 4)
                            Mobil telah kembali, penyewaan selesai
                        @endif
                    </p>
                </div>
                <div class="col-12">
                    <hr>
                </div>
                <div class="col-12 col-lg-3">
                    <p class="text-justify">
                        <strong>Tgl. Pesan</strong>
                    </p>
                </div>
                <div class="col-12 col-lg-9">
                    <p class="text-justify">
                        {{ date('d M Y', strtotime(@$penyewaan->tgl_pesan)) }}
                    </p>
                </div>
                
                <div class="col-12 col-lg-3">
                    <p class="text-justify">
                        <strong>Tgl. Mulai Sewa</strong>
                    </p>
                </div>
                <div class="col-12 col-lg-9">
                    <p class="text-justify">
                        {{ date('d M Y H:i:s', strtotime(@$penyewaan->tgl_mulai.' '.@$penyewaan->jam_mulai)) }}
                    </p>
                </div>
                <div class="col-12 col-lg-3">
                    <p class="text-justify">
                        <strong>Tgl. Akhir Sewa</strong>
                    </p>
                </div>
                <div class="col-12 col-lg-9">
                    <p class="text-justify">
                        {{ date('d M Y H:i:s', strtotime(@$penyewaan->tgl_akhir.' '.@$penyewaan->jam_akhir)) }}
                    </p>
                </div>
                <div class="col-12 col-lg-3">
                    <p class="text-justify">
                        <strong>Jumlah Hari</strong>
                    </p>
                </div>
                <div class="col-12 col-lg-9">
                    <p class="text-justify">
                        {{ @$penyewaan->jumlah_hari }} Hari
                    </p>
                </div>
                <div class="col-12 col-lg-3">
                    <p class="text-justify">
                        <strong>Biaya sewa</strong>
                    </p>
                </div>
                <div class="col-12 col-lg-9">
                    <p class="text-justify">
                        Rp{{ number_format(@$penyewaan->mobil->harga_sewa_harian*@$penyewaan->jumlah_hari,0,',','.') }},-
                    </p>
                </div>
                <div class="col-12 col-lg-3">
                    <p class="text-justify">
                        <strong>Denda (5% Dari Harga Sewa/Hari)</strong>
                    </p>
                </div>
                <div class="col-12 col-lg-9">
                    <p class="text-justify">
                    Rp{{ number_format((@$penyewaan->mobil->harga_sewa_harian*0.05)*@$diff,0,',','.') }},-
                    </p>
                </div>
                <div class="col-12 col-lg-3">
                    <p class="text-justify">
                        <strong>Total Pembayaran</strong>
                    </p>
                </div>
                <div class="col-12 col-lg-9">
                    <p class="text-justify">
                        Rp{{ number_format(((@$penyewaan->mobil->harga_sewa_harian*@$penyewaan->jumlah_hari) + ((@$penyewaan->mobil->harga_sewa_harian*0.05)*@$diff)),0,',','.') }},-
                    </p>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection