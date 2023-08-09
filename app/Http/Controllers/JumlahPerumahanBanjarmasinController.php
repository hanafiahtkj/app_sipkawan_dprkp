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
use App\Models\JumlahPerumahanBanjarmasin;
use App\Exports\JumlahPerumahanBanjarmasinExport;
use Maatwebsite\Excel\Facades\Excel;

class JumlahPerumahanBanjarmasinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jumlah-perumahan-banjarmasin.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jumlah-perumahan-banjarmasin.create', [
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
            'jumlah_rumah_umum' => 'required',
            'jumlah_rumah_komersil'  => 'required',
            'jumlah_rumah_swadaya'   => 'required',
            'sumber_data'   => 'required',
        ]);

        $input = $request->all();
        $dataInput = JumlahPerumahanBanjarmasin::create($input);

        return redirect()->route('boilerplate.jumlah-perumahan-banjarmasin.edit', $dataInput)
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
            'dataInput' => JumlahPerumahanBanjarmasin::find($id),
            'kecamatan' => Kecamatan::get(),
        ];
        $keldes = KelDesa::find($data['dataInput']->id_kelurahan);
        $data['keldes'] = $keldes;

        return view('jumlah-perumahan-banjarmasin.edit', $data);
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
            'jumlah_rumah_umum' => 'required',
            'jumlah_rumah_komersil'  => 'required',
            'jumlah_rumah_swadaya'   => 'required',
            'sumber_data'   => 'required',
        ]);

        $dataInput = JumlahPerumahanBanjarmasin::find($id);
        $dataInput->update($request->all());

        return redirect()->route('boilerplate.jumlah-perumahan-banjarmasin.edit', $dataInput)
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
        $dataInput = JumlahPerumahanBanjarmasin::findOrFail($id);

        return response()->json(['success' => $dataInput->delete() ?? false]);
    }

    public function export()
    {
        return Excel::download(new JumlahPerumahanBanjarmasinExport, 'jumlah-perumahan-banjarmasin.xlsx');
    }
}
