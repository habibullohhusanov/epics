<?php

namespace App\Console;

use App\Models\Image;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->everyMinute();
        $schedule->call(function () {
            $images = Image::where("created_at", "<", now()->subDays(1))->get();
            foreach ($images as $image) {
                Storage::delete($image->path);
                $image->delete();
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
