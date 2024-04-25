<?php

namespace App\Jobs;

use App\Models\Note;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public Note $note;
    public function __construct($note)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $noteUrl = config('app.url') . '/notes/'. $this->note->id;
        $content = "Hello, you've recived a new note. View it here: {$noteUrl}";

        Mail::raw($content, function($message){
            $message->to($this->note->recipient)
            ->from("notes@notes.com","Fly Notes")
            ->subject('You have a new note!');
        });
    }
}
