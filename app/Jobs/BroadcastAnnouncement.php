<?php
namespace App\Jobs;

use App\Models\User;
use App\Models\UserAnnouncement;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BroadcastAnnouncement implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $announcementId;

    /**
     * Create a new job instance.
     *
     * @param int $announcementId
     */
    public function __construct($announcementId)
    {
        $this->announcementId = $announcementId;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            UserAnnouncement::create([
                'user_id' => $user->id,
                'announcement_id' => $this->announcementId,
                'status' => 0,
            ]);
        }
    }
}
