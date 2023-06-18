<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Modul;
use Illuminate\Http\Request;

class HomeModulController extends Controller
{
    //

    function index()
    {
        $kategori_id = request('kategori_id');

        $modul = Modul::paginate(10);

        $data = [
            'modul'          => $modul,
            'kategori'      => Kategori::all(),
            'kategori_detail' => Kategori::find($kategori_id),
            'content'       => 'home/modul/index'
        ];
        return view('home/layouts/wrapper', $data);
    }


    function download()
    {
        $modul = request('modul');
        return response()->download($modul);
    }
}
