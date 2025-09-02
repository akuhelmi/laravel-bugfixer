<?php

namespace Aku\Bugfixer\Jobs;

use Aku\Bugfixer\BugfixerClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Throwable;

class SendErrorToBugfixerJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    protected $exception;

    public function __construct(Throwable $exception)
    {
        $this->exception = $exception;
    }

    public function handle(BugfixerClient $client)
    {
        $client->sendError([
            'message' => $this->exception->getMessage(),
            'file'    => $this->exception->getFile(),
            'line'    => $this->exception->getLine(),
            'trace'   => $this->exception->getTraceAsString(),
            'time'    => now()->toDateTimeString(),
        ]);
    }
}
