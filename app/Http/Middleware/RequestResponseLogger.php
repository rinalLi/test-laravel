<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

class RequestResponseLogger
{
    use DispatchesJobs;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $inputTime = microtime(true);
        $requestData = $request->__toString();
        Log::info(sprintf(" INPUT:  %s  %s \n%s", $request->ip(), $request->url(), $requestData));
        $response = $next($request);
        $responseData = $response->__toString();
        Log::info(sprintf(" OUTPUT: %s  %s \n%s", $request->ip(), $request->url(), $responseData));

        return $response;
    }
}
