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
use App\Models\JumlahPenerbitanSertifikat;
use App\Exports\JumlahPenerbitanSertifikatExport;
use Maatwebsite\Excel\Facades\Excel;

class JumlahPenerbitanSertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jumlah-penerbitan-sertifikat.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jumlah-penerbitan-sertifikat.create', [
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
            'tahun'         => 'required',
            'id_kecamatan'  => 'required',
            'id_kelurahan'  => 'required',
            'shgb'          => 'required',
            'shm'           => 'required',
            'sumber_data'   => 'required',
        ]);

        $input = $request->all();
        $dataInput = JumlahPenerbitanSertifikat::create($input);

        return redirect()->route('boilerplate.jumlah-penerbitan-sertifikat.edit', $dataInput)
                            ->with('growl', [__('boilerplate::jumlah-penerbitan-sertifikat.successadd'), 'success']);
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
            'dataInput' => JumlahPenerbitanSertifikat::find($id),
            'kecamatan' => Kecamatan::get(),
        ];
        $keldes = KelDesa::find($data['dataInput']->id_kelurahan);
        $data['keldes'] = $keldes;

        return view('jumlah-penerbitan-sertifikat.edit', $data);
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
            'tahun'         => 'required',
            'id_kecamatan'  => 'required',
            'id_kelurahan'  => 'required',
            'shgb'          => 'required',
            'shm'           => 'required',
            'sumber_data'   => 'required',
        ]);

        $dataInput = JumlahPenerbitanSertifikat::find($id);
        $dataInput->update($request->all());

        return redirect()->route('boilerplate.jumlah-penerbitan-sertifikat.edit', $dataInput)
                         ->with('growl', [__('Data Berhasil dirubah.'), 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataInput = JumlahPenerbitanSertifikat::findOrFail($id);

        return response()->json(['success' => $dataInput->delete() ?? false]);
    }

    public function export()
    {
        return Excel::download(new JumlahPenerbitanSertifikatExport, 'jumlah-penerbitan-sertifikat.xlsx');
    }
}
