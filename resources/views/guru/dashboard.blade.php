@extends('layouts.app')

@section('title', 'Guru Dashboard')

@section('content')
<div class="min-h-screen p-6">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Teacher Dashboard</h1>
                <p class="text-gray-400">Manage your courses and track student progress</p>
            </div>
            <div class="flex items-center gap-4">
                <span class="px-3 py-1 bg-blue-500/20 border border-blue-500/50 rounded-full text-sm">Teacher</span>
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        


        <!-- Stats Overview -->
        <div class="grid md:grid-cols-4 gap-6 mb-12">
            <div class="glass-morphism rounded-2xl p-6 neon-border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 mb-2">Total Courses</p>
                        <p class="text-3xl font-bold text-ai-neon-blue">{{ $stats['total_courses'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-ai-neon-blue to-ai-neon-purple rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="glass-morphism rounded-2xl p-6 neon-border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 mb-2">Active Courses</p>
                        <p class="text-3xl font-bold text-green-400">{{ $stats['active_courses'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="glass-morphism rounded-2xl p-6 neon-border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 mb-2">Total Students</p>
                        <p class="text-3xl font-bold text-ai-neon-purple">{{ $stats['total_students'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-ai-neon-purple to-ai-neon-blue rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="glass-morphism rounded-2xl p-6 neon-border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 mb-2">Total Revenue</p>
                        <p class="text-3xl font-bold text-yellow-400">${{ number_format($stats['total_revenue'], 2) }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="flex gap-6 mb-12">
            <a href="{{ route('guru.create') }}" class="px-8 py-3 bg-gradient-to-r from-ai-neon-purple to-ai-neon-blue rounded-full font-semibold hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-purple-500/50">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Create New Course
            </a>
        </div>

        <!-- My Courses -->
        <section>
            <h2 class="text-3xl font-bold mb-6 gradient-text">My Courses</h2>
            @if($guruProducts->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($guruProducts as $product)
                        <div class="glass-morphism rounded-2xl p-6 card-3d neon-border">
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 bg-gradient-to-r from-ai-neon-blue to-ai-neon-purple rounded-full text-sm font-semibold">
                                    {{ ucfirst($product->type) }}
                                </span>
                                <span class="text-ai-neon-blue font-bold text-lg">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-400 mb-4 text-sm">{{ Str::limit($product->description, 100) }}</p>
                            <div class="flex justify-between items-center mt-4">
                                <a href="{{ route('guru.show', $product->id) }}" class="px-4 py-2 bg-blue-500/20 hover:bg-blue-500/30 border border-blue-500/50 rounded-lg text-center font-semibold transition-all flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Buka
                                </a>
                                <div class="flex gap-2">
                                    <a href="{{ route('guru.edit', $product->id) }}" class="p-2 bg-yellow-500/20 hover:bg-yellow-500/30 border border-yellow-500/50 rounded-lg transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('guru.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="p-2 bg-red-500/20 hover:bg-red-500/30 border border-red-500/50 rounded-lg transition-all">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="glass-morphism rounded-2xl p-12 text-center neon-border">
                    <p class="text-gray-400 text-lg mb-6">You haven't created any courses yet.</p>
                    <a href="{{ route('guru.create') }}" class="px-8 py-3 bg-gradient-to-r from-ai-neon-purple to-ai-neon-blue rounded-full font-semibold hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-purple-500/50">
                        Create Your First Course
                    </a>
                </div>
            @endif
        </section>

    </div>
</div>

<style>
.card-3d {
    transform-style: preserve-3d;
    transition: transform 0.6s;
}

.card-3d:hover {
    transform: rotateY(5deg) rotateX(-5deg) scale(1.05);
}
</style>
@endsection