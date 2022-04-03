<?php

use Tumarinson\UserJobs\Jobs\AbstractUserJob;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserJobExample extends AbstractUserJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;

    public function handle()
    {
        // your job logic here

        $this->inprogress(null, 1);

        // generate an excel report
        // get link to this report
        $link = $this->generateReport($this->jobData['filters']);

        // put link to this report at job payload
        $payload = [
            'link_to_report' => $link,
        ];

        $this->completed($payload);
    }

    public function generateReport($filters): string
    {
        return 'storage/public/qwerty.xls';
    }
}
