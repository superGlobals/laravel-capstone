<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subject') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="flex justify-end items-center mb-4">
                    <livewire:admin.subject.create-subject />
                </div>
                <livewire:admin.subject.subject-table />
                <livewire:admin.subject.edit-subject />
                <livewire:admin.subject.delete-subject />


            </div>
        </div>
    </div>
</div>
