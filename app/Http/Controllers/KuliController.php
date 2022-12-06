<?php

namespace App\Http\Controllers;

use App\Models\Kuli;
use Illuminate\Http\Request;

class KuliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kulis = Kuli::all();
        return response()->json([
            'success'=> true,
            'data'=>$kulis
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
        $kuli = Kuli::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'skill' => $request->skill,
            'nohp' => $request->nohp,
            'dailysal' => $request->dailysal,
            'image'=> $request->image,
            'deskripsi' => $request->deskripsi,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
        ]);
        return response()->json([
            'data' => $kuli
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kuli  $kuli
     * @return \Illuminate\Http\Response
     */
    public function show(Kuli $kuli)
    {
        return response()->json([
            'data' => $kuli
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kuli  $kuli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kuli $kuli)
    {
        $kuli->username = $request->username;
        $kuli->email = $request->email;
        $kuli->password = $request->password;
        $kuli->skill = $request->skill;
        $kuli->nohp = $request->nohp;
        $kuli->dailysal = $request->dailysal;
        $kuli->image = $request->iamge;
        $kuli->deskripsi = $request->deskripsi;
        $kuli->nik = $request->nik;
        $kuli->alamat = $request->alamat;
        $kuli->save();

        return response()->json([
            'data' => $kuli
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kuli  $kuli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kuli $kuli)
    {
        $kuli->delete();
       return response()->json([
        'message' => 'customer deleted'
       ],204);
    }
}
