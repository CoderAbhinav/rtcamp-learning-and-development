# Background Processing

Background processing offers a better and more efficient way of getting things done in the background while using WordPress instead of relying on cron jobs. 

# [Action Scheduler](https://actionscheduler.org)
1. Action Scheduler is a **library** for **triggering a WordPress hook** to run at some time in the future (or as soon as possible, in the case of an async action).
2. Each hook can be scheduled with unique data, to allow callbacks to perform operations on that data.

## How it works ?
1. It stores the `hook name`, `arguments` & `schedule date` for an action that should be triggered sometime in future.
2. It will try to run **every minute**, by attaching iteself to the `action_scheduler_run_schedule` hook, it is scheduled using WP Cron. 
3. Once per minute on, it will also check on the 'shutdown' hook of **WP Admin**.
4. When triggered it will check due jobs. 

## Batch Processing Background Jobs
1. If there are actions to be processed, Action Scheduler will stake a unique claim for a batch of 25 actions and begin processing that batch. 
2. At that point, if there are additional actions to process, an asynchronous loopback request will be made to the site to continue processing actions in a new request.

## Housekeeping
1. Before processing a batch, the scheduler will remove any existing claims on actions which have been sitting in a queue for more than five minutes (or more specifically, 10 times the allowed time limit, which defaults to 30 seconds).
