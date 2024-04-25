<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {

    public Note $note;

    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;
    public $noteIsPublished;

    public function mount(Note $note){

        $this->authorize('update', $note);
        $this->fill($note);

        $this->noteTitle = $note->title;
        $this->noteBody = $note->body;
        $this->noteRecipient = $note->recipient;
        $this->noteSendDate = $note->send_date;
        $this->noteIsPublished = $note->is_published;
        
    }

    public function editNote(){

        $validated = $this->validate([
            'noteTitle' => 'required | string | min:5',
            'noteBody' => 'required  | min:5',
            'noteRecipient' => 'required | email',
            'noteSendDate' => 'required | date',
            'noteIsPublished' => 'boolean'
        ]);

        $this->note->update([
            'title' => $this->noteTitle,
            'body' => $this->noteBody,
            'recipient' => $this->noteRecipient,
            'send_date' => $this->noteSendDate,
            'is_published' => $this->noteIsPublished
        ]);

        $this->dispatch('note-saved'); 

        
    }
    


}; 

?>

<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Edit: {{ Str::limit($note->title, 20) }}
        </h2>
    </x-slot>
    
    <div class="py-8">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8 p-8 text-gray-900 dark:text-gray-100 bg-white">
            <div class="mt-3 mb-7">
                 <x-button  icon="arrow-left" href="{{ route('notes.index') }}">All Notes</x-button>
            </div>
                <form wire:submit.prevent='editNote' class="space-y-4">
                    <x-errors />
                    
                    <x-input wire:model="noteTitle" label="Title"  />
                    <x-input wire:model="noteRecipient" label="Recipient" type="email"  />
                    <x-input wire:model="noteSendDate" type="date" label="Send Date"  />
                    <x-textarea wire:model="noteBody" label="Body"  />
                    <x-checkbox  label="Publish Note" wire:model="noteIsPublished"  />
                    <x-action-message on="note-saved" />
                    <x-button type="submit" primary class="" spinner>Update</x-button>

                    
                </form>
        </div>
    </div>
   
</div>
