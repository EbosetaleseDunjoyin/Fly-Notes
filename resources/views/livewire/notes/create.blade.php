<?php

use Livewire\Volt\Component;

new class extends Component{
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function submit(){

        $validated = $this->validate([
            'noteTitle' => 'required | string | min:5',
            'noteBody' => 'required  | min:5',
            'noteRecipient' => 'required | email',
            'noteSendDate' => 'required | date'
        ]);

        auth()->user()->notes()->create([
            'title' => $this->noteTitle,
            'body' => $this->noteBody,
            'recipient' => $this->noteRecipient,
            'send_date' => $this->noteSendDate,
            'is_published' => true
        ]);

        return redirect()->route('notes.index');
    }
}

//



?>

<div>
    
  
    <form wire:submit.prevent='submit' class="space-y-4">
        <x-errors />
        
        <x-input wire:model="noteTitle" label="Title"  />
        <x-input wire:model="noteRecipient" label="Recipient" type="email"  />
        <x-input wire:model="noteSendDate" type="date" label="Send Date"  />
        <x-textarea wire:model="noteBody" label="Body"  />

        <x-button type="submit" primary class="" spinner>Submit</x-button>

        
    </form>
   
</div>
