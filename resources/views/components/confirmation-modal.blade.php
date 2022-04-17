@props(['hash'])

<div x-data="{show: false}"
x-show="show"
@hashchange.window="
    show = (location.hash === '#{{ $hash }}');
"
style="display: none"
>
    <div class="fixed inset-0 bg-gray-500 opacity-80"></div>
    <div class="bg-white p-4 shadow-md max-w-sm m-auto rounded-md fixed inset-0 h-48">
        <div class="flex flex-col w-full h-full justify-between ">
            <header>
                <h3 class="font-bold text-lg">{{ $title }}</h3>
            </header>

            <main class="mb-4">
                {{ $content }}
            </main>

            <footer>
                {{ $footer }}
            </footer>
        </div>
    </div>
</div>
