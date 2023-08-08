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
use App\Models\RawanBencana;
use App\Exports\RawanBencanaExport;
use Maatwebsite\Excel\Facades\Excel;

class RawanBencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rawan-bencana.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rawan-bencana.create', [
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
            'tingkat_kerawanan' => 'required',
            'id_kecamatan'  => 'required',
            'id_kelurahan'  => 'required',
            'rw'            => 'required',
            'rt'            => 'required',
            'luas'          => 'required',
            'jumlah_rumah'  => 'required',
            'jumlah_kk'     => 'required',
            'jumlah_jiwa'   => 'required',
            'kondisi_fisik'      => 'required',
            'status_kepemilikan' => 'required'
        ]);

        $input = $request->all();
        $dataInput = RawanBencana::create($input);

        return redirect()->route('boilerplate.rawan-bencana.edit', $dataInput)
                            ->with('growl', [__('boilerplate::rawanbencana.successadd'), 'success']);
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
            'dataInput' => RawanBencana::find($id),
            'kecamatan' => Kecamatan::get(),
        ];
        $keldes = KelDesa::find($data['dataInput']->id_kelurahan);
        $data['keldes'] = $keldes;

        return view('rawan-bencana.edit', $data);
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
            'tingkat_kerawanan' => 'required',
            'id_kecamatan'  => 'required',
            'id_kelurahan'  => 'required',
            'rw'            => 'required',
            'rt'            => 'required',
            'luas'          => 'required',
            'jumlah_rumah'  => 'required',
            'jumlah_kk'     => 'required',
            'jumlah_jiwa'   => 'required',
            'kondisi_fisik'      => 'required',
            'status_kepemilikan' => 'required'
        ]);

        $dataInput = RawanBencana::find($id);
        $dataInput->update($request->all());

        return redirect()->route('boilerplate.rawan-bencana.edit', $dataInput)
                            ->with('growl', [__('boilerplate::rawanbencana.successmod'), 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataInput = RawanBencana::findOrFail($id);

        return response()->json(['success' => $dataInput->delete() ?? false]);
    }

    public function export()
    {
        return Excel::download(new RawanBencanaExport, 'rawan-bencana.xlsx');
    }
}
