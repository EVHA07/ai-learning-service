<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management - AI Learning Admin</title>
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
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold mb-4">
                <span class="gradient-text">Users Management</span>
            </h1>
            <p class="text-gray-400 text-lg">Manage user accounts and permissions</p>
        </div>

        <!-- Quick Actions -->
        <div class="flex gap-4 mb-8 justify-center">
            <a href="{{ route('admin.users.create') }}" class="px-8 py-3 bg-gradient-to-r from-ai-neon-purple to-ai-neon-blue rounded-full font-semibold hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-purple-500/50">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m0 0l7 7m0 0l7 7m-7 7"></path>
                </svg>
                Create New User
            </a>
        </div>

        <!-- Users Table -->
        <div class="glass-morphism rounded-2xl overflow-hidden neon-border">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-white/5">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Created</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        @foreach($users as $user)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($user->role)
                                    <span class="px-3 py-1 text-xs rounded-full @if($user->role->name == 'admin') bg-red-500/20 text-red-400 @elseif($user->role->name == 'guru') bg-blue-500/20 text-blue-400 @else bg-green-500/20 text-green-400 @endif">
                                        {{ $user->role->display_name }}
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs rounded-full bg-gray-500/20 text-gray-400">
                                        No Role
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-400">{{ $user->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="px-3 py-1 bg-blue-500/20 border border-blue-500/50 rounded text-center hover:bg-blue-600/30 transition-all">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="px-3 py-1 bg-red-500/20 border border-red-500/50 rounded text-center hover:bg-red-600/30 transition-all">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $users->links() }}
        </div>

    </main>

</body>
</html>