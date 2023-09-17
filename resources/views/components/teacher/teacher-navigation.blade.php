<x-nav-link wire:navigate href="{{ route('teacher.dashboard') }}" :active="request()->routeIs('teacher.dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>

<x-nav-link wire:navigate href="{{ route('course.index') }}" :active="request()->routeIs('course.index')">
    {{ __('Quizezz') }}
</x-nav-link>
