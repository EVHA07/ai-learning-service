@extends('layouts.app')

@section('title', $product->name . ' - Course Preview')

@section('content')
<div class="min-h-screen p-6">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">{{ $product->name }}</h1>
                <p class="text-gray-400">Course preview and information</p>
            </div>
            <a href="{{ route('dashboard') }}" 
               class="flex items-center px-4 py-2 bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl text-white transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Dashboard
            </a>
        </div>
    </div>

    <div class="max-w-4xl mx-auto">
        <div class="glass-morphism rounded-2xl p-8 border border-white/10">
            <!-- Course Header -->
            <div class="flex items-center gap-6 mb-8">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h2 class="text-2xl font-bold text-white mb-2">{{ $product->name }}</h2>
                    <div class="flex items-center gap-4">
                        <span class="px-3 py-1 bg-blue-500/20 border border-blue-500/50 rounded-full text-sm font-semibold text-blue-400">
                            Course
                        </span>
                        <span class="text-green-400 font-bold text-lg">${{ number_format($product->price, 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- About Section -->
            <div class="mb-8">
                <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    About This Course
                </h3>
                <div class="bg-white/5 rounded-xl p-6 border border-white/10">
                    <p class="text-gray-300 leading-relaxed">{{ $product->description }}</p>
                </div>
            </div>

            <!-- Schedule Section -->
            @if($product->start_date)
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Class Schedule
                    </h3>
                    <div class="bg-white/5 rounded-xl p-6 border border-white/10">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-semibold">{{ $product->start_date->format('l, F d, Y') }}</p>
                                <p class="text-gray-400">{{ $product->start_date->format('h:i A') }} (Your Timezone)</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Instructor Section -->
            <div class="mb-8">
                <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Course Instructor
                </h3>
                <div class="bg-white/5 rounded-xl p-6 border border-white/10">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-blue-600 rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold text-xl">{{ substr($product->user->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <p class="text-white font-semibold text-lg">{{ $product->user->name }}</p>
                            <p class="text-gray-400">Professional Instructor</p>
                            <div class="flex items-center mt-2 text-sm text-gray-400">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                {{ $product->user->email }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Information -->
            <div class="mb-8">
                <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Course Information
                </h3>
                <div class="bg-white/5 rounded-xl p-6 border border-white/10">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-gray-400 mb-2">Course Type</p>
                            <p class="text-white font-semibold">Live Online Course</p>
                        </div>
                        <div>
                            <p class="text-gray-400 mb-2">Price</p>
                            <p class="text-green-400 font-bold">${{ number_format($product->price, 2) }}</p>
                        </div>
                        @if($product->start_date)
                            <div>
                                <p class="text-gray-400 mb-2">Start Date</p>
                                <p class="text-white font-semibold">{{ $product->start_date->format('M d, Y') }}</p>
                            </div>
                        @endif
                        <div>
                            <p class="text-gray-400 mb-2">Status</p>
                            <span class="px-3 py-1 bg-green-500/20 border border-green-500/50 rounded-full text-sm font-semibold text-green-400">
                                Available
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between">
                <a href="{{ route('dashboard') }}" 
                   class="px-6 py-3 bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl text-gray-300 transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Courses
                </a>
                <form action="{{ route('purchase', $product->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" 
                            class="px-8 py-3 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full font-semibold hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/50 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Enroll Now
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection