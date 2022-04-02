<?php

namespace Tumarinson\UserJobs\Jobs;

use Tumarinson\UserJobs\Models\UserJob;

abstract class AbstractUserJob
{
    protected $userJob;

    protected $jobData;

    /**
     * @param int $userId
     * @param mixed $jobData
     */
    public function __construct($userId, $jobData = null)
    {
        $this->userJob = UserJob::create([
            'user_id'   => $userId,
            'job_class' => get_class($this),
            'status'    => UserJob::STATUS_WAIT,
            'progress'  => null,
        ]);

        $this->jobData = $jobData;
    }

    /**
     * @param mixed|null $payload
     * @param float $progress
     */
    public function inprogress($payload = null, $progress = null)
    {
        $this->userJob->payload = $payload ?? $this->userJob->payload;
        $this->userJob->progress = $progress ?? $this->userJob->progress;
        $this->userJob->status = UserJob::STATUS_INPROGRESS;
        $this->userJob->save();
    }

    /**
     * @param null $payload
     */
    public function completed($payload = null)
    {
        $this->userJob->update([
            'payload'  => $payload,
            'status'   => UserJob::STATUS_COMPLETED,
            'progress' => 100,
        ]);
    }

    /**
     * @param null $payload
     */
    public function failed($payload = null)
    {
        $this->userJob->update([
            'payload' => $payload,
            'status'  => UserJob::STATUS_FAILED,
        ]);
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->userJob->status;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->userJob->payload;
    }

    /**
     * @param $payload
     */
    public function setPayload($payload)
    {
        $this->userJob->payload = $payload;
    }
}
