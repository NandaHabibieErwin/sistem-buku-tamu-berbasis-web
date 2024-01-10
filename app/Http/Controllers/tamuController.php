<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\tamuModel;
use DB;

class tamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = tamuModel::SELECT('id_tamu', 'nama', 'notelp', 'jadwal', 'foto', 'tujuan', 'status')
            ->Where('id_departement', Auth::user()->departement->id_departement)->orderBy('created_at', 'desc')->get();
        return view('datatamu', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function print()
    {
        $data = tamuModel::select('id_tamu', 'nama', 'notelp', 'jadwal', 'foto', 'tujuan', 'status')
        ->where('id_departement', Auth::user()->departement->id_departement)
        //->where(DB::raw('MONTH(created_at)'), '=', now()->month)
        ->orderBy('created_at')
        ->get();

    return view('print', compact('data'));
    }

    public function pdf()
    {
        $data = tamuModel::select('id_tamu', 'nama', 'notelp', 'jadwal', 'foto', 'tujuan', 'status')
        ->where('id_departement', Auth::user()->departement->id_departement)
        //->where(DB::raw('MONTH(created_at)'), '=', now()->month)
        ->orderBy('created_at')
        ->get();

    return view('pdf', compact('data'));
    }

    public function excel()
    {
        $data = tamuModel::select('id_tamu', 'nama', 'notelp', 'jadwal', 'foto', 'tujuan', 'status')
        ->where('id_departement', Auth::user()->departement->id_departement)
        //->where(DB::raw('MONTH(created_at)'), '=', now()->month)
        ->orderBy('created_at')
        ->get();

    return view('excel', compact('data'));
    }

    public function csv()
    {
        $data = tamuModel::select('id_tamu', 'nama', 'notelp', 'jadwal', 'foto', 'tujuan', 'status')
        ->where('id_departement', Auth::user()->departement->id_departement)
        //->where(DB::raw('MONTH(created_at)'), '=', now()->month)
        ->orderBy('created_at')
        ->get();

    return view('csv', compact('data'));
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
