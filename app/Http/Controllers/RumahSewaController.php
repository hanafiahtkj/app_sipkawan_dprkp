<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\Kecamatan;
use App\Models\KelDesa;
use App\Models\RumahSewa;
use App\Exports\RumahSewaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RumahSewaImport;

class RumahSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rumah-sewa.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rumah-sewa.create', [
            'kecamatan' => Kecamatan::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun'             => 'required',
            'jenis'  => 'required',
            'alamat'        => 'required',
            'id_kecamatan'  => 'required',
            'id_kelurahan'  => 'required',
            'luas_hunian'   => 'required',
            'jumlah_hunian' => 'required',
            'tarif_sewa'    => 'required',
            'kondisi_hunian'=> 'required',
            'keterangan'    => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imagePath = $image->store('rumahsewa', 'public');
            $input['gambar_path'] = $imagePath;
        }
        $dataInput = RumahSewa::create($input);

        return redirect()->route('boilerplate.rumah-sewa.edit', $dataInput)
                            ->with('growl', [__('boilerplate::rawanbahaya.successadd'), 'success']);
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
        $data = [
            'dataInput' => RumahSewa::find($id),
            'kecamatan' => Kecamatan::get(),
        ];
        $keldes = KelDesa::find($data['dataInput']->id_kelurahan);
        $data['keldes'] = $keldes;

        return view('rumah-sewa.edit', $data);
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
        $this->validate($request, [
            'tahun'             => 'required',
            'jenis'  => 'required',
            'alamat'        => 'required',
            'id_kecamatan'  => 'required',
            'id_kelurahan'  => 'required',
            'luas_hunian'   => 'required',
            'jumlah_hunian' => 'required',
            'tarif_sewa'    => 'required',
            'kondisi_hunian'=> 'required',
            'keterangan'    => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $dataInput = RumahSewa::find($id);
        $input = $request->all();
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imagePath = $image->store('rumahsewa', 'public');
            $input['gambar_path'] = $imagePath;
        }
        $dataInput->update($input);

        return redirect()->route('boilerplate.rumah-sewa.edit', $dataInput)
                         ->with('growl', [__('boilerplate::rumahsewa.successmod'), 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataInput = RumahSewa::findOrFail($id);

        return response()->json(['success' => $dataInput->delete() ?? false]);
    }

    public function export()
    {
        return Excel::download(new RumahSewaExport, 'rumah-sewa.xlsx');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file_excel' => 'required',
        ]);

        Excel::import(new RumahSewaImport, request()->file('file_excel'));

        return redirect()->route('boilerplate.rumah-sewa.index')
                            ->with('growl', [__('boilerplate::rumahsewa.successadd'), 'success']);
    }
}
