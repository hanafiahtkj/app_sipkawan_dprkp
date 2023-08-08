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
use App\Models\PenggunaanTanah;
use App\Exports\PenggunaanTanahExport;
use Maatwebsite\Excel\Facades\Excel;

class PenggunaanTanahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penggunaan-tanah.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penggunaan-tanah.create', [
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
            'id_kecamatan'      => 'required',
            'id_kelurahan'      => 'required',
            'penggunaan'        => 'required',
            'sertifikat_milik'  => 'required',
            'penggunaan_tanah'  => 'required',
            'pemanfaatan_tanah' => 'required'
        ]);

        $input = $request->all();
        $dataInput = PenggunaanTanah::create($input);

        return redirect()->route('boilerplate.penggunaan-tanah.edit', $dataInput)
                        ->with('growl', [__('boilerplate::penggunaantanah.successadd'), 'success']);
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'dataInput' => PenggunaanTanah::find($id),
            'kecamatan' => Kecamatan::get(),
        ];
        $keldes = KelDesa::find($data['dataInput']->id_kelurahan);
        $data['keldes'] = $keldes;

        return view('penggunaan-tanah.edit', $data);
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
            'id_kecamatan'      => 'required',
            'id_kelurahan'      => 'required',
            'penggunaan'        => 'required',
            'sertifikat_milik'  => 'required',
            'penggunaan_tanah'  => 'required',
            'pemanfaatan_tanah' => 'required'
        ]);

        $dataInput = PenggunaanTanah::find($id);
        $dataInput->update($request->all());

        return redirect()->route('boilerplate.penggunaan-tanah.edit', $dataInput)
                        ->with('growl', [__('boilerplate::penggunaantanah.successmod'), 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataInput = PenggunaanTanah::findOrFail($id);

        return response()->json(['success' => $dataInput->delete() ?? false]);
    }

    public function export()
    {
        return Excel::download(new PenggunaanTanahExport, 'penggunaan-tanah.xlsx');
    }
}
