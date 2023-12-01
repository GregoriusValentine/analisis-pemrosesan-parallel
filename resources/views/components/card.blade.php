@props([
    'title' => '',
])

<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 me-7">
    <div>
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $title }}</h5>
    </div>
    <div class="text-white">

        {{ $slot }}
    </div>
</div>
