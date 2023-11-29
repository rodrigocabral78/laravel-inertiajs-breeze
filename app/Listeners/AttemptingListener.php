<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Attempting;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;

class AttemptingListener
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
    public function handle(Attempting $event): void
    {
        // ds('attempting', $event);
    }
}
