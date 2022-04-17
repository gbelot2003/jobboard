<section class="container mx-auto p-6 font-sans">
    <div class="w-full flex overflow-hidden rounded-lg mb-8">
        <div class="w-full pr-5">
            <div class="flex flex-col md:flex-row bg-white rounded-full" x-data="{ search: '' }">
                <div class="xl:w-5/6 sm:w-full my-2">
                    <input type="search" class="w-full h-9 text-gray-900 rounded-full focus:outline-none"
                        placeholder="Buscar" x-model="search" wire:model.debounce.500ms="search">
                </div>
                <div class="xl:w-1/6 sm:w-full my-2 xl:pl-2">
                    <button class="w-full h-9 bg-blue-800  text-white rounded-full hover:bg-indigo-900"
                        wire:click="create">
                        <i class="fas fa-plus-circle"></i> {{ __('Nuevo Usuario') }}
                    </button>
                </div>
            </div>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table
                        class="w-full flex flex-row flex-noa-wrp sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                        <thead class="text-gray-800">
                            @foreach ($rows as $row)
                                <tr
                                    class="bg-gray-300 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                    <th class="p-3 text-left">{{ __('Id') }}</th>
                                    <th class="p-3 text-left">{{ __('Nombre') }}</th>
                                    <th class="p-3 text-left">{{ __('Email') }}</th>
                                </tr>
                            @endforeach
                        </thead>
                        <tbody class="flex-1 sm:flex-none">
                            @forelse ($rows as $row)
                                <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                    <td class="border-grey-light border hover:bg-gray-100 p-3">{{ $row->id }}</td>
                                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                                        <button class="text-blue-500 hover:text-blue-100"
                                            wire:click="editModal({{ $row->id }})">
                                            {{ $row->name }}
                                        </button>
                                    </td>
                                    <td class="border-grey-light border hover:bg-gray-100 p-3">{{ $row->email }}</td>
                                </tr>
                            @empty
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border font-semibold" colspan="7">
                                        <div class="text-center">
                                            <strong>{{ __('No data found') }}</strong>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-5 pl-3 pr-3 pb-2 rounded-lg shadow-lg">
                        {{ $rows->links() }}
                    </div>
                </div>
            </div>
        </div>
</section>
