<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Blog extends Controller
{
    public function detail(Request $request, $slug)
    {
        $blog = \App\Models\Blog::where('slug', $slug)->firstOrFail();
        // dd($blog);
        return view('blog-detail', [
            'title' => $blog->judul,
            'blog' => $blog,
            'profile' => \App\Models\Profile::first(),
            'hero' => \App\Models\Hero::first(),
            'misi' => \App\Models\Misi::all(),
            'pengumuman' => \App\Models\Pengumuman::all(),


        ]);
    }   
}
