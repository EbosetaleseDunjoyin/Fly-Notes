<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.guest')] class extends Component {

    public Note $note;


    public function mount(Note $note){

        //$this->authorize('update', $note);
        $this->fill($note);

        if(!$note->is_published && $note->user->id !== auth()->user()->id){
            abort(404);
        }
        
    }

  
    


}; 

?>

<div>
    
    
    <div class="py-8">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8 p-8 text-gray-900 dark:text-gray-100 bg-white">
            <div class="space-y-6">
                <h2  class="text-xl font-semibold ">
                    {{ $note->title }}
                </h2>
                <p class="text-sm ">{{ $note->body }} </p>
             </div>
            <div class="flex justify-between items-center my-4">
                <h4  class="text-xs  ">
                    Sent From: {{ $note->user->name }}
                </h4>
                
                <livewire:components.heartreact :note="$note">
             </div>

        </div>
    </div>
   
</div>
