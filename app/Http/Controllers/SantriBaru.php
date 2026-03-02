<?php

namespace App\Http\Controllers;

use App\Models\SantriBaru as ModelsSantriBaru;
use Illuminate\Http\Request;

class SantriBaru extends Controller
{
    public function simpan(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'string|max:50',
            'asal_sekolah' => 'required|string|max:255',
            'nama_orang_tua' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'nomor_hp' => 'required|string|max:20',
        ]);

        ModelsSantriBaru::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran berhasil dikirim.',
        ]);
    }
}
