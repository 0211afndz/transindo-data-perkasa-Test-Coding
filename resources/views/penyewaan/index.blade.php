@extends('layout/header')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data penyewaan</h1>
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
                @if(Auth::user()->user_level != 1)
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add-penyewaan"><i class="fa fa-car"></i> Sewa Mobil</button>
                    @include('penyewaan/add')
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="col-12">
                <table class="table table-border table-hover dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tgl. Pesan</th>
                            <th>Mulai Sewa</th>
                            <th>Akhir Sewa</th>
                            <th>Jumlah Hari</th>
                            <th>Mobil</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(@$result as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d M Y',strtotime(@$r->tgl_pesan)) }}</td>
                                <td>{{ date('d M Y H:i:s',strtotime(@$r->tgl_mulai.' '.@$r->jam_mulai)) }}</td>
                                <td>{{ date('d M Y H:i:s',strtotime(@$r->tgl_akhir.' '.@$r->jam_akhir)) }}</td>
                                <td>{{ @$r->jumlah_hari }} Hari</td>
                                <td>{{ @$r->mobil->merek }} {{ @$r->mobil->model }} ({{ @$r->mobil->no_plat }})</td>
                                <td>
                                    @if(@$r->status_penyewaan == 1)
                                        Data penyewaan berhasil tersimpan, menunggu konfirmasi
                                    @elseif(@$r->status_penyewaan == 2)
                                        Penyewaan diterima, mobil dapat digunakan pada tanggal yang telah ditentukan
                                    @elseif(@$r->status_penyewaan == 3)
                                        Mobil sedang disewa
                                    @elseif(@$r->status_penyewaan == 4)
                                        Mobil telah kembali, penyewaan selesai
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('penyewaan/detail/'.@$r->idpenyewaan) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Detail Data</a>
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