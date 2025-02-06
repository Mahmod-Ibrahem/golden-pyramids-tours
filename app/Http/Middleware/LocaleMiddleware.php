<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = null;
        if (!Session::has('locale') && \request()->has('locale')) {
            $locale = \request('locale');
            Session::put('locale', $locale);
        } else if (Session::has('locale')) {
            $locale = Session::get('locale');
        }
        if ($locale) {
            app()->setLocale($locale);
        }
        return $next($request);
    }
}
