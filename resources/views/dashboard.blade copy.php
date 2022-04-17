<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  py-5 px-2 overflow-hidden shadow-xl sm:rounded-lg">
                <p>You are loged in!!</p>
                <p><a href="#check-modal">Delete Modal</a></p>

                <p class="my-5">
                    <form action="/" method="POST"
                        id="delete-user-form"
                        x-data="{confirmed: false}"
                        @submit.prevent="
                            if (!confirmed) location.hash = '#user-delete-modal';
                        ">
                        @csrf
                        <button type="submit" class="text-white bg-blue-400 text-xs
                                    uppercase py-2 px-4 rounded-md transition-all duration-200 hover:bg-blue-600">Delete Please!!</button>
                    </form>

                </p>


                <x-confirmation-modal hash="check-modal">
                    <x-slot name="title">
                        Just Checking?
                    </x-slot>
                    <x-slot name="content">
                        <p>Im a Modal</p>
                    </x-slot>
                    <x-slot name="footer">
                        <a href="#user-delete-modal"
                            class="text-white bg-gray-400 text-xs uppercase py-2 px-4 rounded-md transition-all duration-200 hover:bg-gray-600">Cancel</a>
                        <button
                            class="text-white bg-blue-400 text-xs uppercase py-2 px-4 rounded-md transition-all duration-200 hover:bg-blue-600">Continue</button>
                    </x-slot>

                </x-confirmation-modal>

                <x-confirmation-modal hash="user-delete-modal">
                    <x-slot name="title">
                        Are you Sure?
                    </x-slot>
                    <x-slot name="content">
                        <p>Im a Modal</p>
                    </x-slot>
                    <x-slot name="footer">
                        <a href="#"
                            class="text-white bg-gray-400 text-xs uppercase py-2 px-4 rounded-md transition-all duration-200 hover:bg-gray-600">Cancel</a>
                        <button
                            @click="document.querySelector('#delete-user-form').submit()"
                            class="text-white bg-blue-400 text-xs uppercase py-2 px-4 rounded-md transition-all duration-200 hover:bg-blue-600">Continue</button>
                    </x-slot>

                </x-confirmation-modal>

            </div>
        </div>
    </div>
</x-app-layout>
