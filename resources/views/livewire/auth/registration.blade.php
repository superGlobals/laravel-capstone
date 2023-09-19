<div>
    <!-- resources/views/livewire/auth/registration-component.blade.php -->

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>
        <h2 class="mb-4">Step {{ $currentStep }}:
            {{ $currentStep === 1 ? 'Personal Information' : 'Account Information' }}</h2>
        <form wire:submit.prevent="completeRegistration">
            @if ($currentStep == 1)
                <!-- Step 1 Fields -->
                <div>
                    <x-label for="first_name" value="{{ __('First Name') }}" />
                    <x-input id="first_name" class="block mt-1 w-full" type="text" wire:model="first_name" autofocus
                        autocomplete="name" />
                    <x-input-error for="first_name" class="mt-1" />
                </div>
                <!-- Middle Name Field -->
                <div class="mt-4">
                    <x-label for="middle_name" value="{{ __('Middle Name') }}" />
                    <x-input id="middle_name" class="block mt-1 w-full" type="text" wire:model="middle_name"
                        autofocus autocomplete="middle_name" />
                    <x-input-error for="middle_name" class="mt-1" />
                </div>
                <!-- Last Name Field -->
                <div class="mt-4">
                    <x-label for="last_name" value="{{ __('Last Name') }}" />
                    <x-input id="last_name" class="block mt-1 w-full" type="text" wire:model="last_name" autofocus
                        autocomplete="last_name" />
                    <x-input-error for="last_name" class="mt-1" />
                </div>
            @elseif ($currentStep == 2)
                <!-- Step 2 Fields -->
                <div>
                    <x-label for="role" value="{{ __('Role') }}" />
                    <x-select wire:model.live="role" class="mt-1 w-full">
                        <option value=""></option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </x-select>
                    <x-input-error for="role" class="mt-1" />
                </div>
                <!-- Username Field -->
                <div class="mt-4">
                    @if ($role === 'teacher')
                        <x-label for="username" value="{{ __('Teacher Number') }}" />
                        <x-input id="username" class="block mt-1 w-full" type="text" wire:model="username"
                            autofocus />
                        <x-input-error for="username" class="mt-1" />
                    @elseif($role === 'student')
                        <x-label for="username" value="{{ __('Student Number') }}" />
                        <x-input id="username" class="block mt-1 w-full" type="text" wire:model="username"
                            autofocus />
                        <x-input-error for="username" class="mt-1" />
                    @endif
                </div>
                <!-- Email Field -->
                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" wire:model="email" />
                    <x-input-error for="email" class="mt-1" />
                </div>
                <!-- Password Fields -->
                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" wire:model="password"
                        autocomplete="new-password" />
                    <x-input-error for="password" class="mt-1" />
                </div>
                <!-- Confirm Password Field -->
                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        wire:model="password_confirmation" autocomplete="new-password" />
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <!-- Previous Button -->
                @if ($currentStep > 1)
                    <x-secondary-button wire:click="previousStep" type="button">
                        {{ __('Previous') }}
                    </x-secondary-button>
                @endif

                <!-- Next / Complete Registration Button -->
                @if ($currentStep < 2)
                    <a wire:navigate
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <x-button type="button" wire:click="nextStep" class="ml-4">
                        {{ __('Next') }}
                    </x-button>
                @elseif ($currentStep == 2)
                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                @endif
            </div>
        </form>
    </x-authentication-card>

</div>
