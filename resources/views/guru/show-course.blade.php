@extends('layouts.app')

@section('content')
<div class="min-h-screen p-6">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">{{ $product->name }}</h1>
                <p class="text-gray-400">Course details and management</p>
            </div>
            <a href="{{ route('guru.dashboard') }}" 
               class="flex items-center px-4 py-2 bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl text-white transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Dashboard
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Course Info Card -->
            <div class="glass-morphism rounded-2xl border border-white/10 overflow-hidden">
                @if($product->image_url)
                    <div class="w-full h-48 bg-cover bg-center" style="background-image: url('{{ $product->image_url }}')"></div>
                @else
                    <div class="w-full h-48 bg-gradient-to-r from-indigo-500 to-purple-500 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                @endif
                
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-500/20 text-purple-400 border border-purple-500/30">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                            </svg>
                            {{ ucfirst($product->type) }}
                        </span>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-white">${{ number_format($product->price, 2) }}</p>
                        </div>
                    </div>
                    
                    <div class="prose prose-invert max-w-none">
                        <p class="text-gray-300 leading-relaxed">{{ $product->description }}</p>
                    </div>

                    @if($product->start_date)
                        <div class="mt-4 p-4 bg-white/5 rounded-lg">
                            <div class="flex items-center text-sm">
                                <svg class="w-4 h-4 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-gray-400">Start Date:</span>
                                <span class="text-white ml-2">{{ $product->start_date->format('F d, Y - H:i') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Enrolled Students -->
            <div class="glass-morphism rounded-2xl border border-white/10 p-6">
                <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    Enrolled Students ({{ $enrolledStudents->count() }})
                </h3>
                
                @if($enrolledStudents->count() > 0)
                    <div class="space-y-3">
                        @foreach($enrolledStudents as $student)
                            <div class="flex items-center justify-between p-3 bg-white/5 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-white text-sm font-semibold">{{ substr($student->name, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <p class="text-white font-medium">{{ $student->name }}</p>
                                        <p class="text-gray-400 text-sm">{{ $student->email }}</p>
                                    </div>
                                </div>
                                <span class="text-xs text-green-400">Enrolled</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <p class="text-gray-400">No students enrolled yet</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Zoom Link Management -->
            <div class="glass-morphism rounded-2xl border border-white/10 p-6">
                <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                    Zoom Meeting Link
                </h3>
                
                @if(Auth::user()->role->name === 'guru' && $product->user_id === Auth::id())
                    <form action="{{ route('guru.update', $product->id) }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Meeting URL</label>
                            <input type="url" 
                                   name="zoom_link" 
                                   value="{{ $product->zoom_link ?? '' }}"
                                   placeholder="https://zoom.us/j/..."
                                   class="w-full px-3 py-2 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-400/50 transition-all">
                        </div>
                        <button type="submit" class="w-full py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-medium transition-colors">
                            Update Zoom Link
                        </button>
                    </form>
                @else
                    @if($product->zoom_link)
                        <div class="space-y-3">
                            <p class="text-sm text-gray-400">Meeting Link:</p>
                            <a href="{{ $product->zoom_link }}" 
                               target="_blank"
                               class="block p-3 bg-blue-500/20 border border-blue-500/30 rounded-lg text-blue-400 hover:bg-blue-500/30 transition-all text-center">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                Join Zoom Meeting
                            </a>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <svg class="w-8 h-8 text-gray-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-400 text-sm">No meeting link available</p>
                        </div>
                    @endif
                @endif
            </div>

            <!-- Course Settings -->
            @if(Auth::user()->role->name === 'guru' && $product->user_id === Auth::id())
                <div class="glass-morphism rounded-2xl border border-white/10 p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('guru.edit', $product->id) }}" 
                           class="w-full flex items-center px-4 py-2 bg-yellow-500/20 hover:bg-yellow-500/30 border border-yellow-500/30 rounded-lg text-yellow-400 transition-all">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Course
                        </a>
                        
                        <form action="{{ route('guru.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="w-full flex items-center px-4 py-2 bg-red-500/20 hover:bg-red-500/30 border border-red-500/30 rounded-lg text-red-400 transition-all">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete Course
                            </button>
                        </form>
                    </div>
                </div>
            @endif

            <!-- Course Status -->
            <div class="glass-morphism rounded-2xl border border-white/10 p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Course Status</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400">Status</span>
                        @if($product->is_active)
                            <span class="px-2 py-1 bg-green-500/20 text-green-400 rounded text-xs">Active</span>
                        @else
                            <span class="px-2 py-1 bg-red-500/20 text-red-400 rounded text-xs">Inactive</span>
                        @endif
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400">Created</span>
                        <span class="text-white text-sm">{{ $product->created_at->format('M d, Y') }}</span>
                    </div>
                    @if($product->updated_at->gt($product->created_at))
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Last Updated</span>
                            <span class="text-white text-sm">{{ $product->updated_at->format('M d, Y') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection