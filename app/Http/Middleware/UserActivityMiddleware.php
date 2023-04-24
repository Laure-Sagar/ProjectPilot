<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Team;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserActivityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();
            $team = Team::find($user->current_team_id);
            if ($team == null) {
                $team = $user->ownedTeams->first();
                $user->switchTeam($team);
            }
            return $next($request);
        }


        return $next($request);
    }
}
