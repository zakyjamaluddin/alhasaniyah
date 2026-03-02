<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Beranda extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Beranda',
            'profile' => \App\Models\Profile::first(),
            'fasilitas' => \App\Models\Fasilitas::all(),
            'juara' => \App\Models\Juara::all(),
            'alumni' => \App\Models\Alumni::latest()
                ->take(3)
                ->get(),
            'blogs' => \App\Models\Blog::all(),
            'hero' => \App\Models\Hero::first(),
            'gallery' => \App\Models\Gallery::all(),
            'misi' => \App\Models\Misi::all(),
            'pengumuman' => \App\Models\Pengumuman::all(),
        ]);
    }
}
