<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>{{ __("Courses") }}</div>
                </div>

                <div class="grid grid-cols-3 gap-12 p-6 text-gray-900 dark:text-gray-100">
                    @foreach($courses as $course)
                    <div class="flex flex-col rounded-md shadow-md p-4 gap-4">
                        <div class="">
                            <h1 class="text-base font-semibold text-zinc-700">{{$course -> name}}</h1>
                            <p class="text-xs font-medium text-zinc-400">{{$course -> code}}</p>
                        </div>
                        <div>
                            {{$course -> description}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
