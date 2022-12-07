<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = transaksi::all();
        return response()->json([
            'data'=>$transaksi
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
        $date = date('Y-m-d H:i:s');
        $total = $request->total_tagihan + $request->biaya_admin;
        $transaksi = transaksi::create([
            "nama pembeli" => $request->nama_pembeli,
            "id pembeli" => $request->id_pembeli,
            "nama kuli" => $request->nama_kuli,
            "id kuli" => $request->id_kuli,
            "status" => $request->status,
            "metode pembayaran" => $request->metode_pembayaran,
            "waktu pembayaran" => $date,
            "nomor referensi" => $request->nomor_transaksi,
            "total tagihan" => $request->total_tagihan,
            "biaya admin" => $request->biaya_admin,
            "total bayar" => $total
        ]);
        return response()->json(
            [
                'success' => true,
                'data' => $transaksi,
                'pesan' => 'transaksi berhasil'
            ],
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $transaksi)
    {
        return $transaksi->toJson();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }
}
