<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Users::all();
        return view('users.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Users::create(
            [
                'email' => $request->email,
                'password' => $request->password,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'hp' => $request->hp
            ]
        );

        return redirect('users')->with('success','Data berhasil ditambahkan');
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
        $row = Users::findOrFail($id);
        return view('users.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Users::findOrFail($id);
        $row->update(
            [
                'email' => $request->email,
                'password' => $request->password,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'hp' => $request->hp
            ]
        );
        return redirect('users')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Users::findOrFail($id);
        $row->delete();

        return redirect('users')->with('success', 'Data berhasil dihapus');
    }
}
