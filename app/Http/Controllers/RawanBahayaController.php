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
use App\Models\RawanBahaya;
use App\Exports\RawanBahayaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RawanBahayaImport;

class RawanBahayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rawan-bahaya.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rawan-bahaya.create', [
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
            'id_kecamatan'  => 'required',
            'id_kelurahan'  => 'required',
            'luas'          => 'required',
            'jumlah_rumah'  => 'required',
            'jumlah_kk'     => 'required',
            'kondisi_ekonomi'    => 'required',
            'status_kepemilikan' => 'required'
        ]);

        $input = $request->all();
        $dataInput = RawanBahaya::create($input);

        return redirect()->route('boilerplate.rawan-bahaya.edit', $dataInput)
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
            'dataInput' => RawanBahaya::find($id),
            'kecamatan' => Kecamatan::get(),
        ];
        $keldes = KelDesa::find($data['dataInput']->id_kelurahan);
        $data['keldes'] = $keldes;

        return view('rawan-bahaya.edit', $data);
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
            'id_kecamatan'  => 'required',
            'id_kelurahan'  => 'required',
            'luas'          => 'required',
            'jumlah_rumah'  => 'required',
            'jumlah_kk'     => 'required',
            'kondisi_ekonomi'    => 'required',
            'status_kepemilikan' => 'required'
        ]);

        $dataInput = RawanBahaya::find($id);
        $dataInput->update($request->all());

        return redirect()->route('boilerplate.rawan-bahaya.edit', $dataInput)
                         ->with('growl', [__('boilerplate::rawanbahaya.successmod'), 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataInput = RawanBahaya::findOrFail($id);

        return response()->json(['success' => $dataInput->delete() ?? false]);
    }

    public function export()
    {
        return Excel::download(new RawanBahayaExport, 'rawan-bahaya.xlsx');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file_excel' => 'required',
        ]);

        Excel::import(new RawanBahayaImport, request()->file('file_excel'));

        return redirect()->route('boilerplate.rawan-bahaya.index')
                            ->with('growl', [__('boilerplate::rawanbahaya.successadd'), 'success']);
    }
}
