<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - AI Learning Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    </style>
</head>
<body class="bg-gradient-to-br from-ai-darker via-ai-dark to-gray-900 min-h-screen text-white">
    
    <!-- Navigation -->
    <nav class="glass-morphism fixed w-full top-0 z-40 px-6 py-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold gradient-text">AI Learning Admin</div>
            <div class="flex items-center gap-6">
                <span class="text-gray-300">Welcome back, {{ Auth::user()->name }}!</span>
                <span class="px-3 py-1 bg-red-500/20 border border-red-500/50 rounded-full text-sm">Administrator</span>
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
        
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('admin.users.index') }}" class="text-gray-400 hover:text-white transition-colors">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7 7m0 0l7 7m-7 7"></path>
                </svg>
                Back to Users
            </a>
            <h1 class="text-3xl font-bold gradient-text">Edit User</h1>
        </div>

        <!-- Edit Form -->
        <div class="max-w-2xl mx-auto">
            <div class="glass-morphism rounded-2xl p-8 neon-border">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    
                    <!-- Name Field -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                            Full Name
                        </label>
                        <input 
                            id="name" 
                            name="name" 
                            type="text" 
                            autocomplete="name" 
                            required
                            value="{{ old('name') }}"
                            class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-ai-neon-purple focus:ring-2 focus:ring-ai-neon-purple/50 transition-all"
                            placeholder="Enter full name"
                        >
                        @error('name')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                            Email Address
                        </label>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            autocomplete="email" 
                            required
                            value="{{ old('email') }}"
                            class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-ai-neon-purple focus:ring-2 focus:ring-ai-neon-purple/50 transition-all"
                            placeholder="user@example.com"
                        >
                        @error('email')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                            Password (leave empty to keep current)
                        </label>
                        <input 
                            id="password" 
                            name="password" 
                            type="password" 
                            autocomplete="new-password"
                            class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-ai-neon-purple focus:ring-2 focus:ring-ai-neon-purple/50 transition-all"
                            placeholder="Enter new password"
                        >
                        @error('password')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Role Field -->
                    <div class="mb-6">
                        <label for="role_id" class="block text-sm font-medium text-gray-300 mb-2">
                            User Role
                        </label>
                        <select 
                            id="role_id" 
                            name="role_id" 
                            required
                            class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-ai-neon-purple focus:ring-2 focus:ring-ai-neon-purple/50 transition-all"
                        >
                            @if($user->role)
                                <option value="{{ $user->role_id }}" selected>{{ $user->role->display_name }}</option>
                            @else
                                <option value="" selected>No Role</option>
                            @endif
                            @foreach($roles as $role)
                                @if($role->id != $user->role_id)
                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('role_id')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex gap-4">
                        <a href="{{ route('admin.users.index') }}" class="flex-1 px-6 py-3 bg-gray-500/20 border border-gray-500/50 rounded-full text-center font-semibold hover:bg-gray-600/30 transition-all">
                            Cancel
                        </a>
                        <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-ai-neon-purple to-ai-neon-blue rounded-full text-center font-semibold hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-purple-500/50">
                            Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </main>

</body>
</html>