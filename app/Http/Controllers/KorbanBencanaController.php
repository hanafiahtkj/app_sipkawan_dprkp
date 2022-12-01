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
use App\Models\KorbanBencana;
use App\Exports\KorbanBencanaExport;
use Maatwebsite\Excel\Facades\Excel;

class KorbanBencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('korban-bencana.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('korban-bencana.create', [
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
            'jenis'  => 'required',
            'tahun'         => 'required',
            'id_kecamatan'  => 'required',
            'id_kelurahan'  => 'required',
            'rw'            => 'required',
            'rt'            => 'required',
            'jalan'         => 'required',
            'nama_kk'       => 'required',
            'nik'           => 'required',
            'jml_anggota_keluarga'  => 'required',
            'kondisi_ekonomi'       => 'required',
            'tingkat_kerusakan'     => 'required',
            'status_kepemilikan'    => 'required',
            'status'                => 'required'
        ]);

        $input = $request->all();
        $dataInput = KorbanBencana::create($input);

        return redirect()->route('boilerplate.korban-bencana.edit', $dataInput)
                            ->with('growl', [__('boilerplate::korbanbencana.successadd'), 'success']);
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
            'dataInput' => KorbanBencana::find($id),
            'kecamatan' => Kecamatan::get(),
        ];
        $keldes = KelDesa::find($data['dataInput']->id_kelurahan);
        $data['keldes'] = $keldes;

        return view('korban-bencana.edit', $data);
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
            'jenis'  => 'required',
            'tahun'         => 'required',
            'id_kecamatan'  => 'required',
            'id_kelurahan'  => 'required',
            'rw'            => 'required',
            'rt'            => 'required',
            'jalan'         => 'required',
            'nama_kk'       => 'required',
            'nik'           => 'required',
            'jml_anggota_keluarga'  => 'required',
            'kondisi_ekonomi'       => 'required',
            'tingkat_kerusakan'     => 'required',
            'status_kepemilikan'    => 'required',
            'status'                => 'required'
        ]);

        $dataInput = KorbanBencana::find($id);
        $dataInput->update($request->all());

        return redirect()->route('boilerplate.korban-bencana.edit', $dataInput)
                         ->with('growl', [__('boilerplate::korbanbencana.successmod'), 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataInput = KorbanBencana::findOrFail($id);

        return response()->json(['success' => $dataInput->delete() ?? false]);
    }

    public function export()
    {
        return Excel::download(new KorbanBencanaExport, 'korban-bencana.xlsx');
    }
}
