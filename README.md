# Laravel User Jobs

This package will help you if you need to complete some task created by the user, 
after completing this task, 
you can display to the user the entire list of tasks that were created by him.

## Installation
1) composer require tumarinson/laravel-user-jobs
2) php artisan migrate
3) that's all

## Usage
You can see example of usage at 'example' folder.
A demo project will be created if the package is in demand.

## #Usage example

User Story: Users want to see in the interface a list of when and which reports they have uploaded.

All you need is to extend your job class with AbstractUserJob.php and when creating a task, pass the user ID to the class with the first parameter as follows:

<code>$job = new UserJobExample($userId);</code>

## Translations
Package has translation of job statuses

<code>trans('user-jobs::job.status.waiting')</code>


<hr>
Stolen from Ilia Lazarev https://github.com/ilzrv
