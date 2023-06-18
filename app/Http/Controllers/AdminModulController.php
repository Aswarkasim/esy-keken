<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $modul = Modul::paginate(10);

        $data = [
            'title'   => 'Manajemen Modul',
            'modul' => $modul,
            'content' => 'admin/modul/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $data = [
            'title'   => 'Manajemen Modul',
            'content' => 'admin/modul/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name'        => 'required',
            'modul'         => 'required:mimes:pdf',
        ]);

        //perbaiki upload modulnya
        if ($request->hasFile('modul')) {
            $modul = $request->file('modul');
            $file_name = time() . "_" . $modul->getClientOriginalName();

            $storage = 'uploads/moduls/';
            $modul->move($storage, $file_name);
            $data['modul'] = $storage . $file_name;
        } else {
            $data['modul'] = NULL;
        }

        Modul::create($data);
        Alert::success('Sukses', 'Modul telah ditambahkan');
        return redirect('/admin/modul');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = [
            'title'   => 'Manajemen Modul',
            'modul'    => Modul::find($id),
            'content' => 'admin/modul/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        // die('Adakah');
        $modul = Modul::find($id);
        $data = $request->validate([
            'name'        => 'required',
            'modul'         => 'mimes:pdf',
        ]);

        //perbaiki upload imagenya
        if ($request->hasFile('modul')) {

            if ($modul->modul != '') {
                unlink($modul->modul);
            }

            $file = $request->file('modul');
            $file_name = time() . "_" . $file->getClientOriginalName();

            $storage = 'uploads/moduls/';
            $file->move($storage, $file_name);
            $data['modul'] = $storage . $file_name;
        } else {
            $data['modul'] = $modul->modul;
        }

        $modul->update($data);
        Alert::success('Sukses', 'Modul telah diubah');
        return redirect('/admin/modul');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $modul = Modul::find($id);
        if ($modul->modul != '' || $modul != null) {
            unlink($modul->modul);
        }
        $modul->delete();
        Alert::success('Sukses', 'Modul sukses dihapus');
        return redirect('/admin/modul');
    }
}
