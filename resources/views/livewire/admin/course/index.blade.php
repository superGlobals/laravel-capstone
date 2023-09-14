<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="flex justify-end items-center mb-4">
                    <livewire:admin.course.create />
                </div>
                <livewire:admin.course.table />
                <livewire:admin.course.edit />
                <livewire:admin.course.delete />


            </div>
        </div>
    </div>
</div>
