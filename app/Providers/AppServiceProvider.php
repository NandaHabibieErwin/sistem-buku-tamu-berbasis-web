<?php

namespace App\Providers;

use App\Models\notifModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Guard $guard) {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
        View::composer('layouts.topbar', function ($view) {
            $count = notifModel::where('id', Auth::user()->id)
                ->where('status', 0)
                ->where('created_at', '<', now())
                ->count();
            $notif = notifModel::where('id', Auth::user()->id)
                ->whereDate('created_at', now()->format('Y-m-d'))
                ->orderBy('created_at', 'desc')
                ->get()
                ->groupBy(function ($notification) {
                    return $notification->created_at->format('YmdH'); // Group by year, month, day, and hour
                });
            $view->with(['count' => $count, 'notif' => $notif]);
        });
    }
}
