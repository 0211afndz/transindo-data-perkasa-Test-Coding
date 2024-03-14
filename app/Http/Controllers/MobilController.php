<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tmobil;

class MobilController extends Controller
{
    public function index()
    {
        $data['result'] = tmobil::all();

        return view('mobil/index')->with($data);
    }

    public function store(Request $request)
    {
        $rules = [
            'merek' => 'required|max:100',
            'model' => 'required|max:100',
            'no_plat' => 'required|max:10',
            'harga_sewa_harian' => 'required',
        ];

        $message = [
            'merek.required' => 'Harap isikan merek mobil',
            'merek.max' => 'Merek mobil tidak lebih dari 100 karakter',
            'model.required' => 'Harap isikan model mobil',
            'model.max' => 'Model mobil tidak lebih dari 100 karakter',
            'no_plat' => 'Harap isikan no. plat mobil',
            'no_plat.max' => 'No. plat mobil tidak lebih dari 10 karakter',
            'harga_sewa_harian.required'  => 'Harap isikan harga sewa/hari mobil',
        ];

        $request->validate($rules, $message);

        try{
            $input = $request->except('_token');

            tmobil::create(array_merge($input, ['status_mobil' => 1]));

            return redirect('mobil')->with('success','Data berhasil tersimpan');
        }catch(\Throwable $e){
            return redirect('mobil')->with('error','Terjadi Error : '.$e);
        }
    }
}
