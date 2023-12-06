<?php

namespace App\Http\Controllers;

use App\Models\deptModel;
use App\Models\notifModel;
use App\Models\tamuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
        return view('guestbook', compact('data'));
    }

    public function dashboard()
    {
        $total = tamuModel::join('departement', 'bukutamu.id_departement', '=', 'departement.id_departement')
            ->select('departement.nama_departement', \DB::raw('COUNT(*) as total'))
            ->groupBy('departement.nama_departement')
            ->get();
        $data = tamuModel::all();
        $countsPerDay = $data->groupBy(function ($item) {
            return $item->created_at->format('Y-m-d'); // Extract the date part from datetime
        })->map(function ($group) {
            return $group->count();
        });
        $totalSemua = tamuModel::count();
        $today = Carbon::today();
        $totalHari = tamuModel::whereDate('created_at', $today)->count();
        $totalDept = tamuModel::where('id_departement', Auth::user()->id_departement)->count();
        $totalTerima = tamuModel::where('status', 1)->count();
        return view('index', ['data' => $data, 'countsPerDay' => $countsPerDay,
        'total' => $total, 'totalSemua' => $totalSemua,
        'totalHari' => $totalHari, 'totalDept' => $totalDept,
        'totalTerima' => $totalTerima]);

    }
}
