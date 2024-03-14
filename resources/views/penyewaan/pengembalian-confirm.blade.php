<div class="modal fade" id="modal-pengembalian-confirm" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-tittle">Sewa mobil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><i class="fa fa-times"></i></button>
      </div>
      <form action="{{ url('/penyewaan/act') }}" method="post" class="form-horizontal" autocomplete="off">
        {{ csrf_field() }}
        <div class="modal-body">
            <input type="hidden" name="denda" class="form-control" value="{{ ((@$penyewaan->mobil->harga_sewa_harian*@$penyewaan->jumlah_hari) + ((@$penyewaan->mobil->harga_sewa_harian*0.05)*@$diff)) }}" readonly>
            <input type="hidden" name="idpenyewaan" class="form-control" value="{{ @$penyewaan->idpenyewaan }}" readonly>
            <p class="text-justify">
                <strong><font color="red">Perhatian!</font></strong> Harap periksa kembali secara seksama halaman detail penyewaan, pastikan anda memahami total biaya (biaya sewa + denda)
            </p>          
            <label class="label-control">
                Konfirmasi Pengembalian Mobil (No. Plat Mobil)
            </label>
            <input type="text" class="form-control" name="no_plat" placeholder="Isikan No. Plat Mobil">
        </div>
        <div class="modal-footer">
          <div class="form-group">
            <button type="submit" class="btn btn-sm btn-success btn-block" name="status_penyewaan" value="4"><i class="fa fa-check"></i> Selesaikan Penyewaan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>