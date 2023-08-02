<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessToken = session('token');
        
        $user = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('http://rednax:3001/user/list');

        if ($user->ok()) {
            $data_user = $user->json();

            return view('user',compact('data_user'));
        
        } else {
            return redirect()->route('dashboard')
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
        $nik = $request->input('nik');
        $username = $request->input('username');
        $password = $request->input('password');

        $response = Http::post('http://rednax:3001/user/register', [
            'nik' => $nik,
            'username' => $username,
            'password' => $password,
        ]);
    
        if ($response->successful()) {
            return view('login')
                ->with('success', 'Berhasil Registrasi');
        } else {
            return view('register')
                ->with('error', 'Gagal Registrasi');
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
    public function registerform()
    {
        return view('register');
    }
    public function loginform()
    {
        return view('login');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nik = $request->input('nik');
        $username = $request->input('username');
        $password = $request->input('password');
        $role = $request->input('role');
    
        $accessToken = session('token');
    
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->put('http://rednax:3001/user/update', [
            'nik' => $nik,
            'username' => $username,
            'password' => $password,
            'role' => $role,
        ]);
    
        if ($response->successful()) {
            return redirect()->route('user.index')
                ->with('success', 'Berhasil Diubah');
        } else {
            return redirect()->route('user.index')
                ->with('error', 'Gagal Diubah');
        }
    }
    

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $accessToken = session('token');
    
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->delete('http://rednax:3001/user/delete', ['nik' => $id]);
    
        if ($response->successful()) {
            return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
        } else {
            return redirect()->route('user.index')->with('error', 'User gagal dihapus');
        }
    }

    public function search(Request $request)
    {
        $nik = $request->input('nik');
        $accessToken = session('token');
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->post('http://rednax:3001/user/search', ['nik' => $nik]);

        if ($response->successful()) {
            $user = $response->json();
            return view('user_search', compact('user'));
        } else {
            return redirect()->route('user.index')
                ->with('error', 'Gagal mencari user');
        }
    }
}
