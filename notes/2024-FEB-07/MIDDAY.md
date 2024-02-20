# What is crontab?
The crontab is a list of commands that you want to run on a regular schedule, and also the name of the command used to manage that list.


# How to add a cron job in your local system?
1. Following command can be used to open the crontab editor
    ```bash
    crontab -e
    ```
2. Structure of a cron job command
    ```bash 
    minute  hour  day_of_month  month  weekday  command
    ```

    Item | Description
    --- | ---
    minute |	0 through 59
    hour |	0 through 23
    day_of_month |	1 through 31
    month |	1 through 12
    weekday |	0 through 6 for Sunday through Saturday
    command |	a shell command
3. Example, in order to run a php script every minute here's a command we can write in the crontab editor
    ```bash
    * * * * * php path/to/script.php
    ```

    This will run the script every minute
4. Once the job is added to crontab, you can verify if it's in the crontab with the command
    ```bash
    crontab -l
    ```


# How many cron jobs can be run simultaneously?
1. There's no any hard limit on the number of cron jobs scheduled
2. But it's recommended to consider the system resources in order to schedule the jobs

# If there is a limit: suppose a new job is scheduled to run and the limit has already been reached, what will happen?
1. If the system reaches to it's limit, all the additional cron jobs will be queued, and will run once the system allocates resources to these jobs.

# How can we store the output of a cron job to a file?
1. The below command will store the output of cronjob to the given file
    ```bash
    * * * * * php path/to/script > path/to/log.txt
    ```