<div class="modal fade" id="modal-add-penyewaan" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-tittle">Sewa mobil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><i class="fa fa-times"></i></button>
      </div>
      <form action="{{ url('/penyewaan/store') }}" method="post" class="form-horizontal" autocomplete="off">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-12">Pilih Mobil</label>
            <select class="form-control" name="idmobil">
              @foreach(@$result2 as $r2)
                <option value="{{ @$r2->idmobil }}">{{ @$r2->merek }} {{ @$r2->model }} ({{ @$r2->no_plat }}) | Rp{{ number_format(@$r2->harga_sewa_harian,0,',','.') }},-/Hari</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="control-label col-12">Tgl. Mulai Sewa</label>
            <input type="datetime-local" class="form-control" name="tgl_mulai" min="{{ date('Y-m-d 00:00:00') }}">
          </div>
          <div class="form-group">
            <label class="control-label col-12">Tgl. Akhir Sewa</label>
            <input type="date" class="form-control" name="tgl_akhir" min="{{ date('Y-m-d') }}">
          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary btn-block"><i class="fa fa-check"></i> Sewa</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>