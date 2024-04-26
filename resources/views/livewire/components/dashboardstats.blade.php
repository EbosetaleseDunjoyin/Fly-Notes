<?php

use Livewire\Volt\Component;

new class extends Component {
    //

    public function with()
    {
        return[
          'sentNotesCount' => auth()->user()->notes()->where('send_date', '<=', now())->where('is_published',true)->count(),
            'lovedNotesCount' => auth()->user()->notes()->sum('heart_count')
        ];
    }
}; 

?>

<div>
    <div class="grid grid-cols-1 gap-8 md:grid-cols-2" >
        <x-card class="flex flex-col items-center justify-center p-6 space-y-4">
            <p class="text-lg font-medium">Notes Sent</p>
            <p class="text-3xl font-bold">{{ $sentNotesCount }}</p>
        </x-card>
        <x-card class="flex flex-col items-center justify-center p-6 space-y-4">
            <p class="text-lg font-medium">Notes Loved</p>
            <p class="text-3xl font-bold">{{ $lovedNotesCount }}</p>
        </x-card>
    </div>
</div>
