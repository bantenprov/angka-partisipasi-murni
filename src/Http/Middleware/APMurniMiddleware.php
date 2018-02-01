<?php namespace Bantenprov\APMurni\Http\Middleware;

use Closure;

/**
 * The APMurniMiddleware class.
 *
 * @package Bantenprov\APMurni
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class APMurniMiddleware
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
        return $next($request);
    }
}
