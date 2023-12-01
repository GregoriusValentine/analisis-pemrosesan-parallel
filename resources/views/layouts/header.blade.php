<nav id="header" class="bg-white fixed w-full z-10 top-0 shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto block mt-2 lg:mt-0 bg-white z-20" id="nav-content">
            <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('dashboard.index') }}" class="block py-1 md:py-3 pl-1 align-middle {{ request()->routeIs('dashboard.*') ? 'text-pink-600' : 'text-gray-500 border-white' }} no-underline hover:text-gray-900 border-b-2 hover:border-pink-500">
                        <i class="fas fa-home fa-fw mr-3 {{ request()->routeIs('dashboard.*') ? 'text-pink-600' : 'text-gray-500' }}"></i><span class="pb-1 md:pb-0 text-sm hover:border-pink-500">Dashboard</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('research.index') }}" class="block py-1 md:py-3 pl-1 align-middle {{ request()->routeIs('research.*') ? 'text-pink-600' : 'text-gray-500 border-white' }} no-underline hover:text-gray-900 border-b-2 hover:border-pink-500">
                        <i class="fas fa-key fa-fw mr-3 {{ request()->routeIs('research.*') ? 'text-pink-600' : 'text-gray-500' }}"></i><span class="pb-1 md:pb-0 text-sm hover:border-pink-500">Research</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('result.index') }}" class="block py-1 md:py-3 pl-1 align-middle {{ request()->routeIs('result.*') ? 'text-pink-600' : 'text-gray-500 border-white' }} no-underline hover:text-gray-900 border-b-2 hover:border-pink-500">
                        <i class="fa fa-table fa-fw mr-3 {{ request()->routeIs('result.*') ? 'text-pink-600' : 'text-gray-500' }}"></i><span class="pb-1 md:pb-0 text-sm hover:border-pink-500">Result</span>
                    </a>
                </li>
            </ul>
            <div class="relative pull-right pl-4 pr-4 md:pr-0 ">
                {{ $title ?? config('app.name') }} Page
            </div>
        </div>
    </div>
</nav>