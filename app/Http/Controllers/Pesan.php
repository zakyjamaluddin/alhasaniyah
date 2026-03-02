<?php

namespace App\Http\Controllers;

use App\Models\Pesan as ModelPesan;
use Illuminate\Http\Request;

class Pesan extends Controller
{
    public function simpan(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kontak' => 'string|max:255',
            'subjek' => 'string|max:255',
            'pesan' => 'required|string',
        ]);

        ModelPesan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim.',
        ]);
    }
}
