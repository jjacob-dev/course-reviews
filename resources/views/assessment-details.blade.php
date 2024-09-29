<x-app-layout>
    <div class="flex w-full justify-center h-80 bg-cover bg-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('images/banner.jpg') }}');">
        <div class="w-1/2 flex flex-col justify-end text-white font-bold text-4xl brightness-100 uppercase"><h1 class="pb-12"></h1></div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center">
                    <div class="flex w-[85%] m-6 p-6 rounded-lg bg-gray-100">
                        <div class="flex gap-5 flex-grow-[2]">
                            <div class="flex flex-col gap-6 flex-grow">    
                                <div class="flex gap-2 flex-grow">
                                    <div class="pt-2">
                                        <x-phosphor-chalkboard-teacher class="h-6 w-6 text-red-600" />
                                    </div>
                                    <div>
                                        <h1 class="text-lg font-semibold">TEACHERS</h1>
                                    </div>  
                                </div>
                                <div class="flex gap-2 flex-grow">
                                    <div class="pt-2">
                                        <x-phosphor-codepen-logo-light class="h-6 w-6 text-red-600" />
                                    </div>                                 
                                    <div>
                                        <h1 class="text-lg font-semibold">COURSE CODE</h1>
                                    </div>  
                                </div>
                            </div>
                            <div class="flex flex-col gap-6 flex-grow">
                                <div class="flex gap-2 flex-grow">
                                    <div class="pt-2">
                                        <x-phosphor-student class="w-6 h-6 text-red-600"/>
                                    </div>
                                    <div>
                                        <h1 class="text-lg font-semibold">STUDY LEVEL</h1>
                                        <p>Undergraduate</p>
                                    </div>  
                                </div>
                                <div class="flex gap-2 flex-grow"> 
                                    <div class="pt-2">
                                        <x-phosphor-sort-ascending class="h-6 w-6 text-red-600" />
                                    </div> 
                                    <div>
                                        <h1 class="text-lg font-semibold">CREDIT POINTS</h1>
                                        <p>10</p>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col flex-grow">
                            <div class="flex gap-2">
                                <div class="pt-2">
                                    <x-phosphor-sort-ascending class="h-6 w-6 text-red-600" />
                                </div>
                                <div>
                                    <h1 class="text-lg font-semibold">ASSESSMENTS</h1>
        
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>
                

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold">About this course</h1>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold">Assessments</h1>                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>