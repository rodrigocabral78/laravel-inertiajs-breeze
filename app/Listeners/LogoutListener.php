<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;

class LogoutListener
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
    public function handle(Logout $event): void
    {
        ds('logout', $event);
        /** @var User $user */
        $user = $event->user;
        if (!$user) {
            return;
        }
        /** @var Request $request */
        $request = $this->request;

        $log = $user->auditLogs()->latest('login_at')
        ->where('login_successfully', true)
        ->where('ip', $request->ip())
        ->whereNull('logout_at')
        ->first();

        if (!$log) {
            return;
        }

        $log->logout_at = Carbon::now();
        $log->save();
    }
}
