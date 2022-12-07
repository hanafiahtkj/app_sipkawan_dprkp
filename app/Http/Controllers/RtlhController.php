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
use App\Models\Rtlh;
use App\Exports\RtlhExport;
use Maatwebsite\Excel\Facades\Excel;

class RtlhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rtlh.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rtlh.create', [
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
            'nama_kk'       => 'required',
            'alamat'        => 'required',
        ]);

        $input = $request->all();

        $foto_sebelum = '';
        if($request->hasFile('foto_sebelum')) {
            $upload_path = 'public/rtlh';
            $filename = time().'_'.$request->file('foto_sebelum')->getClientOriginalName();
            $foto_sebelum = $request->file('foto_sebelum')->storeAs(
                $upload_path, $filename
            );
        }
        $input['foto_sebelum'] = $foto_sebelum;

        $foto_sesudah = '';
        if($request->hasFile('foto_sesudah')) {
            $upload_path = 'public/rtlh';
            $filename = time().'_'.$request->file('foto_sesudah')->getClientOriginalName();
            $foto_sesudah = $request->file('foto_sesudah')->storeAs(
                $upload_path, $filename
            );
        }
        $input['foto_sesudah'] = $foto_sesudah;

        $dataInput = Rtlh::create($input);

        return redirect()->route('boilerplate.rtlh.edit', $dataInput)
                            ->with('growl', [__('boilerplate::rtlh.successadd'), 'success']);
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
            'dataInput' => Rtlh::find($id),
            'kecamatan' => Kecamatan::get(),
        ];
        $keldes = KelDesa::find($data['dataInput']->id_kelurahan);
        $data['keldes'] = $keldes;

        return view('rtlh.edit', $data);
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
            'nama_kk'       => 'required',
            'alamat'        => 'required',
        ]);

        $dataInput = Rtlh::find($id);
        $input = $request->all();

        $foto_sebelum = '';
        if($request->hasFile('foto_sebelum')) {
            $upload_path = 'public/rtlh';
            $filename = time().'_'.$request->file('foto_sebelum')->getClientOriginalName();
            $foto_sebelum = $request->file('foto_sebelum')->storeAs(
                $upload_path, $filename
            );
            $input['foto_sebelum'] = $foto_sebelum;
        }
        else {
            unset($input['foto_sebelum']);
        }

        $foto_sesudah = '';
        if($request->hasFile('foto_sesudah')) {
            $upload_path = 'public/rtlh';
            $filename = time().'_'.$request->file('foto_sesudah')->getClientOriginalName();
            $foto_sesudah = $request->file('foto_sesudah')->storeAs(
                $upload_path, $filename
            );
            $input['foto_sesudah'] = $foto_sesudah;
        }
        else {
            unset($input['foto_sesudah']);
        }

        $dataInput->update($input);

        return redirect()->route('boilerplate.rtlh.edit', $dataInput)
                         ->with('growl', [__('boilerplate::rtlh.successmod'), 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataInput = Rtlh::findOrFail($id);

        return response()->json(['success' => $dataInput->delete() ?? false]);
    }

    public function export()
    {
        return Excel::download(new RtlhExport, 'rtlh.xlsx');
    }
}
