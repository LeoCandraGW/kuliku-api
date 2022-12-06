<?php

namespace App\Http\Controllers;

use App\Models\Kuli;
use Illuminate\Http\Request;

class kulidetail extends Controller
{
    public function kulidetail($id)
    {
        $kuli = Kuli::where('id', $id)->get();
        return response()->json([
            'data' => $kuli
        ]);
    }
}
