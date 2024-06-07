<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response;
use App\Model\User;
class CheckRole
{
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        try {
            // Coba mendapatkan peran pengguna saat ini
            $userRole = Auth::user()->role;

            // Periksa apakah peran pengguna ada dalam daftar peran yang diizinkan
            if (!in_array($userRole, $roles)) {
                throw new \Exception('Unauthorized access');
            } else {
                return $next($request);
            }
        } catch (\Exception $e) {
            // Tangkap pengecualian dan arahkan pengguna ke tampilan error
            return response()->view('auth.login', ['error' => $e->getMessage()], 403);
            // throw $e;
        }
    }
}
