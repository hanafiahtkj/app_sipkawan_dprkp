<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\KelDesa;
use App\Models\ProfileKelurahan;

class ProfileKelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile-kelurahan.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile-kelurahan.create', [
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
            'id_kecamatan'    => 'required',
            'id_kelurahan'    => 'required',
            'luas_wilayah'    => 'required',
            'jumlah_rumah'    => 'required',
            'jumlah_rt'       => 'required',
            'jumlah_kk'       => 'required',
            'jumlah_penduduk' => 'required',
            'jumlah_rtlh'     => 'required',
            'keterangan'      => 'required',
        ]);

        $input = $request->all();
        $dataInput = ProfileKelurahan::create($input);

        return redirect()->route('boilerplate.profile-kelurahan.edit', $dataInput)
                            ->with('growl', [__('boilerplate::profilekelurahan.successadd'), 'success']);
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
            'dataInput' => ProfileKelurahan::find($id),
            'kecamatan' => Kecamatan::get(),
        ];
        $keldes = KelDesa::find($data['dataInput']->id_kelurahan);
        $data['keldes'] = $keldes;

        return view('profile-kelurahan.edit', $data);
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
            'id_kecamatan'    => 'required',
            'id_kelurahan'    => 'required',
            'luas_wilayah'    => 'required',
            'jumlah_rumah'    => 'required',
            'jumlah_rt'       => 'required',
            'jumlah_kk'       => 'required',
            'jumlah_penduduk' => 'required',
            'jumlah_rtlh'     => 'required',
            'keterangan'      => 'required',
        ]);

        $dataInput = ProfileKelurahan::find($id);
        $dataInput->update($request->all());

        return redirect()->route('boilerplate.profile-kelurahan.edit', $dataInput)
                         ->with('growl', [__('boilerplate::profilekelurahan.successmod'), 'success']);
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
    }
}
