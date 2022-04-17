<section class="container mx-auto p-6 font-sans">
    <div class="w-full flex overflow-hidden rounded-lg mb-8">
        <div class="w-full pr-5">
            <div class="flex flex-col md:flex-row bg-white rounded-full" x-data="{ search: '' }">
                <div class="xl:w-5/6 sm:w-full my-2">
                    <input type="search"
                        class="w-full text-gray-900 rounded-full focus:outline-none"
                        placeholder="Buscar"
                    >
                </div>
                <div class="xl:w-1/6 sm:w-full my-2 pl-2">
                    <button class="w-full h-9 bg-blue-800  text-white rounded-full hover:bg-indigo-900" wire:click="create">
                        <i class="fas fa-plus-circle"></i> {{ __('Nuevo Usuario') }}
                    </button>
                </div>
            </div>
        </div>
</section>
