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
            <div class="relative pull-right pl-4 pr-4 md:pr-0">
                <input type="search" placeholder="Search" class="w-full bg-gray-100 text-sm text-gray-800 transition border focus:outline-none focus:border-gray-700 rounded py-1 px-2 pl-10 appearance-none leading-normal">
                <div class="absolute search-icon" style="top: 0.375rem;left: 1.75rem;">
                    <svg class="fill-current pointer-events-none text-gray-800 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</nav>