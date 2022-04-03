<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tumarinson\UserJobs\Models\UserJob;

class UserJobExampleController extends Controller
{
    /**
     * Returns user jobs
     */
    public function getUserJobs(Request $request)
    {
        $userId = auth()->id();

        return UserJob::where('user_id', $userId)->get()->toArray();
    }

    /**
     * Create User Job
     */
    public function dailyReportExport(Request $request)
    {
        $someData = [
            'filters' => $request->input('filters'),
        ];

        // get userId
        $userId = auth()->id();

        // pass userId as first parameter
        // and some data (optional) as the second parameter
        $job = new UserJobExample($userId, $someData);

        dispatch($job);

        return 'Your task has been submitted for processing. You can view the status of the task on <a href="#">page</a>';
    }
}
