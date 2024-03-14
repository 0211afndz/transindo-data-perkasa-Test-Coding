<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tmobil;
use App\Models\tpenyewaan;
use Auth;
use DateTime;

class PenyewaanController extends Controller
{
    public function index()
    {
        if(Auth::user()->user_level == 1){
            $data['result'] = tpenyewaan::all();
        }else{
            $data['result'] = tpenyewaan::where('iduser',Auth::user()->iduser)->orderBy('tgl_pesan','desc')->get();
            $data['result2'] = tmobil::where('status_mobil',1)->get();
        }

        return view('penyewaan/index')->with($data);
    }

    public function store(Request $request)
    {
        $rules = [
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required|after:'.date('Y-m-d',strtotime($request->tgl_mulai)),
        ];

        $message = [
            'tgl_mulai.required' => 'Harap isikan tgl. awal sewa',
            'tgl_akhir.required' => 'Harap isikan tgl. akhir sewa',
            'tgl_akhir.gt' => 'Tgl. akhir tidak boleh sama atau harus lebih besar dari tgl. awal sewa',
        ];

        $request->validate($rules, $message);

        try{
            $input = $request->except('tgl_mulai','_token');

            $tglAwal = new DateTime(date('Y-m-d', strtotime($request->tgl_mulai)));
            $tglAkhir = new DateTime($request->tgl_akhir);

            tpenyewaan::create(array_merge($input,[
                'tgl_pesan' => date('Y-m-d'),
                'tgl_mulai' => date('Y-m-d',strtotime($request->tgl_mulai)),
                'jam_mulai' => date('H:i:s',strtotime($request->tgl_mulai)),
                'jam_akhir' => date('H:i:s',strtotime($request->tgl_mulai)),
                'jumlah_hari' => date_diff($tglAwal, $tglAkhir)->format('%d'),
                'iduser' => Auth::user()->iduser,
                'status_penyewaan' => 1,
            ]));

            tmobil::where('idmobil',$request->idmobil)->update([
                'status_mobil' => 2,
            ]);

            return redirect('penyewaan')->with('success','Data berhasil tersimpan');
        }catch(\Throwable $e){
            return redirect('penyewaan')->with('error','Terjadi Error : '.$e);
        }
    }

    public function detail($id)
    {
        $cek = tpenyewaan::where('idpenyewaan',$id)->first();
        $tglAkhir = new DateTime(date('Y-m-d', strtotime($cek->tgl_akhir)));
        
        if($cek->tgl_akhir == date('Y-m-d') && $cek->jam_akhir < date('H:i:s')){
            $tglOverLap = new DateTime(date('Y-m-d',strtotime('+1 Day')));
            $data['diff'] = date_diff($tglAkhir, $tglOverLap)->format('%d');
        }elseif(($cek->tgl_akhir == date('Y-m-d') && $cek->jam_akhir > date('H:i:s')) || $cek->tgl_akhir < date('Y-m-d')){
            $tglOverLap = new DateTime(date('Y-m-d'));
            $data['diff'] = date_diff($tglAkhir, $tglOverLap)->format('%d');
        }elseif($cek->tgl_akhir > date('Y-m-d')){
            $data['diff'] = 0;
        }

        $data['penyewaan'] = $cek;

        return view('penyewaan/detail')->with($data);
    }

    public function act(Request $request)
    {
        $penyewaan = $request->idpenyewaan;

        try{
            $cek = tpenyewaan::where('idpenyewaan',$penyewaan)->first();

            if($request->status_penyewaan == 4){
                if($cek->mobil->no_plat != $request->no_plat){
                    return redirect('penyewaan/detail/'.$request->idpenyewaan)->with('warning','Plat nomor mobil tidak sama');
                }else{
                    tmobil::where('idmobil',$cek->idpenyewaan)->update(['status_mobil' => 1]);

                    tpenyewaan::where('idpenyewaan',$penyewaan)->update([
                        'tgl_pengembalian' => date('Y-m-d'),
                        'jam_pengembalian' => date('H:i:s'),
                        'denda' => $request->denda,
                        'total_biaya' => ($cek->mobil->harga_sewa_harian*$cek->jumlah_hari)+$request->denda,
                        'status_penyewaan' => $request->status_penyewaan,
                    ]);
                }
            }else{
                tpenyewaan::where('idpenyewaan',$penyewaan)->update([
                    'status_penyewaan' => $request->status_penyewaan,
                ]);
            }

            return redirect('penyewaan/detail/'.$request->idpenyewaan)->with('success','Data berhasil tersimpan');
        }catch(\Throwable $e){
            return redirect('penyewaan/detail/'.$request->idpenyewaan)->with('error','Terjadi Error : '.$e);
        }
    }
}
