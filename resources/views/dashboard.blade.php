@extends('layouts.app')
@section('title', 'OLINTU - Dashboard')
@section('content')
<section class="bg-gray-100 mx-auto">

    <!-- Navigation -->
    <nav class="p-4 text-white" style="background-color: #2E6D32; display: flex; justify-content: space-between; align-items: flex-start;">
        <div class="flex items-start">
            <h1 class="text-2xl font-semibold mt-1">OLINTU Dashboard</h1>
        </div>
        <div id="user-profile" class="flex items-start">
            <button type="button" class="flex text-lg bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="{{ asset('images/user-icon.png') }}" alt="user photo">
            </button>
            @if(!empty(Session::get('user')->role))
                <div class="z-50 hidden ml-2 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                    <div class="px-4 py-3" role="none">
                        <p id="user-profile-name" class="text-sm text-gray-900 dark:text-white" role="none"></p>
                            @if(Session::get('user')->role == 1)
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">Admin</p>
                            @else
                                <p id="user-profile-number" class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none"></p>
                            @endif
                    </div>
                    <ul class="py-1" role="none">
                        @if(!empty(Session::get('user')->role))
                            @if(Session::get('user')->role == 1)
                            <li>
                                <a href="{{ URL('account_management') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Account Management</a>
                            </li>
                            <li>
                                <a href="{{ URL('lesson_management') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Lesson Management</a>
                            </li>
                            @endif
                        @endif
                        <li>
                            <a href="{{ route('grade.records') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Records</a>
                        </li>
                        <li>
                            <a href="{{ route('settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </nav>


    <!-- Main Content -->
    <div class="container mx-auto mt-8 px-6 py-8 mx-auto lg:py-0">

        <!-- Topics Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Topics</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Topic Card -->
                <div class="p-4 rounded shadow" style="background: #FFDAC2;">
                    <h3 class="text-3xl mb-2">Introduction to PHP</h3>
                    <p class="text-gray-600 h-16">Learn the basic features of PHP</p>
                    <button class="bg-black text-white px-4 py-2 my-2 mx-auto block rounded shadow">
                        <a href="{{ route('dashboard.topic', ['value' => 1]) }}">
                            Learn Now!
                        </a>
                    </button>
                </div>
                <div class="p-4 rounded shadow" style="background: #D6E6B0;">
                    <h3 class="text-3xl mb-2">PHP Installation</h3>
                    <p class="text-gray-600 h-16">Learn on how to install PHP on your device</p>
                    <button class="bg-black text-white px-4 py-2 my-2 mx-auto block rounded shadow">
                        <a href="{{ route('dashboard.topic', ['value' => 2]) }}">
                            Learn Now!
                        </a>
                    </button>
                </div>
                <div class="p-4 rounded shadow" style="background: #D4C8C2;">
                    <h3 class="text-3xl mb-2">PHP Common Use</h3>
                    <p class="text-gray-600 h-16">Learn to perform system functions such as create, open, read and write.</p>
                    <button class="bg-black text-white px-4 py-2 my-2 mx-auto block rounded shadow">
                        <a href="{{ route('dashboard.topic', ['value' => 3]) }}">
                            Learn Now!
                        </a>
                    </button>
                </div>
                <div class="p-4 rounded shadow" style="background: #E5EA85;">
                    <h3 class="text-3xl mb-2">Introduction to Array</h3>
                    <p class="text-gray-600 h-16">Learn on how to use different types of array and functions</p>
                    <button class="bg-black text-white px-4 py-2 my-2 mx-auto block rounded shadow">
                        <a href="{{ route('dashboard.topic', ['value' => 4]) }}">
                            Learn Now!
                        </a>
                    </button>
                </div>
                <div class="p-4 rounded shadow" style="background: #F9DB99;">
                    <h3 class="text-3xl mb-2">Web Concepts</h3>
                    <p class="text-gray-600 h-16">Learn environmental variables such as html forms, method and files.</p>
                    <button class="bg-black text-white px-4 py-2 my-2 mx-auto block rounded shadow">
                        <a href="{{ route('dashboard.topic', ['value' => 5]) }}">
                            Learn Now!
                        </a>
                    </button>
                </div>
                <div class="p-4 rounded shadow" style="background: #A5CF85;">
                    <h3 class="text-3xl mb-2">Advanced PHP</h3>
                    <p class="text-gray-600 h-16">Learn on how to predefined variables such as server variables, expressions and descriptions</p>
                    <button class="bg-black text-white px-4 py-2 my-2 mx-auto block rounded shadow">
                        <a href="{{ route('dashboard.topic', ['value' => 6]) }}">
                            Learn Now!
                        </a>
                    </button>
                </div>
                <div class="p-4 rounded shadow" style="background: #E6C9FB;">
                    <h3 class="text-3xl mb-2">Database Connection</h3>
                    <p class="text-gray-600 h-16">Learn to opening and closing, and connecting data</p>
                    <button class="bg-black text-white px-4 py-2 my-2 mx-auto block rounded shadow">
                        <a href="{{ route('dashboard.topic', ['value' => 7]) }}">
                            Learn Now!
                        </a>
                    </button>
                </div>
                <div class="p-4 rounded shadow" style="background: #E0FEB3;">
                    <h3 class="text-3xl mb-2">OOP Concept</h3>
                    <p class="text-gray-600 h-16">Lean concepts such as objects, inheritance and abstraction.</p>
                    <button class="bg-black text-white px-4 py-2 my-2 mx-auto block rounded shadow">
                        <a href="{{ route('dashboard.topic', ['value' => 8]) }}">
                            Learn Now!
                        </a>
                    </button>
                </div>
                <!-- Repeat for other topics -->
            </div>
        </section>
        <section>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @if(!empty(Session::get('user')->role))
                    @if(count($lessons)>0)
                        @foreach($lessons as $lesson)
                            <div class="p-4 rounded shadow" style="background: #FFDAC2;">
                                <h3 class="text-3xl mb-2">{{$lesson->title}}</h3>
                                <p class="text-gray-600 h-16">
                                    @if($lesson->summary == null)
                                        Learn the basic features of PHP
                                    @else
                                    {{$lesson->summary}}
                                    @endif
                                </p>
                                <button class="bg-black text-white px-4 py-2 my-2 mx-auto block rounded shadow">
                                    <a href="{{ URL('lesson_id/'.$lesson->lessonId) }}">
                                        Learn Now!
                                    </a>
                                </button>
                            </div>
                        @endforeach
                    @endif
                @endif

            </div>
        </section>
        <section id="learn-progress" class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Lesson Progress</h2>


            <div class="max-w-sm w-1/2 bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between mb-3">
                    <div class="flex items-center">
                        <div class="flex justify-center items-center">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Your progress</h5>
                            <svg data-popover-target="chart-info" data-popover-placement="bottom" class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                            </svg>

                            <div data-popover id="chart-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <div class="p-3 space-y-2">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth - Incremental</h3>
                                    <p>Report helps navigate cumulative growth of activities.</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>

                        </div>
                    </div>
                </div>

                @if(!empty(Session::get('user')->role))
                    <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                        <div class="grid grid-cols-3 gap-3 mb-2">
                            <dl class="bg-orange-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt id="to-do" class="w-8 h-8 rounded-full bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1"></dt>
                                <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">To do</dd>
                            </dl>
                            <dl class="bg-teal-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt id="in-progress" class="w-8 h-8 rounded-full bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1"></dt>
                                <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">In progress</dd>
                            </dl>
                            <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt id="done" class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1"></dt>
                                <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Done</dd>
                            </dl>
                        </div>
                        <div id="more-details" class="border-gray-200 border-t dark:border-gray-600 pt-3 mt-3 space-y-2">
                            <dl class="flex items-center justify-between">
                                <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Task completion rate:</dt>
                                <dd id="completion-rate" class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                                    </svg>
                                </dd>
                            </dl>
                            @if (count($progress)>0)
                                @foreach($progress as $prog)
                                    <dl class="flex items-center justify-between">
                                        @if($prog->lesson)
                                            <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">{{$prog->lesson->title}}</dt>
                                            <dd id="t1" class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">{{$prog->percent}}%</dd>
                                        @endif
                                    </dl>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-semibold mb-4">Annoucements</h2>

            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden mb-4 rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/ca1.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/ca2.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/ca3.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Compiler</h2>

            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1">
                @include('ide')
            </div>

        </section>
    </div>

    <script>
        let topicProgress;
        let todo;
        let ongoing;
        let done;
        let isStudent = false;
        let profile;
        getTopicProgress();

        function getTopicProgress() {
            fetch("{{ route('progress.dashboard') }}", {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for Laravel security
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        isStudent = data.isStudent;
                        if (isStudent) {
                            topicProgress = data.result.progress;
                            todo = data.result.todo;
                            ongoing = data.result.ongoing;
                            done = data.result.done;
                            profile = JSON.parse(data.profile);
                        } else {
                            topicProgress = 0;
                            todo = 0;
                            ongoing = 0;
                            done = 0;
                        }


                        setProfile();
                        setProgress();
                    } else {
                        console.error('Error:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function setProfile() {
            guestLogin = document.getElementById('guest-login');
            userProfile = document.getElementById('user-profile');
            userProfileName = document.getElementById('user-profile-name');
            userProfileNumber = document.getElementById('user-profile-number');
            if (!isStudent) {
                userProfile.parentNode.removeChild(userProfile);
            } else {
                userProfileName.textContent = profile.FIRST_NAME + " " + profile.LAST_NAME;
                userProfileNumber.textContent = "Student # " + profile.STUDENT_NUMBER;
                guestLogin.remove();
            }
        }

        function setProgress() {
            completionRateBar = document.getElementById('completion-rate');
            todoBar = document.getElementById('to-do');
            inProgressBar = document.getElementById('in-progress');
            doneBar = document.getElementById('done');
            learnProgress = document.getElementById('learn-progress');


            if (!isStudent) {
                learnProgress.parentNode.removeChild(learnProgress);
            } else {
                todoBar.textContent = todo;
                inProgressBar.textContent = ongoing;
                doneBar.textContent = done;
                completionRateBar.textContent = ((done / 8) * 100) + '%';
                for (var i = 1; i <= 8; i++) {
                    topicBar = document.getElementById('t' + i);
                    topicBar.textContent = topicProgress[i - 1];
                    switch (topicProgress[i - 1]) {
                        case 'Passed':
                            // Handle logic for 'Passed'
                            topicBar.classList.add('dark:bg-green-900', 'dark:text-green-300', 'bg-green-100', 'text-green-800');
                            break;

                        case 'Failed':
                            // Handle logic for 'Failed'
                            topicBar.classList.add('dark:bg-red-900', 'dark:text-red-300', 'bg-red-100', 'text-red-800');
                            break;

                        case 'Not Started':
                            // Handle logic for 'Not Started'
                            console.log('Topic Not Started');
                            break;

                        default:
                            // Handle default case (if needed)
                            console.log('Unknown Progress');
                            break;
                    }
                }
            }
        }
    </script>
</section>
@endsection
