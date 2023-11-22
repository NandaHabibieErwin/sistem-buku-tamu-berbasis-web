<?php

namespace App\Http\Controllers;

use App\Models\deptModel;
use App\Models\tamuModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = deptModel::SELECT('id_departement', 'nama_departement')->get();
        return view('guestbook',compact('data'));
    }
}
