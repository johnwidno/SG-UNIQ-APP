<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
        if(!Auth::user()->role_as=='1'){
            return redirect('/home')-> with('status','access Denied as you re not admin');

        }

        return $next($request);

} catch (ModelNotFoundException $e) {
    // Handle the exception here, you can log it or perform other actions if needed
    return redirect('/home')->with('status', 'Utilisateur non-trouvé');
} catch (\Exception $e) {
    // Handle other exceptions here, log them, and perform appropriate actions
    return redirect('/home')->with('status', 'An error occurred');
}
}

}
