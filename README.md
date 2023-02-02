# Laravel User Jobs

This package will help you if you need to complete some task created by the user,
after completing this task,
you can display to the user the entire list of tasks that were created by him.

`user_jobs` table structure:

| user_job_id | job_class            | user_id | status    | progress | payload         | created_at          | updated_at          | deleted_at |
|-------------|----------------------|---------|-----------|----------|-----------------|---------------------|---------------------|------------|
| 1           | Namespace\Your\Class | 5       | waiting   | 0        | null            | 2022-01-01 00:00:00 | 2022-01-01 00:00:00 | null       |
| 2           | Namespace\Your\Class | 123     | completed | 100      | {"foo": "bar"}  | 2022-01-01 00:00:01 | 2022-01-01 00:12:34 | null       |

All you need is to extend your job class with AbstractUserJob.php and when creating a task, pass the user ID to the class with the first parameter as follows:

`$job = new UserJobExample($userId);`

## Installation
You can install the package via composer:
```bash
composer require tumarinson/laravel-user-jobs
```

Then run a commands
```bash
php artisan migrate
```

## Example
https://github.com/tumarinson/user-jobs-for-laravel-example

## Translations
Package has translation of job statuses

<code>trans('user-jobs::job.status.waiting')</code>


<hr>
Stolen from Ilia Lazarev https://github.com/ilzrv
