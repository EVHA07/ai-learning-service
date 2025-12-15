<div class="glass-morphism rounded-2xl p-6 card-3d neon-border cursor-pointer">

    <!-- Product Header -->
    <div class="flex items-center justify-between mb-4">
        <span class="px-3 py-1 bg-gradient-to-r from-ai-neon-blue to-ai-neon-purple rounded-full text-sm font-semibold">
            Course
        </span>
        <span class="text-ai-neon-blue font-bold text-lg">
            ${{ number_format($product->price, 2) }}
        </span>
    </div>

    <!-- Product Image Placeholder -->
    <div class="w-full h-40 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl mb-4 flex items-center justify-center">
        @if($product->image_url)
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-xl">
        @else
            <div class="text-center">
                <svg class="w-16 h-16 text-white/80 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <p class="text-white/60 text-sm">Course Content</p>
            </div>
        @endif
    </div>

    <!-- Product Info -->
    <h3 class="text-xl font-bold mb-2 text-white">{{ $product->name }}</h3>
    <p class="text-gray-400 mb-4 text-sm">{{ Str::limit($product->description, 80) }}</p>

    <!-- Additional Info -->
    @if($product->start_date)
        <div class="flex items-center text-sm text-gray-400 mb-4">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            Starts: {{ $product->start_date->format('M d, Y') }}
        </div>
    @endif

    <!-- Action Buttons -->
    <div class="mt-4 space-y-2">
        <a href="{{ route('course.preview', $product->id) }}" 
           class="w-full py-2 bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl text-gray-300 transition-all duration-300 flex items-center justify-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
            Preview Course
        </a>
        <form action="{{ route('purchase', $product->id) }}" method="POST">
            @csrf
            <button type="submit" 
                    class="w-full py-3 bg-gradient-to-r from-ai-neon-blue to-ai-neon-purple rounded-full font-semibold hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/50">
                <span class="flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Enroll Now
                </span>
            </button>
        </form>
    </div>

    <!-- Hover Effect Overlay -->
    <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-blue-600/10 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
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