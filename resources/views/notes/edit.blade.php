<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8 p-8 text-gray-900 dark:text-gray-100 bg-white">
            <div class="mt-3 mb-7">
                 <x-button  icon="arrow-left" href="{{ route('notes.index') }}">All Notes</x-button>
            </div>
            <h2 class="font-semibold text-xl hidden">Edit a note!</h2>

            <div class="my-3">
                <livewire:notes.edit-note>
            </div>
        </div>
    </div>
</x-app-layout>
