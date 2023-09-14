<div>
    {{-- In work, do what you enjoy. --}}
    <div class="flex justify-between items-center">
        <x-select wire:model.live="paginate" class="text-xs">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </x-select>

        <div class="flex items-center space-x-2">
            <label for="search" class="text-gray-600">Search:</label>
            <input wire:model.live.debounce.500ms="form.search" type="search" id="search"
                class="border rounded-md px-2 py-1 focus:outline-none focus:ring focus:border-blue-300">
        </div>
    </div>

    <table class="w-full mt-4">
        <thead class="bg-gray-50">
            <tr>
                {{-- <th class="p-2 whitespace-nowrap">#</th> --}}
                <th class="p-2 whitespace-nowrap"> ID
                </th>
                <th class="p-2 whitespace-nowrap"> Course
                </th>
                <th class="p-2 whitespace-nowrap">
                    Year
                </th>
                <th class="p-2 whitespace-nowrap">
                    Section
                </th>
                <th class="p-2 whitespace-nowrap">Action</th>
            </tr>

        </thead>
        <tbody>
            @forelse ($courses as $course)
                <tr>
                    <td class="p-2 text-center">{{ $course->id }}</td>
                    <td class="p-2 text-center">{{ $course->name }}</td>
                    <td class="p-2 text-center">{{ $course->customYear() }}</td>
                    <td class="p-2 text-center">{{ $course->section }}</td>
                    <td class="p-2 text-center">
                        <x-button @click="$dispatch('dispatch-course-edit', {id: '{{ $course->id }}'})"
                            type="button">Edit</x-button>
                        <x-danger-button
                            @click="$dispatch('dispatch-course-delete', {id: '{{ $course->id }}', name: '{{ $course->name }}' })">Delete</x-danger-button>

                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    <div class="mt-3">
        {{ $courses->links() }}
    </div>
</div>
