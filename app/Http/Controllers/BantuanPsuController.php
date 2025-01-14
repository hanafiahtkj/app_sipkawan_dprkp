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
use App\Models\BantuanPsu;
use App\Exports\BantuanPsuExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BantuanPsuImport;

class BantuanPsuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bantuan-psu.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bantuan-psu.create', [
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
            'status_aset'     => 'required',
            'nama_perumahan'  => 'required',
            'id_kecamatan'    => 'required',
            'id_kelurahan'    => 'required',
            'jumlah_sertifikat' => 'required',
            'jenis_psu'       => 'required',
            'panjang'         => 'required',
            'lebar'           => 'required',
            'jenis_sarana'    => 'required',
            'foto_rumah' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_psu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $input = $request->all();

        $input = $request->all();
        if ($request->hasFile('foto_rumah')) {
            $image = $request->file('foto_rumah');
            $imagePath = $image->store('bantuanpsu', 'public');
            $input['foto_rumah_path'] = $imagePath;
        }

        if ($request->hasFile('foto_psu')) {
            $image = $request->file('foto_psu');
            $imagePath = $image->store('bantuanpsu', 'public');
            $input['foto_psu_path'] = $imagePath;
        }
        $dataInput = BantuanPsu::create($input);

        return redirect()->route('boilerplate.bantuan-psu.edit', $dataInput)
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
            'dataInput' => BantuanPsu::find($id),
            'kecamatan' => Kecamatan::get(),
        ];
        $keldes = KelDesa::find($data['dataInput']->id_kelurahan);
        $data['keldes'] = $keldes;

        return view('bantuan-psu.edit', $data);
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
            'status_aset'     => 'required',
            'nama_perumahan'  => 'required',
            'id_kecamatan'    => 'required',
            'id_kelurahan'    => 'required',
            'jumlah_sertifikat' => 'required',
            'jenis_psu'       => 'required',
            'panjang'         => 'required',
            'lebar'           => 'required',
            'jenis_sarana'    => 'required',
            'foto_rumah' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_psu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $dataInput = BantuanPsu::find($id);
        $input = $request->all();
        if ($request->hasFile('foto_rumah')) {
            $image = $request->file('foto_rumah');
            $imagePath = $image->store('bantuanpsu', 'public');
            $input['foto_rumah_path'] = $imagePath;
        }

        if ($request->hasFile('foto_psu')) {
            $image = $request->file('foto_psu');
            $imagePath = $image->store('bantuanpsu', 'public');
            $input['foto_psu_path'] = $imagePath;
        }

        $dataInput->update($input);

        return redirect()->route('boilerplate.bantuan-psu.edit', $dataInput)
                         ->with('growl', [__('boilerplate::sebarankomplek.successmod'), 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataInput = BantuanPsu::findOrFail($id);

        return response()->json(['success' => $dataInput->delete() ?? false]);
    }

    public function export()
    {
        return Excel::download(new BantuanPsuExport, 'bantuan-psu.xlsx');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file_excel' => 'required',
        ]);

        Excel::import(new BantuanPsuImport, request()->file('file_excel'));

        return redirect()->route('boilerplate.bantuan-psu.index')
                            ->with('growl', [__('boilerplate::rawanbahaya.successadd'), 'success']);
    }
}
