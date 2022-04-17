<div class="navbar bg-base-100">
    <div class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex-1">
            <a href="/dashboard" class="btn btn-ghost normal-case text-xl">JobsBoard</a>
            {{-- <ul class="menu menu-horizontal p-0">
                <li><a>Item 1</a></li>
            </ul> --}}
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal p-0">
                <li tabindex="0">
                    <a>Usuarios
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 24 24">
                        <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                    </svg>
                    </a>
                    <ul class="p-2 bg-base-100">
                        <li><a href="/user">Listado Usuarios</a></li>
                    </ul>
                </li>
                <li tabindex="0">
                    <a>
                        {{ Auth::user()->name }}
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24">
                            <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                    </a>
                    <ul class="p-2 bg-base-100">
                        <li><a href="/user/profile">Profile</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                            <a href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
                                Log out
                            </a>
                        </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
