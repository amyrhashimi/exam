<?php

namespace App\Http\Middleware;

use App\Models\Language as ModelsLanguage;
use Closure;
use Illuminate\Http\Request;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = ModelsLanguage::all()->pluck('language')->toArray();

        if( ! in_array( app()->getLocale() , $lang) ) {
            $segments = $request->segments();
            $segments[0] = "ar";
            return redirect( implode('/',$segments) );
        }
        return $next($request);
    }
}
