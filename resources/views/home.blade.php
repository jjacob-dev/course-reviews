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
                    @if ($user->type === 'student')
                        <h1>{{ __('Enrolled Courses') }}</h1>
                    @elseif ($user->type === 'teacher')
                        <h1>{{ __('Courses You Teach') }}</h1>
                    @endif
                </div>

                <div class="grid grid-cols-3 gap-12 p-6 text-gray-900 dark:text-gray-100">
                    @foreach($courses as $course)
                    <div class="flex flex-col rounded-md min-h-24 shadow-md p-4 gap-4">
                        <div class="">
                            <a href="{{ url('/courses/' . $course->code)}}"><h1 class="text-base font-semibold text-zinc-700">{{$course -> name}}</h1></a>
                            <p class="text-xs font-medium text-zinc-400">{{$course -> code}}</p>
                        </div>
                        <div>
                            {{$course -> description}}
                        </div>
                    </div>
                    @endforeach
                    
                    <div class="flex flex-col justify-center">
                        <a href="/courses">
                            <div class="mx-auto">
                                <div class="relative group cursor-pointer">
                                    <div
                                        class="min-h-40 absolute -inset-1 bg-gradient-to-r from-red-600 to-red-600 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200">
                                    </div>
                                    <div class="min-h-40 relative px-7 py-6 bg-white ring-1 ring-gray-900/5 rounded-lg leading-none flex items-top justify-center space-x-6">
                                        <div class="space-y-2 text-red-400 text-md flex items-center">
                                            <p class="">Add Course +</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>      

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
