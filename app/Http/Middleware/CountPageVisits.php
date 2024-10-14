<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\webViews;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Jenssegers\Agent\Facades\Agent;
use Symfony\Component\HttpFoundation\Response;

class CountPageVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip_address = request()->getClientIp();
        $browser = Agent::browser();
        $pageView = webViews::where(['ip_address' => $ip_address, "browser" => $browser])->whereDate('created_at', Carbon::today())->first();
       if($pageView){
        $pageView->hits++;
        $pageView->update();

       }else{
        $blogViews = new webViews();
        $blogViews->ip_address =  request()->getClientIp();
        $blogViews->hits = 1;
        $blogViews->device_name = Agent::device();
        $blogViews->isMobile = Agent::isMobile();
        $blogViews->browser = Agent::browser();
        $blogViews->os = Agent::platform();
        $blogViews->save();
       }

        return $next($request);
    }
}
