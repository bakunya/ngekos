<?php

namespace App\Jobs;

use App\Traits\SendMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use SendMail;

    protected array $mailData = [];

    /**
     * Create a new job instance.
     */
    public function __construct(
        string $to,
        string $subject,
        string $view,
        array $view_data,
        $expired = null,
        $user_id = null,
        bool $from_admin = false,
    ) {
        $this->mailData = [
            $to,
            $subject,
            $view,
            $view_data,
            $from_admin,
            $expired,
            $user_id,
        ];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->sendMail(...$this->mailData);
    }
}
