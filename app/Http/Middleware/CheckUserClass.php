<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckUserClass
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$classes)
    {
        $user = Auth::user();

        if (!$user) {
            // Jika pengguna belum masuk, arahkan ke halaman login (atau halaman yang sesuai).
            return redirect('/login');
        }

        // Periksa kelas pengguna dengan kelas yang diberikan dalam parameter middleware.
        foreach ($classes as $class) {
            if ($user->kelas_user == $class) {
                // Jika kelas pengguna cocok dengan kelas yang diberikan, lanjutkan ke permintaan berikutnya.
                return $next($request);
            }
        }

        // Jika kelas pengguna tidak cocok dengan kelas yang diberikan, arahkan ke halaman yang sesuai.
        if (in_array($user->kelas_user, [1, 2])) {
            return redirect('/admin');
        } elseif ($user->kelas_user == 3) {
            return redirect('/dashboard');
        }

        // Kelas pengguna tidak cocok dengan kelas yang diberikan dan bukan 1, 2, atau 3,
        // sehingga arahkan ke halaman login (atau halaman yang sesuai).
        return redirect('/login');
    }
}