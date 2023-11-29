<?php

namespace App\Listeners;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Torann\GeoIP\Facades\GeoIP;

class LoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct(
        protected Request $request
    ) {
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        // ds('login', $event);
        /** @var User $user */
        $user = $event->user;
        if (!$user) {
            return;
        }
        /** @var Request $request */
        $request = $this->request;
        // ds('Browser: ', getBrowser()['name']);
        // ds('Session: ', $request->session());
        // ds(geoip());
        $user->auditLogs()->create([
            'session_id'         => $request->session()->getId(),
            'ip'                 => $request->ip(),
            'agent'              => $request->userAgent(),
            'browser'            => getBrowser()['name'],
            'login_at'           => Carbon::now(),
            'login_successfully' => true,
            // 'location'           => geoip()->getLocation($request->ip())->toArray(),
        ]);
    }
}
