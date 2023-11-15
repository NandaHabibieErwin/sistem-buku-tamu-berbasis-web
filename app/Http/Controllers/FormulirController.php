<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FormulirController extends Controller
{
    public function index()
    {
        $data = DB::select(DB::raw("SELECT * FROM bukutamu"));

        return view('formulir.index',compact('data'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request)
{
    $this->validate($request, [
        'photo' => 'required|image|mimes:jpeg,png,gif,jpg,svg|max:2048',
        'due_date' => 'required',
        'cost' => 'required',
        'description' => 'required',
    ]);

    // Upload image
    $image = $request->file('photo');
    $imagePath = $image->storeAs('public/formulir', $image->hashName());

    // Insert data into the 'formulir' table
    $insertedId = DB::table('formulir')->insertGetId([
        'id' => $request->input('id'), // Provide a valid 'id' value here as a string.
        'photo' => $image->hashName(),
        'due_date' => $request->due_date,
        'description' => $request->description,
        'cost' => $request->cost,
    ]);

    return redirect()->route('index')->with(['success' => 'Data Berhasil Disimpan']);
}
public function edit($id)
{
    $data=DB::table('formulir')->where('id',$id)->first();
    return view('edit',compact('data'));
}

public function update(Request $request, $id)
{
    $this->validate($request, [
        'photo' => 'required|image|mimes:jpeg,png,gif,jpg,svg|max:2048',
        'due_date' => 'required',
        'cost' => 'required',
        'description' => 'required',
    ]);

    // Check if a new photo has been uploaded
    if ($request->hasFile('photo')) {
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,gif,jpg,svg|max:2048',
        ]);

        $image = $request->file('photo');
        $image->storeAs('public/formulir', $image->hashName());

        DB::update("UPDATE `formulir` SET `photo` = ?, `due_date` = ?, `description` = ?, `cost` = ? WHERE `id` = ?",
            [$image->hashName(), $request->due_date, $request->description, $request->cost, $id]
        );
    } else {
        // If no new photo uploaded, update other fields
        DB::update("UPDATE `formulir` SET `due_date` = ?, `description` = ?, `cost` = ? WHERE `id` = ?",
            [$request->due_date, $request->description, $request->cost, $id]
        );
    }

    // Redirect back to the index page
    return redirect()->route('index')->with(['success' => 'Data Berhasil Diupdate']);
}

    public function destroy($id){
        DB::table('formulir')->where('id', $id)->delete();

        return redirect()->route('index')->with(['success' => 'Data Berhasil Dihapus']);
    }

}
