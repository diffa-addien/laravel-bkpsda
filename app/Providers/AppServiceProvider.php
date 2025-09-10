<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; 
use App\Models\Pengumuman; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         try {
            $pengumumans = Pengumuman::where('is_active', true)->latest()->pluck('judul');
            View::share('pengumumans', $pengumumans);
        } catch (\Exception $e) {
            // Menangani kasus jika tabel belum ada saat migrasi awal
            View::share('pengumumans', collect());
        }
    }
}
