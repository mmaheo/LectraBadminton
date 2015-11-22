<?php

namespace App\Http\Middleware;

use App\Player;
use App\Setting;
use Closure;

class BuyTshirtClose
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $setting = Setting::first();
        $player_id = $request->player_id;
        $player = null;
        if ($player_id != null)
        {
            $player = Player::findOrFail($player_id);
        }

        if ($setting !== null)
        {
            if ($setting->hasBuyTShirt(false) && $player === null && $request->t_shirt == '1' || $setting->hasBuyTShirt(false) && $player !== null && $player->t_shirt != $request->t_shirt)
            {
                return redirect()->back()->with('error', "Vous ne pouvez plus demander de t-shirt !");
            }

            return $next($request);

        }

        return redirect()->route('home.index')->with('error', "Il manque une page !");
    }
}