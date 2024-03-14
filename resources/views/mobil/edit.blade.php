<div class="modal fade" id="modal-edit-mobil-{{ @$r->idmobil }}" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-tittle">Ubah Data Mobil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><i class="fa fa-times"></i></button>
      </div>
      <form action="{{ url('/mobil/store') }}" method="post" class="form-horizontal" autocomplete="off">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-12">Merek</label>
            <input type="text" name="merek" class="form-control" placeholder="Masukan merek mobil" value="{{ @$r->merek }}">
          </div>
          <div class="form-group">
            <label class="control-label col-12">Model</label>
            <input type="text" name="model" class="form-control" placeholder="Masukan model mobil" value="{{ @$r->model }}">
          </div>
          <div class="form-group">
            <label class="control-label col-12">No. Plat</label>
            <input type="text" name="no_plat" class="form-control" placeholder="Masukan no. plat mobil" value="{{ @$r->no_plat }}">
          </div>
          <div class="input-group">
            @if(@$r->status_mobil == 1)
                <label class="control-label col-12">Harga Sewa/Hari</label>
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        Rp.
                    </div>
                </div>
                <input type="text" name="harga_sewa_harian" class="form-control" placeholder="Masukan harga sewa harian mobil" value="{{ @$r->harga_sewa_harian }}">
            @else
                <label class="control-label col-12">Harga Sewa/Hari = {{ @$r->harga_sewa_harian }}</label>
                <p class="text-justify">
                    <strong>*Catatan!</strong> Saat ini, mobil sedang dalam masa peminjaman, harga sewa/hari tidak dapat diubah sebelum mobil ini kembali
                </p>
            @endif
          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group">
            <button type="submit" class="btn btn-sm btn-warning btn-block"><i class="fa fa-check"></i> Ubah Data</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>