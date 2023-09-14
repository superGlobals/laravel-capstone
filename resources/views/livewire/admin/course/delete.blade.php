<div>
    {{-- The whole world belongs to you. --}}
    <x-dialog-modal wire:model.live="deleteCourseModal">
        <x-slot name="title">
            Delete Course
        </x-slot>

        <x-slot name="content">
            <h2>Are you sure you want to delete course {{ $name }}?</h2>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('deleteCourseModal', false)" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>

            <x-danger-button @click="$wire.delete()" class="ml-3" wire:loading.attr="disabled">
                Delete
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
