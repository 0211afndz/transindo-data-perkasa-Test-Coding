<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tmobil;

class HomeController extends Controller
{
    public function index()
    {
        $data['result'] = tmobil::all();

        return view('home/index')->with($data);
    }
}