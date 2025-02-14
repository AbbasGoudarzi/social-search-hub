<?php

namespace App\Jobs;

use App\Models\Alarm;
use App\Models\Post;
use App\Notifications\NewPostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CheckAlarmsJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $alarms = Alarm::all();

        foreach ($alarms as $alarm) {
            $latestPosts = Post::query()->where('source', $alarm->source)
                ->where('created_at', '>=', now()->subMinutes(10))
                ->get();

            if ($latestPosts->count()) {
                $alarm->user->notify(new NewPostNotification($alarm->source));
            }
        }
    }
}
