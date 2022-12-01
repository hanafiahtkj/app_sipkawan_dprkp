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
use App\Models\PengadaanPsu;

class PengadaanPsuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengadaan-psu.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengadaan-psu.create');
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
            'nama_perumahan'    => 'required',
            'jenis'             => 'required',
            'luas'              => 'required',
            'status'            => 'required'
        ]);

        $input = $request->all();
        $dataInput = PengadaanPsu::create($input);

        return redirect()->route('boilerplate.pengadaan-psu.edit', $dataInput)
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
        return view('pengadaan-psu.edit', [
            'dataInput' => PengadaanPsu::find($id),
        ]);
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
            'nama_perumahan'    => 'required',
            'jenis'             => 'required',
            'luas'              => 'required',
            'status'            => 'required'
        ]);

        $dataInput = PengadaanPsu::find($id);
        $dataInput->update($request->all());

        return redirect()->route('boilerplate.pengadaan-psu.edit', $dataInput)
                         ->with('growl', [__('boilerplate::pengadaanpsu.successmod'), 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataInput = PengadaanPsu::findOrFail($id);

        return response()->json(['success' => $dataInput->delete() ?? false]);
    }
}
