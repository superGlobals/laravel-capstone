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
                <th class="p-2 whitespace-nowrap"> Quiz Title
                </th>
                <th class="p-2 whitespace-nowrap"> Quiz Description
                </th>
                <th class="p-2 whitespace-nowrap"> Created at </th>

                <th class="p-2 whitespace-nowrap">Action</th>
            </tr>

        </thead>
        <tbody>

        </tbody>
    </table>
    <div class="mt-3">
    </div>
</div>
