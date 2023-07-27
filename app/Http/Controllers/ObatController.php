<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //
        //  $accessToken = "eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJhZG1pbiIsImlhdCI6MTY5MDQ2NjI0OSwiZXhwIjoxNjkwNDY3Njg5fQ.rhhls3MfzUfroBdUT-3lEtZfVYMHNf5RdTDgRTBrEHtIIgf6KxdRaETq4daPqPj8xktlz1jHsNOOR-r3XFhrgg";

        //  $response = Http::withHeaders([
        //      'Authorization' => 'Bearer ' . $accessToken,
        //  ])->get('http://Rizal:3002/obat/list');
 
        //  if ($response->ok()) {
        //      $data = $response->json();
 
        //      dd($data);
 
        //      return view('medicine',compact('data'));
         
        //  } else {
 
        //  }
        return view('medicine');
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
