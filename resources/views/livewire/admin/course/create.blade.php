<div>
    {{-- Success is as dangerous as failure. --}}
    <x-button @click="$wire.set('createCourseModal', true)">New Course</x-button>

    <x-dialog-modal wire:model.live="createCourseModal" submit="save">
        <x-slot name="title">
            Create Course
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-col-12 gap-4">
                {{-- Name --}}
                <div class="col-span-12">
                    <x-label for="form.name" value="Course" />
                    <x-input wire:model="form.name" id="form.name" type="text" class="mt-1 w-full" />
                    <x-input-error for="form.name" class="mt-1" />
                </div>

                {{-- Email --}}
                <div class="col-span-12">
                    <x-label for="form.year" value="Year" />
                    <x-select wire:model="form.year" class="mt-1 w-full">
                        <option value=""></option>
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                    </x-select>
                    <x-input-error for="form.year" class="mt-1" />
                </div>

                {{-- Address --}}
                <div class="col-span-12">
                    <x-label for="form.section" value="Section" />
                    <x-input wire:model="form.section" id="form.section" type="text" class="mt-1 w-full" />
                    <x-input-error for="form.section" class="mt-1" />
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-button class="mr-3" wire:loading.attr="disabled">
                Save
            </x-button>

            <x-secondary-button @click="$wire.set('createCourseModal', false)" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
