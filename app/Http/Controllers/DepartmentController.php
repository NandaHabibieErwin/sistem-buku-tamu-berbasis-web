<?php

namespace App\Http\Controllers;
use App\Models\DeptModel;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $data = DeptModel::SELECT('id_departement', 'nama_departement', 'desc_departement')->get();
        return view('department',compact('data'));
    }
}
