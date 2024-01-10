<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notifModel;
use Illuminate\Support\Facades\Auth;
//
class notifController extends Controller
{
    public function markAsRead()
    {
        notifModel::where('id', Auth::user()->id)->delete();
        return response()->json(['success' => true]);
    }
}
