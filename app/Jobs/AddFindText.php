<?php

namespace App\Jobs;

use App\Models\Find;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddFindText implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $text;
    public $id;
    /**
     * Create a new job instance.
     */
    public function __construct($text, $id)
    {
        $this->text = $text;
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Find::create([
            "text" => $this->text,
            "user_id" => $this->id,
        ]);
    }
}
