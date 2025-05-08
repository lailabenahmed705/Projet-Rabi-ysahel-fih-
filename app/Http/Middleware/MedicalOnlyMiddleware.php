<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalOnlyMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || !$user->hasRole('medical') || $user->subscription) {
            return redirect()->route('mediplus')->with('error', 'Accès réservé aux personnels médicaux non abonnés.');
        }

        return $next($request);
    }
}
