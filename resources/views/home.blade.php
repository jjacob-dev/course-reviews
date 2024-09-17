<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @php
                        $user = auth()->user(); // Get the currently logged-in user
                    @endphp

                    @if ($user->type === 'student')
                        <h1>{{ __('Enrolled Courses') }}</h1>
                    @elseif ($user->type === 'teacher')
                        <h1>{{ __('Courses You Teach') }}</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
