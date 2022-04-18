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
                                    <th class="p-3 text-left">{{ __('Roles') }}</th>
                                    <th class="p-3 text-left">{{ __('State') }}</th>
                                </tr>
                            @endforeach
                        </thead>
                        <tbody class="flex-1 sm:flex-none">
                            @forelse ($rows as $row)
                                <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                    <td class="border-grey-light border hover:bg-gray-500 hover:text-white p-3">{{ $row->id }}</td>
                                    <td class="border-grey-light border hover:bg-gray-500 hover:text-white p-3">
                                        <button class="text-blue-500 hover:text-blue-500 hover:text-white"
                                            wire:click="editModal({{ $row->id }})">
                                            {{ $row->name }}
                                        </button>
                                    </td>
                                    <td class="border-grey-light border hover:bg-gray-500 hover:text-white p-3">{{ $row->email }}</td>
                                    <td class="border-grey-light border hover:bg-gray-500 hover:text-white p-3">
                                        @foreach ($row->roles as $role)
                                            {{ $role->name }},
                                        @endforeach
                                    </td>
                                    <td class="border-grey-light border hover:bg-gray-500 hover:text-white p-3">
                                       @if($row->state === true)
                                        Activo
                                       @else
                                        Inactivo
                                       @endif
                                    </td>
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

        <x-jet-dialog-modal wire:model.defer="showEditModal">
            <x-slot name="title">
                {{ __('Edit User') }}
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4 mb-5">
                    <x-jet-label for="name" value="{{ __('User Name') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" autofocus  wire:model="editing.name"
                        placeholder="User Name" />
                    <x-jet-input-error for="editing.name" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-5">
                    <x-jet-label for="name" value="{{ __('User email') }}" />
                    <x-jet-input id="email" type="email" class="mt-1 block w-full" autofocus  wire:model="editing.email"
                        placeholder="User E-Mail" />
                    <x-jet-input-error for="editing.email" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-5">
                    <x-jet-label for="name" value="{{ __('User Password') }}" />
                    <x-jet-input id="password" type="password" class="mt-1 block w-full" autofocus  wire:model.defer="editing.password"
                        placeholder="User Password" />
                    <x-jet-input-error for="editing.password" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-5">
                    <x-jet-label for="role" value="{{ __('Roles') }}" />
                    <select name="settlements" class="mt-1 block w-full" wire:model="rol" >
                        @foreach ($roles as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="editing.settlement_id" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-5">
                    <x-jet-label for="state" value="{{ __('Estado') }}" />
                    <select name="states" class="mt-1 block w-full" wire:model="editing.state" >
                        @foreach ($states as $row)
                            <option value="{{ $row['value'] }}">{{ $row['state'] }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="editing.state" class="mt-2" />
                </div>

            </x-slot>
            <x-slot name="footer">
                @if ($create === true)
                    <x-jet-button class="ml-4" wire:click="save">
                        {{ __('Crear') }}
                    </x-jet-button>
                @else
                    <x-jet-button class="ml-4" wire:click="save">
                        {{ __('Editar') }}
                    </x-jet-button>
                @endif

                <x-jet-secondary-button wire:click="closeModal">
                    {{ __('Cerrar') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
</section>
