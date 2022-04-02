<?php

namespace Tumarinson\UserJobs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class UserJob extends Model
{
    protected $table = 'user_jobs';

    protected $primaryKey = 'user_job_id';

    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = ['payload' => 'array'];

    const STATUS_WAIT = 'wait';
    const STATUS_INPROGRESS = 'inprogress';
    const STATUS_COMPLETED = 'completed';
    const STATUS_FAILED = 'failed';

    /**
     * @return string
     */
    public function getStatusCaption()
    {
        if (Lang::has('job.status.' . $this->status)) {
            return Lang::get('job.status.' . $this->status);
        }

        return Lang::get('job.status.unknown');
    }
}
