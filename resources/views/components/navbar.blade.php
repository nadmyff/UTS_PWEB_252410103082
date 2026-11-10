@props(['username'])

<!-- navbar -->
<nav class="bg-navbar fixed w-full z-20 top-0 start-0 border-b border-default">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-1 rtl:space-x-reverse">
            <img src="{{ asset('images/coffee2.svg') }}" class="h-15 w-auto" alt="Logo noiffee" />
            <span class="self-center text-2xl text-heading font-semibold whitespace-nowrap">noiffee</span>
        </a>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-default rounded-base bg-neutral-secondary-soft md:flex-row md:space-x-8 md:mt-0 md:border-0 md:items-center">
                <!-- Dashboard -->
                <li>
                    <a href="{{ route('dashboard', ['username' => $username]) }}"
                        class="block rounded-lg px-3 py-2 text-sm transition duration-200
                        {{ request()->routeIs('dashboard')
                            ? 'bg-amber-100 text-amber-900 font-semibold'
                            : 'text-gray-700 hover:bg-amber-50 hover:text-amber-800' }}">
                        Dashboard
                    </a>
                </li>
                <!-- Pengelolaan -->
                <li>
                    <a href="{{ route('pengelolaan', ['username' => $username]) }}"
                        class="block rounded-lg px-3 py-2 text-sm transition duration-200
                        {{ request()->routeIs('pengelolaan')
                            ? 'bg-amber-100 text-amber-900 font-semibold'
                            : 'text-gray-700 hover:bg-amber-50 hover:text-amber-800' }}">
                        Pengelolaan
                    </a>
                </li>
                <!-- Profile -->
                <li>
                    <a href="{{ route('profile', ['username' => $username]) }}"
                        class="block rounded-lg px-3 py-2 text-sm transition duration-200
                        {{ request()->routeIs('profile')
                            ? 'bg-amber-100 text-amber-900 font-semibold'
                            : 'text-gray-700 hover:bg-amber-50 hover:text-amber-800' }}">
                        Profile
                    </a>
                </li>
                <!-- Keluar -->
                <li>
                    <a href="{{ route('login') }}"
                        class="flex items-center rounded-lg bg-coffee px-3 py-2 text-xs text-white hover:bg-coffee-hover transition duration-200">
                        Keluar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- end navbar -->