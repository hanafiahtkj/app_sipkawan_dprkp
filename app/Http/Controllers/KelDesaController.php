<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\KelDesa;

class KelDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kel-desa.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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

    public function refresh()
    {
        try{
            $kecamatan = Kecamatan::get();

            foreach ($kecamatan as $key => $value)
            {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.banjarmasinkota.go.id/api/kelurahanDesa/'.$value->kode_kec,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Bearer mFvXhvrL2ANxUsrbbPkriCJJgHBSsLp072zPVDTy'
                    ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);

                $response = json_decode($response, true);

                foreach($response['data'] as $res) {
                    $data = [
                        'kode_deskel'   => $res['kode_kelurahan_desa'],
                        'nama_deskel'   => $res['nama_kelurahan_desa'],
                        'latitude'      => $res['latitude'],
                        'longitude'     => $res['longitude'],
                        'kode_pos'      => $res['kode_pos'],
                        'kec_kode'      => $res['kode_kecamatan']
                    ];

                    KelDesa::updateOrCreate(['kode_deskel' => $data['kode_deskel']], $data);
                }
            }

        }catch(\Exception $e){

            return response()->json([
                'status' => false,
                'msg' => $e->getMessage(),
            ]);
        }

        return response()->json([
            'status' => true
        ]);
    }

    public function getByidKec (Request $request) {
        $json = [];
        if ($idKec = $request->idKec) {
            $kecamatan = Kecamatan::find($idKec);
            $kelurahan = KelDesa::where('kec_kode', $kecamatan->kode_kec)->get();
            foreach ($kelurahan as $kel) {
                $json[] = [
                    'id' => $kel->id,
                    'kode_deskel' => $kel->kode_deskel,
                    'text' => $kel->nama_deskel
                ];
            }
        }
        return response()->json(['results' => $json]);
    }
}
