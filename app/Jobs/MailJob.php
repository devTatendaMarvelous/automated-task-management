<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Wrappers\MailWrapper;

class MailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $email;
    public $title;
    public $message;
    /**
     * Create a new job instance.
     */
    public function __construct($email,$title,$message)
    {
        $this->email=$email;
        $this->title=$title;
        $this->message=$message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        MailWrapper::emailNotify($this->email, [
            'title' =>  $this->title,
            'message' => $this->message,
        ]);
    }
}
