<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index', [
            'clients' => Client::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required'
        ]);

        Client::create($request->only([
            'name','email','phone','address'
        ]));

        return response()->json([
            'message' => 'Client berhasil ditambahkan'
        ]);
    }

    public function show(Client $client)
    {
        return response()->json($client);
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $client->update($request->only([
            'name','email','phone','address'
        ]));

        return response()->json([
            'message' => 'Client berhasil diupdate'
        ]);
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return response()->json([
            'message' => 'Client berhasil dihapus'
        ]);
    }
}