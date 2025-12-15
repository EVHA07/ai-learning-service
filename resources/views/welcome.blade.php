<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Learning Services - Future of Education</title>
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
        
        .hero-3d {
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        
        .floating-card {
            animation: float 6s ease-in-out infinite;
        }
        
        .neon-border {
            box-shadow: 0 0 20px rgba(147, 51, 234, 0.5), inset 0 0 20px rgba(147, 51, 234, 0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-ai-darker via-ai-dark to-gray-900 min-h-screen text-white overflow-x-hidden">
    
    <!-- Navigation -->
    <nav class="glass-morphism fixed w-full top-0 z-50 px-6 py-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold gradient-text">AI Learning</div>
            <div class="flex gap-6">
                <a href="#features" class="hover:text-ai-neon-purple transition-colors">Features</a>
                <a href="#benefits" class="hover:text-ai-neon-purple transition-colors">Benefits</a>
                <a href="{{ route('login') }}" class="px-6 py-2 bg-gradient-to-r from-ai-neon-purple to-ai-neon-blue rounded-full hover:scale-105 transition-transform">Login</a>
                <a href="{{ route('register') }}" class="px-6 py-2 glass-morphism rounded-full hover:bg-white/10 transition-all">Register</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-3d min-h-screen flex items-center justify-center relative pt-20">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-600/10 to-blue-600/10 animate-pulse-slow"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center">
                <!-- 3D Floating Elements -->
                <div class="floating-card mb-8 inline-block">
                    <div class="glass-morphism rounded-3xl p-8 neon-border">
                        <h1 class="text-6xl md:text-8xl font-bold mb-6">
                            <span class="gradient-text">AI Learning</span>
                        </h1>
                        <p class="text-2xl md:text-3xl text-gray-300 mb-8">
                            Transform Your Future with <span class="text-ai-neon-blue">Artificial Intelligence</span>
                        </p>
                    </div>
                </div>
                
                <p class="text-xl text-gray-400 mb-12 max-w-3xl mx-auto">
                    Experience the future of education with cutting-edge AI courses and intelligent learning agents. 
                    Master tomorrow's technology today.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="{{ route('register') }}" class="px-12 py-4 bg-gradient-to-r from-ai-neon-purple to-ai-neon-blue rounded-full text-xl font-semibold hover:scale-105 transition-all duration-300 hover:shadow-2xl hover:shadow-purple-500/50">
                        Start Learning Now
                    </a>
                    <a href="#features" class="px-12 py-4 glass-morphism rounded-full text-xl font-semibold hover:bg-white/10 transition-all duration-300 border border-white/20">
                        Explore Features
                    </a>
                </div>
            </div>
        </div>
        
        <!-- 3D Background Elements -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-gradient-to-r from-ai-neon-purple to-ai-neon-blue rounded-full opacity-20 blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-48 h-48 bg-gradient-to-r from-ai-neon-blue to-ai-neon-purple rounded-full opacity-20 blur-3xl animate-float" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-ai-neon-purple rounded-full opacity-30 blur-2xl animate-pulse"></div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 relative">
        <div class="container mx-auto px-6">
            <h2 class="text-5xl font-bold text-center mb-16">
                <span class="gradient-text">Why Choose AI Learning?</span>
            </h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass-morphism rounded-2xl p-8 hover:scale-105 transition-transform duration-300 neon-border">
                    <div class="w-16 h-16 bg-gradient-to-r from-ai-neon-purple to-ai-neon-blue rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-ai-neon-blue">Expert-Led Courses</h3>
                    <p class="text-gray-400">Learn from industry experts and AI researchers with cutting-edge curriculum designed for the future.</p>
                </div>
                
                <div class="glass-morphism rounded-2xl p-8 hover:scale-105 transition-transform duration-300 neon-border">
                    <div class="w-16 h-16 bg-gradient-to-r from-ai-neon-purple to-ai-neon-blue rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-ai-neon-purple">AI Learning Agents</h3>
                    <p class="text-gray-400">Personalized AI tutors that adapt to your learning style and provide real-time feedback.</p>
                </div>
                
                <div class="glass-morphism rounded-2xl p-8 hover:scale-105 transition-transform duration-300 neon-border">
                    <div class="w-16 h-16 bg-gradient-to-r from-ai-neon-purple to-ai-neon-blue rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-ai-neon-blue">Hands-On Projects</h3>
                    <p class="text-gray-400">Build real-world AI applications and projects that showcase your skills to employers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="py-20 relative">
        <div class="container mx-auto px-6">
            <h2 class="text-5xl font-bold text-center mb-16">
                <span class="gradient-text">Benefits of AI Learning</span>
            </h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Career Growth -->
                <div class="glass-morphism rounded-2xl p-8 hover:scale-105 transition-transform duration-300 neon-border">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 14a6 6 0 0 1 6-6 6 6 0 0 1-6 6 6 6 0 0 1-6-6 6 6 0 0 1 6-6z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-green-400">Career Growth</h3>
                    <p class="text-gray-300 mb-4">Advance your career with in-demand AI skills and certifications recognized by top tech companies.</p>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li class="flex items-start"><span class="text-green-400 mr-2 mt-1">•</span> Industry-recognized certificates</li>
                        <li class="flex items-start"><span class="text-green-400 mr-2 mt-1">•</span> Job-ready portfolio projects</li>
                        <li class="flex items-start"><span class="text-green-400 mr-2 mt-1">•</span> Networking opportunities</li>
                    </ul>
                </div>

                <!-- Flexible Learning -->
                <div class="glass-morphism rounded-2xl p-8 hover:scale-105 transition-transform duration-300 neon-border">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-blue-400">Flexible Learning</h3>
                    <p class="text-gray-300 mb-4">Learn at your own pace with 24/7 access to course materials and AI-powered personalized guidance.</p>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li class="flex items-start"><span class="text-blue-400 mr-2 mt-1">•</span> Self-paced learning paths</li>
                        <li class="flex items-start"><span class="text-blue-400 mr-2 mt-1">•</span> Mobile-friendly access</li>
                        <li class="flex items-start"><span class="text-blue-400 mr-2 mt-1">•</span> Lifetime course access</li>
                    </ul>
                </div>

                <!-- Expert Support -->
                <div class="glass-morphism rounded-2xl p-8 hover:scale-105 transition-transform duration-300 neon-border">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-purple-400">Expert Support</h3>
                    <p class="text-gray-300 mb-4">Get guidance from industry experts and AI tutors who are committed to your success.</p>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li class="flex items-start"><span class="text-purple-400 mr-2 mt-1">•</span> Live instructor Q&A sessions</li>
                        <li class="flex items-start"><span class="text-purple-400 mr-2 mt-1">•</span> 24/7 AI tutor assistance</li>
                        <li class="flex items-start"><span class="text-purple-400 mr-2 mt-1">•</span> Peer learning community</li>
                    </ul>
                </div>

                <!-- Cutting-Edge Tech -->
                <div class="glass-morphism rounded-2xl p-8 hover:scale-105 transition-transform duration-300 neon-border">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-600 rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-orange-400">Cutting-Edge Tech</h3>
                    <p class="text-gray-300 mb-4">Master the latest AI technologies and tools used by leading tech companies worldwide.</p>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li class="flex items-start"><span class="text-orange-400 mr-2 mt-1">•</span> Latest AI frameworks</li>
                        <li class="flex items-start"><span class="text-orange-400 mr-2 mt-1">•</span> Hands-on lab environments</li>
                        <li class="flex items-start"><span class="text-orange-400 mr-2 mt-1">•</span> Real-world case studies</li>
                    </ul>
                </div>

                <!-- Community -->
                <div class="glass-morphism rounded-2xl p-8 hover:scale-105 transition-transform duration-300 neon-border">
                    <div class="w-16 h-16 bg-gradient-to-r from-teal-500 to-green-600 rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-teal-400">Global Community</h3>
                    <p class="text-gray-300 mb-4">Join a diverse community of learners from around the world and build lasting professional connections.</p>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li class="flex items-start"><span class="text-teal-400 mr-2 mt-1">•</span> Global student network</li>
                        <li class="flex items-start"><span class="text-teal-400 mr-2 mt-1">•</span> Collaborative projects</li>
                        <li class="flex items-start"><span class="text-teal-400 mr-2 mt-1">•</span> Alumni success stories</li>
                    </ul>
                </div>

                <!-- Future-Ready -->
                <div class="glass-morphism rounded-2xl p-8 hover:scale-105 transition-transform duration-300 neon-border">
                    <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-blue-600 rounded-2xl mb-6 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-indigo-400">Future-Ready Skills</h3>
                    <p class="text-gray-300 mb-4">Prepare for the future of work with skills that will be in high demand over the next decade.</p>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li class="flex items-start"><span class="text-indigo-400 mr-2 mt-1">•</span> Future-proof curriculum</li>
                        <li class="flex items-start"><span class="text-indigo-400 mr-2 mt-1">•</span> Emerging tech trends</li>
                        <li class="flex items-start"><span class="text-indigo-400 mr-2 mt-1">•</span> Continuous updates</li>
                    </ul>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-16">
                <h3 class="text-3xl font-bold mb-6">
                    <span class="gradient-text">Ready to Transform Your Future?</span>
                </h3>
                <p class="text-xl text-gray-400 mb-8 max-w-3xl mx-auto">
                    Join thousands of learners who are already shaping tomorrow's technology landscape today.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="{{ route('register') }}" class="px-12 py-4 bg-gradient-to-r from-ai-neon-purple to-ai-neon-blue rounded-full text-xl font-semibold hover:scale-105 transition-all duration-300 hover:shadow-2xl hover:shadow-purple-500/50">
                        Start Your Journey
                    </a>
                    <a href="#features" class="px-12 py-4 glass-morphism rounded-full text-xl font-semibold hover:bg-white/10 transition-all duration-300 border border-white/20">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="glass-morphism py-12 mt-20">
        <div class="container mx-auto px-6 text-center">
            <div class="text-2xl font-bold gradient-text mb-4">AI Learning Services</div>
            <p class="text-gray-400 mb-8">Empowering the future of education with artificial intelligence</p>
            <div class="flex justify-center gap-6">
                <a href="#" class="hover:text-ai-neon-purple transition-colors">Privacy</a>
                <a href="#" class="hover:text-ai-neon-purple transition-colors">Terms</a>
                <a href="#" class="hover:text-ai-neon-purple transition-colors">Contact</a>
            </div>
        </div>
    </footer>

</body>
</html>