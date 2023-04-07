<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $santri = Santri::all();

        return view('admin.santri.index', compact(
            'santri'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.santri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Santri $santri)
    {
        $this->validate($request, [
            'phone' => 'required|unique:siswas,phone',
        ]);

        $santri = Santri::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'date' => $request->date,
        ]);

        if ($santri) {
            return redirect()->route('santri.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $santri = Santri::findOrFail($id);

        return view('admin.santri.show', compact('santri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $santri = Santri::findOrFail($id);

        return view('admin.santri.edit', compact('santri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Santri $santri)
    {
        $this->validate($request, [
            'phone' => 'unique:santris,phone'
        ]);

        $santri = Santri::findOrFail($santri->id);
        $santri->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'date' => $request->date,
        ]);

        if ($santri) {
            return redirect()->route('siswa.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $santri = Santri::findOrFail($id);
        $santri->delete();

        return redirect()->route('santri.index');
    }
}
