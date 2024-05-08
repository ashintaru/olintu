@extends('layouts.app')
@section('title', 'OLINTU - Your Records')
@section('content')<!-- resources/views/records.php -->
<!-- Navigation -->
<nav class="p-4 text-white" style="background-color: #2E6D32;">

    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold">Progress </h1>
    </div>
</nav>
<section class="mb-8">
    <div class="container px-5 py-20 mx-auto  items-center text-center">
        <button type="submit" style="float: left;" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-green-700 hover:bg-green-800 dark:focus:ring-primary-800">
            <a href="{{route('student.dashboard')}}" >
                Back
            </a>
        </button>
        <div class="flex flex-wrap w-full mb-10 flex-col">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Progress Management:</h1>
        </div>
        
        <div class="relative overflow-x-auto mb-10">
            @if (session('successdelete'))
            <span class="text-sm text-red-500" >
                {{ session('successdelete') }}
            </span>
            @endif
            <table class="w-full text-sm text-left text-center rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Lesson Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User-Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Full Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Studen Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($progress))
                        @foreach($progress as $student) 
                            <tr class=" border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$student->lesson->title}}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$student->user->USERNAME}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$student->user->FIRST_NAME.' '.$student->MIDDLE_NAME.' '.$student->LAST_NAME}} </b>
                                </td>
                                <td class="px-6 py-4">
                                    {{$student->user->STUDENT_NUMBER}} </b>
                                </td>
                                <td class="px-6 py-4 inline-flex">
                                    <svg data-modal-target="delete-modal-{{$student->id}}" data-modal-toggle="delete-modal-{{$student->id}}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                    <svg data-modal-target="reset-modal-{{$student->STUDENT_ID}}" data-modal-toggle="reset-modal-{{$student->STUDENT_ID}}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                                    </svg>                                          
                                                                        
                                    <!-- delete modal -->
                                    <div id="delete-modal-{{$student->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex bg-red-700 items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-white dark:text-white">
                                                        Delete
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal-{{$student->id}}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:p-5 space-y-4">
                                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        You want To delete this quiz progress <strong>{{$student->USERNAME}}</strong> 
                                                    </p>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                    <form method="POST" action="{{URL('delete_progress/'.$student->id)}}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="Submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Yes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </td>
                            </tr>
                        @endforeach

                    @endif
                </tbody>
            </table>
        </div>
        
    </div>
</section>

