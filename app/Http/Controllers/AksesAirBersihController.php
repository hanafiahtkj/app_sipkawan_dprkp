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
use App\Models\AksesAirBersih;
use App\Exports\AksesAirBersihExport;
use Maatwebsite\Excel\Facades\Excel;

class AksesAirBersihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('akses-air-bersih.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akses-air-bersih.create', [
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
            'jenis_klasifikasi' => 'required',
            'jumlah_rumah'  => 'required',
            'sumber_data'   => 'required',
        ]);

        $input = $request->all();
        $dataInput = AksesAirBersih::create($input);

        return redirect()->route('boilerplate.akses-air-bersih.edit', $dataInput)
                            ->with('growl', [__('Data Berhasih ditambahakan.'), 'success']);
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
            'dataInput' => AksesAirBersih::find($id),
            'kecamatan' => Kecamatan::get(),
        ];
        $keldes = KelDesa::find($data['dataInput']->id_kelurahan);
        $data['keldes'] = $keldes;

        return view('akses-air-bersih.edit', $data);
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
            'jenis_klasifikasi' => 'required',
            'jumlah_rumah'  => 'required',
            'sumber_data'   => 'required',
        ]);

        $dataInput = AksesAirBersih::find($id);
        $dataInput->update($request->all());

        return redirect()->route('boilerplate.akses-air-bersih.edit', $dataInput)
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
        $dataInput = AksesAirBersih::findOrFail($id);

        return response()->json(['success' => $dataInput->delete() ?? false]);
    }

    public function export()
    {
        return Excel::download(new AksesAirBersihExport, 'akses-air-bersih.xlsx');
    }
}
