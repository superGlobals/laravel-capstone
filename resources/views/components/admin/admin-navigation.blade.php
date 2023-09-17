<x-nav-link wire:navigate href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>

<x-nav-link wire:navigate href="{{ route('course.index') }}" :active="request()->routeIs('course.index')">
    {{ __('Course') }}
</x-nav-link>

<x-nav-link wire:navigate href="{{ route('subject.index') }}" :active="request()->routeIs('subject.index')">
    {{ __('Subject') }}
</x-nav-link>
