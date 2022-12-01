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
use App\Models\KawasanKumuh;

class KawasanKumuhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kawasan-kumuh.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kawasan-kumuh.create', [
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
            'id_kecamatan'  => 'required',
            'id_kelurahan'  => 'required',
            'jumlah_rumah'  => 'required',
            'jumlah_kk'     => 'required'
        ]);

        $input = $request->all();
        $dataInput = KawasanKumuh::create($input);

        return redirect()->route('boilerplate.kawasan-kumuh.edit', $dataInput)
                        ->with('growl', [__('boilerplate::kawasankumuh.successadd'), 'success']);
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
            'dataInput' => KawasanKumuh::find($id),
            'kecamatan' => Kecamatan::get(),
        ];
        $keldes = KelDesa::find($data['dataInput']->id_kelurahan);
        $data['keldes'] = $keldes;

        return view('kawasan-kumuh.edit', $data);
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
            'id_kecamatan'  => 'required',
            'id_kelurahan'  => 'required',
            'jumlah_rumah'  => 'required',
            'jumlah_kk'     => 'required',
        ]);

        $dataInput = KawasanKumuh::find($id);
        $dataInput->update($request->all());

        return redirect()->route('boilerplate.kawasan-kumuh.edit', $dataInput)
                        ->with('growl', [__('boilerplate::kawasankumuh.successmod'), 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataInput = KawasanKumuh::findOrFail($id);

        return response()->json(['success' => $dataInput->delete() ?? false]);
    }
}
