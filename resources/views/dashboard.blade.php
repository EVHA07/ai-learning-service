<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AI Learning Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ai-neon-purple': '#9333ea',
                        'ai-neon-blue': '#3b82f6',
                        'ai-dark': '#0f172a',
                        'ai-darker': '#020617',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 20px rgba(147, 51, 234, 0.5)' },
                            '100%': { boxShadow: '0 0 40px rgba(147, 51, 234, 0.8), 0 0 60px rgba(59, 130, 246, 0.6)' },
                        }
                    },
                    backdropBlur: {
                        'xs': '2px',
                    }
                }
            }
        }
    </script>
    <style>
        .glass-morphism {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #9333ea, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .neon-border {
            box-shadow: 0 0 20px rgba(147, 51, 234, 0.5), inset 0 0 20px rgba(147, 51, 234, 0.1);
        }
        
        .card-3d {
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }
        
        .card-3d:hover {
            transform: rotateY(5deg) rotateX(-5deg) scale(1.05);
        }
        
        .class-detail-card {
            transition: all 0.3s ease;
        }
        
        .class-detail-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(147, 51, 234, 0.3);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-ai-darker via-ai-dark to-gray-900 min-h-screen text-white">
    
    <!-- Success Notification -->
    <div x-data="notification" 
         x-show="show" 
         x-init="$watch('show', value => value && setTimeout(() => show = false, 5000))"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-full"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-full"
         class="fixed top-4 right-4 z-50 glass-morphism rounded-lg p-4 max-w-sm neon-border">
        <div class="flex items-center">
            <svg class="w-6 h-6 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span x-text="message"></span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="glass-morphism fixed w-full top-0 z-40 px-6 py-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold gradient-text">AI Learning</div>
            <div class="flex items-center gap-6">
                <span class="text-gray-300">Welcome back, {{ $user->name }}!</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-6 py-2 glass-morphism rounded-full hover:bg-red-500/20 transition-all border border-red-500/50">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-6 pt-24 pb-12">
        
        <!-- Dashboard Header -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold mb-4">
                <span class="gradient-text">Your Learning Dashboard</span>
            </h1>
            <p class="text-xl text-gray-400">Continue your AI learning journey</p>
        </div>

        <!-- Stats Overview -->
        <div class="grid md:grid-cols-2 gap-6 mb-12">
            <div class="glass-morphism rounded-2xl p-6 neon-border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 mb-2">Courses Enrolled</p>
                        <p class="text-3xl font-bold text-ai-neon-blue">{{ $myLearning->count() }}</p>
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
                        <p class="text-gray-400 mb-2">Total Investment</p>
                        <p class="text-3xl font-bold text-green-400">${{ number_format($myLearning->sum('price'), 2) }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Learning Section -->
        @if($myLearning->count() > 0)
        <section class="mb-12">
            <h2 class="text-3xl font-bold mb-6 gradient-text">My Learning</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($myLearning as $product)
                    <div class="glass-morphism rounded-2xl p-6 card-3d neon-border">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full text-sm font-semibold">
                                Course
                            </span>
                            <span class="text-green-400 font-bold">${{ number_format($product->price, 2) }}</span>
                        </div>
                        <h3 class="text-xl font-bold mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-400 mb-4 text-sm">{{ Str::limit($product->description, 80) }}</p>
                        
                        <!-- Quick Info Preview -->
                        <div class="mb-4 space-y-2">
                            @if($product->start_date)
                                <div class="flex items-center text-xs text-gray-400">
                                    <svg class="w-3 h-3 mr-1 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $product->start_date->format('M d, Y - h:i A') }}
                                </div>
                            @endif
                            @if($product->zoom_link)
                                <div class="flex items-center text-xs text-green-400">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                    </svg>
                                    Zoom link available
                                </div>
                            @else
                                <div class="flex items-center text-xs text-yellow-400">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                    Zoom link pending
                                </div>
                            @endif
                        </div>
                        
                        <!-- Enter Class Button -->
                        <a href="{{ route('class.detail', $product->id) }}" class="w-full py-2 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full font-semibold hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-green-500/50 flex items-center justify-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                            Enter Class
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- Available Courses Section -->
        <section>
            <h2 class="text-3xl font-bold mb-6 gradient-text">Available Courses</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($courses as $course)
                    @include('components.product-card', ['product' => $course])
                @endforeach
            </div>
        </section>

    </main>



    @if(session('success'))
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('notification', {
                show: true,
                message: "{{ session('success') }}"
            });
        });
    </script>
    @endif

    <script>
        // Auto-hide notifications after 5 seconds
        setTimeout(() => {
            const notification = Alpine.store('notification');
            if (notification && notification.show) {
                notification.show = false;
            }
        }, 5000);
    </script>

</body>
</html>