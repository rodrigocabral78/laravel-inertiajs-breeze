<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;

class FailedListener
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
    public function handle(Failed $event): void
    {
        ds('failed', $event);
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
            'login_successfully' => false,
            // 'location'           => geoip()->getLocation($request->ip())->toArray(),
        ]);
    }
}
