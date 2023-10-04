<div>
    {{-- Page Header --}}
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Class') }}
        </h2>
    </x-slot> --}}

    {{-- Page Content --}}
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center mb-8">
                <div class="sm:flex-auto ">
                    <h1 class="text-xl font-semibold text-gray-900">
                        Students
                    </h1>
                    <p class="text-sm text-gray-700">
                        A list of all the Students.
                    </p>
                </div>

                <div class="sm:mt-0 sm:ml-16 sm:flex-none">
                    {{-- <x-anchor-tag wire:navigate href="{{ route('teacher.create-quiz') }}">New Quiz</x-anchor-tag> --}}
                    <x-button @click="$wire.set('chooseQuizType', true)">New Quiz</x-button>

                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border-t-4 border-gray-800">

                <div class="px-8 py-4 bg-white border-b border-gray-200">
                    <livewire:teacher.quiz.quiz-table />

                </div>
            </div>
        </div>
    </div>

    <x-dialog-modal wire:model.live="chooseQuizType" submit="createQuestionLists">
        <x-slot name="title">
            Create Course
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-col-12 gap-4">

                <div class="col-span-12">
                    <x-label for="questionType" value="Question Type" />
                    <x-select wire:model="questionType" class="mt-1 w-full">
                        <option value=""></option>
                        <option value="fillInTheBlank">Fill in The Blankr</option>
                        <option value="multipleChoice">Multiple Choice</option>
                        <option value="trueOrFalse">True Or False</option>
                    </x-select>
                    <x-input-error for="questionType" class="mt-1" />
                </div>

                <div class="col-span-12">
                    <x-label for="numQuestions" value="Number of Question" />
                    <x-input wire:model="numQuestions" id="numQuestions" type="text" class="mt-1 w-full" />
                    <x-input-error for="numQuestions" class="mt-1" />
                </div>

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-button class="mr-3" wire:loading.attr="disabled">
                Save
            </x-button>

            <x-secondary-button @click="$wire.set('chooseQuizType', false)" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
