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
use App\Models\PengajuanPsu;
use App\Exports\PengajuanPsuExport;
use Maatwebsite\Excel\Facades\Excel;

class PengajuanPsuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengajuan-psu.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengajuan-psu.create');
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
            'tanggal'           => 'required',
            'status'            => 'required'
        ]);

        $input = $request->all();
        $dataInput = PengajuanPsu::create($input);

        return redirect()->route('boilerplate.pengajuan-psu.edit', $dataInput)
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
        return view('pengajuan-psu.edit', [
            'dataInput' => PengajuanPsu::find($id),
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
            'tanggal'           => 'required',
            'status'            => 'required'
        ]);

        $dataInput = PengajuanPsu::find($id);
        $dataInput->update($request->all());

        return redirect()->route('boilerplate.pengajuan-psu.edit', $dataInput)
                         ->with('growl', [__('boilerplate::pengajuanpsu.successmod'), 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataInput = PengajuanPsu::findOrFail($id);

        return response()->json(['success' => $dataInput->delete() ?? false]);
    }

    public function export()
    {
        return Excel::download(new PengajuanPsuExport, 'pengajuan-psu.xlsx');
    }
}
