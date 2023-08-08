<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $accessToken = session('token');
        
        $category = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://crud-kategori-production.up.railway.app/kategori/all');


        if ($category->ok()) {
            $data_category = $category->json();

            return view('category',compact('data_category'));
        
        } else {
            return redirect()->route('login-form')
                ->with('error', 'Token tidak sesuai');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $nama_kategori = $request->input('nama_kategori');
        $deskripsi = $request->input('deskripsi');

        $accessToken = session('token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->post('https://crud-kategori-production.up.railway.app/kategori/add', [
            'nama_kategori' => $nama_kategori,
            'deskripsi' => $deskripsi,
        ]);

        if($response->successful()) {
            return redirect()->route('category.index')
            ->with('success', 'Berhasil tambah data');
        } else {
            return redirect()->route('category.index')
            ->with('error', 'Gagal tambah data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_kat)
    {
        //
        $nama_kategori = $request->input('nama_kategori');
        $deskripsi = $request->input('deskripsi');

        $accessToken = session('token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->put('https://crud-kategori-production.up.railway.app/kategori/update/'. $id_kat, [
            'nama_kategori' => $nama_kategori,
            'deskripsi' => $deskripsi,
        ]);

        if($response->successful()) {
            return redirect()->route('category.index')
            ->with('success', 'Berhasil update data');
        } else {
            return redirect()->route('category.index')
            ->with('error', 'Gagal update data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id_kat)
    {
        //
        $accessToken = session('token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->delete('https://crud-kategori-production.up.railway.app/kategori/delete/' . $id_kat);

        if($response->successful()) {
            return redirect()->route('category.index')
            ->with('success', 'Berhasil hapus data!');
        } else {
            return redirect()->route('category.index')
            ->with('error', 'Gagal hapus data');
        }
    }
}
