@extends('layouts.admin')
@section('content')
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- ✅ إحصائيات --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-6 rounded shadow text-center">
                    <h3 class="text-lg font-semibold text-gray-700">Total Requests</h3>
                    <p class="text-3xl font-bold text-indigo-600">{{$total}}</p>
                </div>
                <div class="bg-white p-6 rounded shadow text-center">
                    <h3 class="text-lg font-semibold text-gray-700">Approved</h3>
                    <p class="text-3xl font-bold text-green-600">{{$approved}}</p>
                </div>
                <div class="bg-white p-6 rounded shadow text-center">
                    <h3 class="text-lg font-semibold text-gray-700">Pending</h3>
                    <p class="text-3xl font-bold text-yellow-500">{{ $pending }}</p>
                </div>
            </div>

            {{-- ✅ أزرار الوظائف --}}
            <div class="bg-white p-6 rounded shadow text-center">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

                    {{-- ➕ Create Request --}}
                    <a href="{{ route('create') }}"
                       class="flex items-center justify-center gap-3 px-6 py-4 bg-blue-100 hover:bg-blue-200 text-black font-semibold rounded-lg shadow transition duration-300 text-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Create Request</span>
                    </a>

                    {{-- 📄 My Requests --}}
                    <a href="{{ route('myRequests') }}"
                       class="flex items-center justify-center gap-3 px-6 py-4 bg-green-100 hover:bg-green-200 text-black font-semibold rounded-lg shadow transition duration-300 text-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>My Requests</span>
                    </a>

                    {{-- 📋 All Requests (admin only) --}}
                    @if(auth()->user()->employee_type === 'admin')
                        <a href="{{ route('index') }}"
                           class="flex items-center justify-center gap-3 px-6 py-4 bg-purple-100 hover:bg-purple-200 text-black font-semibold rounded-lg shadow transition duration-300 text-lg">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"/>
                            </svg>
                            <span>All Requests</span>
                        </a>
                    @endif

                </div>
            </div>

        </div>
    </div>
    @endsection

