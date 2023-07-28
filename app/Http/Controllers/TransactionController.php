<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{

    public function generateRandomCode()
    {
        return 'CST-' . mt_rand(100000, 999999);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $accessToken = session('token');
        
        $transaction = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('http://desktop-sjoemcq:3001/transactions/all');

        $medicine = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('http://desktop-sjoemcq:3002/obat/list');

        $randomCode = $this->generateRandomCode();

        if ($transaction->ok()) {
            $data_transaction = $transaction->json();
            $data_medicine = $medicine->json();

            return view('transaction',compact('data_transaction','data_medicine','randomCode'));
        
        } else {
            return redirect()->route('dashboard')
                ->with('error', 'Token tidak sesuai');
        }

        // return view('transaction');
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
        $transaction_code = $request->input('transaction_code');
        $medicine_id = $request->input('medicine_id');
        $quantity = $request->input('quantity');

        $accessToken = session('token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->post('http://desktop-sjoemcq:3001/transactions/add', [
            'transaction_code' => $transaction_code,
            'medicine_id' => $medicine_id,
            'quantity' => $quantity,
        ]);

        if ($response->successful()) {
            return redirect()->route('transaction.index')
                    ->with('success', 'Berhasil Ditambahkan');
        } else {
            return redirect()->route('transaction.index')
                    ->with('error', 'Stok tabung tidak mencukupi');
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
    public function update(Request $request, $id)
    {
        //
        $transaction_code = $request->input('transaction_code');
        $medicine_id = $request->input('medicine_id');
        $quantity = $request->input('quantity');

        $accessToken = session('token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->put('http://desktop-sjoemcq:3001/transactions/edit/'. $id, [
            'transaction_code' => $transaction_code,
            'medicine_id' => $medicine_id,
            'quantity' => $quantity,
        ]);

        if ($response->successful()) {
            return redirect()->route('transaction.index')
                    ->with('success', 'Berhasil Ditambahkan');
        } else {
            return redirect()->route('transaction.index')
                    ->with('error', 'Stok tabung tidak mencukupi');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $accessToken = session('token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->delete('http://desktop-sjoemcq:3001/transactions/delete/' . $id);


        if ($response->successful()) {
            return redirect()->route('transaction.index')
                    ->with('success', 'Berhasil Ditambahkan');
        } else {
            return redirect()->route('transaction.index')
                    ->with('error', 'Stok tabung tidak mencukupi');
        }
    }
}
