<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; 
use App\Models\Pengumuman; 
use App\Models\Profil; // <-- Tambahkan ini


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

            $nav_profils = Profil::where('is_published', true)->select('judul', 'slug')->get();
            View::share('nav_profils', $nav_profils);
        } catch (\Exception $e) {
            // Menangani kasus jika tabel belum ada saat migrasi awal
            View::share('pengumumans', collect());
        }
    }
}
