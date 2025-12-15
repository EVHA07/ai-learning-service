<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AI Learning Services</title>
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
                <span class="text-gray-300">Welcome, {{ Auth::user()->name }}!</span>
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
        
        <!-- Dashboard Header -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold mb-4">
                <span class="gradient-text">Admin Dashboard</span>
            </h1>
            <p class="text-xl text-gray-400">Manage the entire AI Learning platform</p>
        </div>

        <!-- Stats Overview -->
        <div class="grid md:grid-cols-4 gap-6 mb-12">
            <div class="glass-morphism rounded-2xl p-6 neon-border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 mb-2">Total Users</p>
                        <p class="text-3xl font-bold text-ai-neon-blue">{{ $stats['total_users'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-ai-neon-blue to-ai-neon-purple rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="glass-morphism rounded-2xl p-6 neon-border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 mb-2">Total Products</p>
                        <p class="text-3xl font-bold text-ai-neon-purple">{{ $stats['total_products'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-ai-neon-purple to-ai-neon-blue rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="glass-morphism rounded-2xl p-6 neon-border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 mb-2">Total Revenue</p>
                        <p class="text-3xl font-bold text-green-400">${{ number_format($stats['total_revenue'], 2) }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="glass-morphism rounded-2xl p-6 neon-border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 mb-2">Transactions</p>
                        <p class="text-3xl font-bold text-yellow-400">{{ $stats['total_transactions'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Distribution -->
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="glass-morphism rounded-2xl p-6 neon-border">
                <h3 class="text-xl font-bold mb-4 text-ai-neon-blue">Administrators</h3>
                <p class="text-3xl font-bold">{{ $stats['admin_users'] }}</p>
                <p class="text-gray-400 text-sm">Full system access</p>
            </div>
            
            <div class="glass-morphism rounded-2xl p-6 neon-border">
                <h3 class="text-xl font-bold mb-4 text-ai-neon-purple">Teachers</h3>
                <p class="text-3xl font-bold">{{ $stats['guru_users'] }}</p>
                <p class="text-gray-400 text-sm">Can manage courses</p>
            </div>
            
            <div class="glass-morphism rounded-2xl p-6 neon-border">
                <h3 class="text-xl font-bold mb-4 text-green-400">Students</h3>
                <p class="text-3xl font-bold">{{ $stats['murid_users'] }}</p>
                <p class="text-gray-400 text-sm">Can enroll in courses</p>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <a href="{{ route('admin.users') }}" class="glass-morphism rounded-2xl p-6 block card-3d neon-border">
                <h3 class="text-xl font-bold mb-2">Manage Users</h3>
                <p class="text-gray-400">View and manage all user accounts</p>
            </a>
            
            <a href="{{ route('admin.products') }}" class="glass-morphism rounded-2xl p-6 block card-3d neon-border">
                <h3 class="text-xl font-bold mb-2">Manage Products</h3>
                <p class="text-gray-400">Create and edit courses & AI agents</p>
            </a>
            
            <a href="{{ route('admin.transactions') }}" class="glass-morphism rounded-2xl p-6 block card-3d neon-border">
                <h3 class="text-xl font-bold mb-2">View Transactions</h3>
                <p class="text-gray-400">Monitor all financial transactions</p>
            </a>
        </div>

        <!-- Recent Transactions -->
        @if($recentTransactions->count() > 0)
        <section class="mb-12">
            <h2 class="text-3xl font-bold mb-6 gradient-text">Recent Transactions</h2>
            <div class="glass-morphism rounded-2xl overflow-hidden neon-border">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-white/5">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">User</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Product</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @foreach($recentTransactions as $transaction)
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${{ number_format($transaction->amount, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full @if($transaction->status == 'paid') bg-green-500/20 text-green-400 @elseif($transaction->status == 'pending') bg-yellow-500/20 text-yellow-400 @else bg-red-500/20 text-red-400 @endif">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-400">{{ $transaction->created_at->format('M d, Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @endif

    </main>

<style>
.card-3d {
    transform-style: preserve-3d;
    transition: transform 0.6s;
}

.card-3d:hover {
    transform: rotateY(5deg) rotateX(-5deg) scale(1.05);
}
</style>

</body>
</html>