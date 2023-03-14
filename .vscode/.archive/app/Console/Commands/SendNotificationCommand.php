<?php

namespace App\Console\Commands;

use App\Models\Submission;
use App\Notifications\ContactNotification;
use Illuminate\Console\Command;
use Notification;

class SendNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an example notification.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->alert('Send notification');
        $this->warn($this->description);

        /** @var Submission $submission */
        $submission = Submission::factory(1)->create()
            ->first()
        ;

        Notification::route('mail', $submission->to)
            ->notify(new ContactNotification($submission))
        ;

        $this->info('Notification sent.');

        return 0;
    }
}
