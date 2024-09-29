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
                    <div>{{ __("Course Selection") }}</div>
                </div>

                <div class="grid grid-cols-3 gap-12 p-6 text-gray-900 dark:text-gray-100">
                    @foreach($courses as $course)
                    <div class="flex flex-col rounded-md shadow-md p-4 gap-4">
                        <div class="">
                            <a href="{{ url('/courses/' . $course->code)}}"><h1 class="text-base font-semibold text-zinc-700">{{$course -> name}}</h1></a>
                            <p class="text-xs font-medium text-zinc-400">{{$course -> code}}</p>
                        </div>
                        <div>
                            {{$course -> description}}
                        </div>
                        <div class="flex flex-grow items-end justify-end">
                            <button class="bg-red-500 text-white font-semibold h-10 w-10 rounded-full flex items-center justify-center transition-all duration-300 ease-in-out hover:w-20 focus:outline-none relative overflow-hidden group" onclick="openModal({{ $course->id }})">
                                <span class="text-lg absolute transition-all duration-300 ease-in-out group-hover:opacity-0">+</span>
                                <span class="opacity-0 transition-opacity duration-300 ease-in-out group-hover:opacity-100 whitespace-nowrap">Enroll +</span>
                            </button>                
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div id="enrollmentModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden justify-center items-center">
        <div class="h-48 w-80 p-4 bg-white rounded-md flex items-center justify-center">

            @php
                $courseId = "<script>document.getElementById('course_id').value</script>"; 
            @endphp
            
            <div class="flex flex-col gap-8 items-center justify-center">
                @if (auth()->user()->courses->contains($courseId))
                    <!-- User is already enrolled -->
                        <div class="text-xl font-semibold">You're already enrolled in this course!</div>
                        <button class="bg-red-500 text-white py-2 px-4 rounded-lg mt-4" onclick="closeModal()">Close</button>
                @else
                    <!-- User is not enrolled -->
                        <div class="text-xl font-semibold">Enroll in this course</div>
                        <div class="flex flex-row gap-8">
                            <form action="/enroll-course" method="post">
                                @csrf
                                <input type="hidden" id="course_id" name="course_id">
                                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg mt-4">Enroll</button>
                            </form>
                            <button class="bg-red-500 text-white py-2 px-4 rounded-lg mt-4" onclick="closeModal()">Cancel</button>
                        </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function openModal(courseId) {
            // Store the course ID in a hidden field or use it directly in the modal
            document.getElementById('course_id').value = courseId;
            
            // Display the modal
            document.getElementById('enrollmentModal').classList.remove('hidden');
            document.getElementById('enrollmentModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('enrollmentModal').classList.add('hidden');
            document.getElementById('enrollmentModal').classList.remove('flex');
        }
    </script>

</x-app-layout>
