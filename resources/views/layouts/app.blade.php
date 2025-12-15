<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AI Learning Services') - AI Learning</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ai-neon-blue': '#0088ff',
                        'ai-bright-blue': '#00d4ff',
                        'ai-dark-blue': '#0066cc',
                        'ai-dark': '#000000',
                        'ai-darker': '#0a0a0a',
                        'ai-gray': '#1a1a1a',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 20px rgba(0, 136, 255, 0.6)' },
                            '100%': { boxShadow: '0 0 40px rgba(0, 136, 255, 0.9), 0 0 60px rgba(0, 212, 255, 0.7)' },
                        }
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
            background: linear-gradient(135deg, #00d4ff, #0088ff, #0066cc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .neon-border {
            box-shadow: 0 0 20px rgba(0, 136, 255, 0.8), inset 0 0 20px rgba(0, 136, 255, 0.2);
        }
        
        .neon-border-bright {
            box-shadow: 0 0 30px rgba(0, 212, 255, 0.9), inset 0 0 20px rgba(0, 212, 255, 0.3);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-black via-ai-dark to-ai-gray min-h-screen text-white">
    
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-32 h-32 bg-gradient-to-r from-ai-bright-blue to-ai-neon-blue rounded-full opacity-30 blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-48 h-48 bg-gradient-to-r from-ai-neon-blue to-ai-dark-blue rounded-full opacity-25 blur-3xl animate-float" style="animation-delay: 2s;"></div>
    </div>

    <!-- Navigation -->
    @auth
        <nav class="glass-morphism border-b border-ai-neon-blue/20 sticky top-0 z-50 neon-border">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="text-2xl font-bold gradient-text">
                            AI Learning
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden md:flex items-center space-x-6">
                        <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-ai-bright-blue transition-colors">
                            <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                        </a>
                        
                        @if(auth()->user()->role && auth()->user()->role->name === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:text-ai-bright-blue transition-colors">
                                <i class="fas fa-cog mr-2"></i>Admin
                            </a>
                        @endif
                        
                        @if(auth()->user()->role && auth()->user()->role->name === 'guru')
                            <a href="{{ route('guru.dashboard') }}" class="text-gray-300 hover:text-ai-bright-blue transition-colors">
                                <i class="fas fa-graduation-cap mr-2"></i>Guru
                            </a>
                        @endif
                    </div>

                    <!-- User Menu -->
                    <div class="flex items-center space-x-4">
                        <span class="text-ai-bright-blue">
                            <i class="fas fa-user mr-2"></i>{{ auth()->user()->name }}
                        </span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    @endauth

    <!-- Main Content -->
    <main class="relative z-10">
        @yield('content')
    </main>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 neon-border">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 neon-border">
            <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
        </div>
    @endif

    <script>
        // Auto-hide flash messages
        setTimeout(() => {
            const messages = document.querySelectorAll('.fixed.bottom-4.right-4');
            messages.forEach(msg => msg.remove());
        }, 5000);
    </script>
</body>
</html>