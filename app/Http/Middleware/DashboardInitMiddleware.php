<?php

namespace App\Http\Middleware;

use Closure;
use App\Notification;
use View;

class DashboardInitMiddleware
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
        $notifications = Notification::orderBy('created_at', 'DESC')->take(3)->get();
        View::share('notifications', $notifications);
        View::share('unseen_notifications_count', Notification::where('seen', false)->count());
        return $next($request);
    }
}
