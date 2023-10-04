<div>
    {{-- Page Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Page Content --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border-t-4 border-gray-800">

                <div class="px-8 py-4 bg-white border-b border-gray-200">
                    {{-- <x-application-logo class="block h-12 w-auto" /> --}}
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl font-medium text-gray-900">My Class</h1>
                        <div class="flex justify-end items-center">
                            <livewire:teacher.class.create-class />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">

                        @forelse ($data as $teacherClass)
                            <a wire:navigate href="{{ route('teacher.class', $teacherClass->id) }}">
                                <div
                                    class="bg-white overflow-hidden shadow-md rounded-md border-t-4 {{ changeClassCardBorder($teacherClass->course->name) }}">
                                    <div class="p-6">
                                        {{-- <h2>Today: 4PM - 5PM</h2> --}}
                                        <h2 class="text-xl font-semibold text-gray-900">
                                            {{ $teacherClass->courseYearSection() }}
                                        </h2>
                                        <p class="mt-1 font-semibold text-gray-600">
                                            {{ $teacherClass->subject->subject_title }}</p>
                                        <p class="mb-1 text-sm text-gray-600">{{ $teacherClass->subject->subject_code }}
                                        </p>
                                        <hr>

                                    </div>
                                </div>
                            </a>
                        @empty
                            <h1 class="text-center text-3xl">
                                No Class Added..
                            </h1>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
