<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // // return Auth::check();
        if (Auth::check()) {
            $role = Auth::user()->role_id;
            switch ($role) {
                case 1: //admin
                    return $next($request);
                    break;
                // case 2: //admin_post
                //     // dd(1);
                //     return redirect('admin_post');
                //     break;
                default:
                    return redirect('home');
            }
        }
    }
}
