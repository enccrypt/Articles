<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('start')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void //регает комманды из commands в руты
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

// 'start' отправляет кол-во комментов за сегодняшний день на почту 
// (выполняется автоматически выполняться каждую минуту)