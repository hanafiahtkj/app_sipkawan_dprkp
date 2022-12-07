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
use App\Models\RumahSusun;
use App\Exports\RumahSusunExport;
use Maatwebsite\Excel\Facades\Excel;

class RumahSusunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rumah-susun.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rumah-susun.create', [
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
            'nama_rumah_susun'=> 'required',
            'id_kecamatan'    => 'required',
            'id_kelurahan'    => 'required',
            'alamat'          => 'required',
            'luas'            => 'required',
            'jumlah'          => 'required'
        ]);

        $input = $request->all();
        $dataInput = RumahSusun::create($input);

        return redirect()->route('boilerplate.rumah-susun.edit', $dataInput)
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
            'dataInput' => RumahSusun::find($id),
            'kecamatan' => Kecamatan::get(),
        ];
        $keldes = KelDesa::find($data['dataInput']->id_kelurahan);
        $data['keldes'] = $keldes;

        return view('rumah-susun.edit', $data);
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
            'nama_rumah_susun'=> 'required',
            'id_kecamatan'    => 'required',
            'id_kelurahan'    => 'required',
            'alamat'          => 'required',
            'luas'            => 'required',
            'jumlah'          => 'required'
        ]);

        $dataInput = RumahSusun::find($id);
        $dataInput->update($request->all());

        return redirect()->route('boilerplate.rumah-susun.edit', $dataInput)
                         ->with('growl', [__('boilerplate::rumahsusun.successmod'), 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataInput = RumahSusun::findOrFail($id);

        return response()->json(['success' => $dataInput->delete() ?? false]);
    }

    public function export()
    {
        return Excel::download(new RumahSusunExport, 'sebaran-komplek.xlsx');
    }
}
