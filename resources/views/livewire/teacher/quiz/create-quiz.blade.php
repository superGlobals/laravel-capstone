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
                        Create Quiz {{ $questionCount }}
                    </h1>
                    {{-- <p class="text-sm text-gray-700">
                        A list of all the Students.
                    </p> --}}
                </div>

                <div class="sm:mt-0 sm:ml-16 sm:flex-none">
                    <x-anchor-tag wire:navigate href="hahah">Back</x-anchor-tag>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border-t-4 border-gray-800">

                <div class="px-8 py-4 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <x-label for="form.name" value="Quiz Title" />
                            <x-input wire:model="form.name" id="form.name" type="text" class="mt-1 w-full" />
                            <x-input-error for="form.name" class="mt-1" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-label for="form.name" value="Quiz Description (Optional)" />
                            <x-input wire:model="form.name" id="form.name" type="text" class="mt-1 w-full" />
                            <x-input-error for="form.name" class="mt-1" />
                        </div>

                        <x-button @click="$wire.set('createTrueOrFalse', true)">True Or False</x-button>
                        <x-button @click="$wire.set('createMultipleChoice', true)">Multiple Choice</x-button>
                        <x-button @click="$wire.set('createFillInTheBlank', true)">Fill in the blank</x-button>
                    </div>
                    <div class="grid grid-cols-6 gap-6 mt-4">
                        <div class="col-span-6 sm:col-span-4">
                            <form wire:submit="qwe">
                                @if ($trueOrFalseType)
                                    <p class="text-lg">True Or False</p>
                                    @for ($i = 1; $i <= $tfNumberQuestion; $i++)
                                        <div class="mt-4">
                                            <x-label for="question_{{ $i }}"
                                                value="Question #{{ $i }}" />
                                            <div class="flex">
                                                <x-input wire:model="questions.{{ $i }}.text"
                                                    id="question_{{ $i }}" type="text"
                                                    class="mt-1 w-full" />
                                                <button type="button" wire:click="removeTFQuestion"
                                                    class="ml-2 mt-2 px-2 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                                    X
                                                </button>
                                            </div>
                                            <div class="flex items-center space-x-2 mt-2">
                                                <input type="radio" id="trueOption_{{ $i }}"
                                                    wire:model="questions.{{ $i }}.answer" value="true"
                                                    name="true-false_{{ $i }}"
                                                    class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                                <label for="trueOption_{{ $i }}"
                                                    class="text-gray-700">True</label>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <input type="radio" id="falseOption_{{ $i }}"
                                                    wire:model="questions.{{ $i }}.answer" value="false"
                                                    name="true-false_{{ $i }}"
                                                    class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                                <label for="falseOption_{{ $i }}"
                                                    class="text-gray-700">False</label>
                                            </div>
                                            <x-input-error for="questions.{{ $i }}.text" class="mt-1" />
                                        </div>
                                    @endfor

                                    <button type="button" wire:click="addTFQuestion"
                                        class="mt-4 inline-flex items-center px-4 py-2 bg-indigo-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Add True or False Question
                                    </button>
                                @endif

                                @if ($multipleChoiceType)
                                    <p class="text-lg mt-8">Multiple Choice</p>
                                    @for ($i = 1; $i <= $mcNumberQuestion; $i++)
                                        <div class="mt-4">
                                            <x-label for="name" value="Question # {{ $i }}" />
                                            <x-input wire:model="name" id="name" type="text"
                                                class="mt-1 w-full" />

                                            <div class="grid grid-cols-2 gap-4 mt-2">

                                                <div class="flex items-center space-x-2">
                                                    <input id="answer_{_a" name="answer_{" type="radio" value="a"
                                                        required class="form-radio">
                                                    <label for="answer_{_a" class="text-sm font-medium">A</label>
                                                    <x-input wire:model="name" id="name" type="text"
                                                        class="mt-1 w-full" />
                                                </div>

                                                <div class="flex items-center space-x-2">
                                                    <input id="answer_{_b" name="answer_{" type="radio" value="b"
                                                        required class="form-radio">
                                                    <label for="answer_{_b" class="text-sm font-medium">B</label>
                                                    <x-input wire:model="name" id="name" type="text"
                                                        class="mt-1 w-full" />
                                                </div>


                                                <div class="flex items-center space-x-2">
                                                    <input id="answer_{_c" name="answer_{" type="radio"
                                                        value="c" required class="form-radio">
                                                    <label for="answer_{_c" class="text-sm font-medium">C</label>
                                                    <x-input wire:model="name" id="name" type="text"
                                                        class="mt-1 w-full" />
                                                </div>

                                                <div class="flex items-center space-x-2">
                                                    <input id="answer_{_d" name="answer_{" type="radio"
                                                        value="d" required class="form-radio">
                                                    <label for="answer_{_d" class="text-sm font-medium">D</label>
                                                    <x-input wire:model="name" id="name" type="text"
                                                        class="mt-1 w-full" />
                                                </div>
                                            </div>
                                            <x-input-error for="name" class="mt-1" / </div>
                                    @endfor
                                @endif

                                <x-button class="mr-3">
                                    Submit
                                </x-button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- TRUE OR FALSE --}}
    <x-dialog-modal wire:model.live="createTrueOrFalse" submit="createTFQuestionLists">
        <x-slot name="title">
            Create True or False
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-col-12 gap-4">
                <div class="col-span-12">
                    <x-label for="tfNumberQuestion" value="Number of Question" />
                    <x-input wire:model="tfNumberQuestion" id="tfNumberQuestion" type="text"
                        class="mt-1 w-full" />
                    <x-input-error for="tfNumberQuestion" class="mt-1" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-button class="mr-3" wire:loading.attr="disabled">
                Save
            </x-button>

            <x-secondary-button @click="$wire.set('createTrueOrFalse', false)" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

    {{-- MULTIPLE CHOICE --}}
    <x-dialog-modal wire:model.live="createMultipleChoice" submit="createMultipleChoiceQuestionLists">
        <x-slot name="title">
            Create True or False
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-col-12 gap-4">
                <div class="col-span-12">
                    <x-label for="mcNumberQuestion" value="Number of Question" />
                    <x-input wire:model="mcNumberQuestion" id="mcNumberQuestion" type="text"
                        class="mt-1 w-full" />
                    <x-input-error for="mcNumberQuestion" class="mt-1" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-button class="mr-3" wire:loading.attr="disabled">
                Save
            </x-button>

            <x-secondary-button @click="$wire.set('createMultipleChoice', false)" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
