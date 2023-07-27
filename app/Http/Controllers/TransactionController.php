<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $accessToken = "eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJmaXFyaSIsImlhdCI6MTY5MDQzMzM2NywiZXhwIjoxNjkwNDM0ODA3fQ.RB7xPAQWTpy4-ELdNBO-k-q21z9R7UZ7stlxWsg9986CLliDXKRV20oEfaBNCt4hLIQ5kZbnj3GzyJLAqiK24Q";

        // $response = Http::withHeaders([
        //     'Authorization' => 'Bearer ' . $accessToken,
        // ])->get('http://Rizal:3001/transactions/all');

        // if ($response->ok()) {
        //     $data = $response->json();

        //     dd($data);

        //     return view('transaction',compact('data'));
        
        // } else {

        // }

        return view('transaction');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
