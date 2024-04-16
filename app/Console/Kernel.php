<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\BusMaintenance;
use App\Models\Administration;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReminderNotification;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function(){
            $maintenances = BusMaintenance::all();
            $admins = Administration::all();
            foreach($maintenances as $maintenance){
                    $date = Carbon::parse($maintenance->date);
                    $diffDays = $date->diffInDays(Carbon::now());
                    if($diffDays <= 7){
                        Notification::send($admins,new ReminderNotification($maintenance->vehicle_id,$maintenance->vehicle->name,$maintenance->busMaintenanceType->name));
                    }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
