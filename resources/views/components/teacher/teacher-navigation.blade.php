<x-nav-link wire:navigate href="{{ route('teacher.dashboard') }}" :active="request()->routeIs('teacher.dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>

<x-nav-link wire:navigate href="{{ route('teacher.quiz') }}" :active="request()->routeIs('teacher.quiz')">
    {{ __('Quiz') }}
</x-nav-link>
