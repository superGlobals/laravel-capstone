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

                <div class="p-4 bg-white border-b border-gray-200">
                    {{-- <x-application-logo class="block h-12 w-auto" /> --}}
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl font-medium text-gray-900">My Class</h1>
                        <div class="flex justify-end items-center">
                            <livewire:teacher.class.create-class />
                        </div>
                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
                        <!-- Card 1 -->
                        <a wire:navigate href="">
                            <div class="bg-white overflow-hidden shadow-md rounded-md border-t-4 border-orange-500">
                                <div class="p-6">
                                    <h2 class="text-xl font-semibold text-gray-900">BSIT-1A</h2>
                                    <p class="mt-2 text-gray-600">IT-CAP02</p>
                                </div>
                            </div>
                        </a>

                        <a wire:navigate href="">
                            <div class="bg-white overflow-hidden shadow-md rounded-md border-t-4 border-blue-500">
                                <div class="p-6">
                                    <h2 class="text-xl font-semibold text-gray-900">BSIT-1A</h2>
                                    <p class="mt-2 text-gray-600">IT-CAP02</p>
                                </div>
                            </div>
                        </a>

                        <a wire:navigate href="">
                            <div class="bg-white overflow-hidden shadow-md rounded-md border-t-4 border-green-500">
                                <div class="p-6">
                                    <h2 class="text-xl font-semibold text-gray-900">BSBA-1A</h2>
                                    <p class="mt-2 text-gray-600">IT-CAP02</p>
                                </div>
                            </div>
                        </a>

                        <a wire:navigate href="">
                            <div class="bg-white overflow-hidden shadow-md rounded-md border-t-4 border-blue-500">
                                <div class="p-6">
                                    <h2 class="text-xl font-semibold text-gray-900">BSIT-1A</h2>
                                    <p class="mt-2 text-gray-600">IT-CAP02</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
