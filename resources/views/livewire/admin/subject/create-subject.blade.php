<div>
    {{-- Success is as dangerous as failure. --}}
    <x-button @click="$wire.set('createSubjectModal', true)">New Subject</x-button>

    <x-dialog-modal wire:model.live="createSubjectModal" submit="saveSubject">
        <x-slot name="title">
            Create Subject
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-col-12 gap-4">
                {{-- Course --}}
                <div class="col-span-12">
                    <x-label for="form.course_id" value="Course" />
                    <x-select wire:model="form.course_id" class="mt-1 w-full">
                        <option value=""></option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->courseYear() }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="form.course_id" class="mt-1" />
                </div>

                {{-- Code --}}
                <div class="col-span-12">
                    <x-label for="form.subject_code" value="Subject Code" />
                    <x-input wire:model="form.subject_code" id="form.subject_code" type="text" class="mt-1 w-full" />
                    <x-input-error for="form.subject_code" class="mt-1" />
                </div>

                {{-- Title --}}
                <div class="col-span-12">
                    <x-label for="form.subject_title" value="Subject Title" />
                    <x-input wire:model="form.subject_title" id="form.subject_title" type="text"
                        class="mt-1 w-full" />
                    <x-input-error for="form.subject_title" class="mt-1" />
                </div>

                {{-- Number of Units --}}
                <div class="col-span-12">
                    <x-label for="form.number_of_units" value="Number of Units" />
                    <x-input wire:model="form.number_of_units" id="form.number_of_units" type="text"
                        class="mt-1 w-full" />
                    <x-input-error for="form.number_of_units" class="mt-1" />
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-button class="mr-3" wire:loading.attr="disabled">
                Save
            </x-button>

            <x-secondary-button @click="$wire.set('createSubjectModal', false)" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
