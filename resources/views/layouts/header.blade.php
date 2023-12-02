<nav id="header" class="bg-white fixed w-full z-10 top-0 shadow h-20 sm:h-18">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-center md:justify-start h-full">
        <div class="w-full flex-grow flex items-center w-auto block z-20" id="nav-content">
            <ul class="list-reset flex flex-1 items-center justify-center md:justify-start px-4 md:px-0">
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('dashboard.index') }}" class="block py-1 md:py-3 pl-1 align-middle {{ request()->routeIs('dashboard.*') ? 'text-pink-600' : 'text-gray-500 border-white' }} no-underline text-center md:text-start">
                        <i class="fas fa-home fa-fw mr-3 {{ request()->routeIs('dashboard.*') ? 'text-pink-600' : 'text-gray-500' }}"></i><span class="pb-1 md:pb-0 text-sm">Dashboard</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('research.index') }}" class="block py-1 md:py-3 pl-1 align-middle {{ request()->routeIs('research.*') ? 'text-pink-600' : 'text-gray-500 border-white' }} no-underline text-center md:text-start">
                        <i class="fas fa-key fa-fw mr-3 {{ request()->routeIs('research.*') ? 'text-pink-600' : 'text-gray-500' }}"></i><span class="pb-1 md:pb-0 text-sm">Research</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('result.index') }}" class="block py-1 md:py-3 pl-1 align-middle {{ request()->routeIs('result.*') ? 'text-pink-600' : 'text-gray-500 border-white' }} no-underline text-center md:text-start">
                        <i class="fa fa-table fa-fw mr-3 {{ request()->routeIs('result.*') ? 'text-pink-600' : 'text-gray-500' }}"></i><span class="pb-1 md:pb-0 text-sm">Result</span>
                    </a>
                </li>
            </ul>
            <div class="relative pull-right pl-4 pr-4 md:pr-0 hidden lg:block">
                {{ $title ?? config('app.name') }} Page
            </div>
        </div>
    </div>
</nav>