@extends('layouts.app')

@section('title', $product->name . ' - Class Detail')

@section('content')
<div class="min-h-screen p-6">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">{{ $product->name }}</h1>
                <p class="text-gray-400">Class details and learning materials</p>
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

    <div class="max-w-6xl mx-auto">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Course Header -->
                <div class="glass-morphism rounded-2xl p-8 border border-white/10">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-white">{{ $product->name }}</h2>
                                <p class="text-gray-400">Course</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400">Enrolled</p>
                            <p class="text-lg font-semibold text-green-400">Active</p>
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

                    <!-- Zoom Link Section -->
                    @if($product->zoom_link)
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                Virtual Classroom
                            </h3>
                            <div class="bg-gradient-to-r from-purple-500/10 to-blue-500/10 rounded-xl p-6 border border-purple-500/30">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="text-white font-semibold mb-2">Join Live Session</p>
                                        <p class="text-gray-400 text-sm mb-4">{{ $product->zoom_link }}</p>
                                        <div class="flex items-center gap-4">
                                            <a href="{{ $product->zoom_link }}" target="_blank" 
                                               class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-600 rounded-full font-semibold hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-purple-500/50 flex items-center">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                </svg>
                                                Enter Class
                                            </a>
                                            <button onclick="copyToClipboard('{{ $product->zoom_link }}')" 
                                                    class="px-4 py-3 bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl transition-all duration-300 flex items-center">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                Virtual Classroom
                            </h3>
                            <div class="bg-yellow-500/10 border border-yellow-500/30 rounded-xl p-6">
                                <div class="flex items-center">
                                    <svg class="w-12 h-12 text-yellow-400 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-white font-semibold mb-1">Class Link Coming Soon</p>
                                        <p class="text-gray-400 text-sm">The instructor will provide the Zoom link closer to the class date.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Course Info Card -->
                <div class="glass-morphism rounded-2xl p-6 border border-white/10">
                    <h3 class="text-lg font-bold text-white mb-4">Course Information</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Price</span>
                            <span class="text-green-400 font-bold">${{ number_format($product->price, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Status</span>
                            <span class="px-3 py-1 bg-green-500/20 border border-green-500/50 rounded-full text-sm font-semibold text-green-400">
                                Active
                            </span>
                        </div>
                        @if($product->start_date)
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Start Date</span>
                                <span class="text-white font-semibold">{{ $product->start_date->format('M d, Y') }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Instructor Info -->
                <div class="glass-morphism rounded-2xl p-6 border border-white/10">
                    <h3 class="text-lg font-bold text-white mb-4">Instructor</h3>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mr-3">
                            <span class="text-white font-bold text-lg">{{ substr($product->user->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <p class="text-white font-semibold">{{ $product->user->name }}</p>
                            <p class="text-gray-400 text-sm">Course Instructor</p>
                            <div class="flex items-center mt-1 text-xs text-gray-400">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                {{ $product->user->email }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Status</span>
                            <span class="px-3 py-1 bg-green-500/20 border border-green-500/50 rounded-full text-sm font-semibold text-green-400">
                                Active
                            </span>
                        </div>
                        @if($product->start_date)
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Start Date</span>
                                <span class="text-white font-semibold">{{ $product->start_date->format('M d, Y') }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Instructor Info -->
                <div class="glass-morphism rounded-2xl p-6 border border-white/10">
                    <h3 class="text-lg font-bold text-white mb-4">Instructor</h3>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mr-3">
                            <span class="text-white font-bold text-lg">{{ substr($product->user->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <p class="text-white font-semibold">{{ $product->user->name }}</p>
                            <p class="text-gray-400 text-sm">Course Instructor</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show success message
        const button = event.currentTarget;
        const originalHTML = button.innerHTML;
        button.innerHTML = `
            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        `;
        button.classList.add('bg-green-500/20');
        
        setTimeout(() => {
            button.innerHTML = originalHTML;
            button.classList.remove('bg-green-500/20');
        }, 2000);
    });
}
</script>
@endsection