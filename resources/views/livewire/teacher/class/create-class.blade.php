<div>
    {{-- Success is as dangerous as failure. --}}
    <x-button @click="$wire.set('createTeacherClassModal', true)">New Class</x-button>

    <x-dialog-modal wire:model.live="createTeacherClassModal" submit="saveTeacherClass">
        <x-slot name="title">
            Create Class
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-col-12 gap-4">


                {{-- Class --}}
                <div class="col-span-12">
                    <x-label for="course_id" value="Class Name" />
                    <x-select wire:model.live="course_id" class="mt-1 w-full">
                        <option value=""></option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->courseYear() }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="course_id" class="mt-1" />
                </div>

                {{-- Section --}}
                <div class="col-span-12">
                    <x-label for="section_id" value="Section Name" />
                    <x-select wire:model.live="section_id" class="mt-1 w-full">
                        <option value=""></option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="section_id" class="mt-1" />
                </div>

                {{-- Subject --}}
                <div class="col-span-12">
                    <x-label for="subject_id" value="Subject Name" />
                    <x-select wire:model="subject_id" class="mt-1 w-full">
                        <option value=""></option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">
                                {{ $subject->subject_title . '-' . $subject->subject_code }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="subject_id" class="mt-1" />
                </div>


            </div>

        </x-slot>

        <x-slot name="footer">
            <x-button class="mr-3" wire:loading.attr="disabled">
                Save
            </x-button>

            <x-secondary-button @click="$wire.set('createTeacherClassModal', false)" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
