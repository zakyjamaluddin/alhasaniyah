<?php

use App\Http\Controllers\Beranda;
use App\Http\Controllers\Blog;
use App\Http\Controllers\Pesan;
use App\Http\Controllers\SantriBaru;
use Illuminate\Support\Facades\Route;

Route::get('/', [Beranda::class, 'index'])->name('beranda');
Route::post('/kirim-pesan', [Pesan::class, 'simpan'])
    ->name('pesan.simpan');

Route::post('/santri-baru', [SantriBaru::class, 'simpan'])
    ->name('santri-baru.simpan');

Route::get('/blog/{slug}', [Blog::class, 'detail'])
    ->name('blog.detail');
