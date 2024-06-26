<?php

namespace App\Console\Commands;

use App\Models\Note;
use App\Jobs\SendEmail;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class SendScheduledNotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-scheduled-notes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send scheduled notes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //

        $now = Carbon::now();

        $notes = Note::where('is_published', true)
        ->where('send_date', $now->toDateString())
        ->get();

        $noteCount = $notes->count();

        $this->info("Sending {$noteCount} scheduled notes");

        foreach($notes as $key => $note){
            SendEmail::dispatch($note);
        }

        
    }
}
