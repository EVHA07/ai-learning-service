<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Sample Courses
        Product::create([
            'name' => 'Machine Learning Fundamentals',
            'description' => 'Master the basics of machine learning, including supervised and unsupervised learning, neural networks, and deep learning fundamentals.',
            'price' => 99.99,
            'type' => 'course',
            'image_url' => null,
            'start_date' => now()->addDays(7),
            'is_active' => true,
        ]);

        Product::create([
            'name' => 'Advanced Neural Networks',
            'description' => 'Deep dive into advanced neural network architectures, including CNNs, RNNs, Transformers, and cutting-edge AI research.',
            'price' => 149.99,
            'type' => 'course',
            'image_url' => null,
            'start_date' => now()->addDays(14),
            'is_active' => true,
        ]);

        Product::create([
            'name' => 'Natural Language Processing',
            'description' => 'Learn how to build sophisticated NLP systems, from text preprocessing to advanced language models and chatbots.',
            'price' => 129.99,
            'type' => 'course',
            'image_url' => null,
            'start_date' => now()->addDays(10),
            'is_active' => true,
        ]);

        // Sample AI Agents
        Product::create([
            'name' => 'Python Programming Tutor',
            'description' => 'Personal AI tutor that helps you master Python programming with interactive exercises and real-time feedback.',
            'price' => 49.99,
            'type' => 'ai_agent',
            'image_url' => null,
            'start_date' => null,
            'is_active' => true,
        ]);

        Product::create([
            'name' => 'Math Problem Solver',
            'description' => 'Advanced AI agent that helps solve complex mathematical problems with step-by-step explanations.',
            'price' => 39.99,
            'type' => 'ai_agent',
            'image_url' => null,
            'start_date' => null,
            'is_active' => true,
        ]);

        Product::create([
            'name' => 'Code Review Assistant',
            'description' => 'AI-powered code reviewer that provides instant feedback on your code quality, security, and best practices.',
            'price' => 59.99,
            'type' => 'ai_agent',
            'image_url' => null,
            'start_date' => null,
            'is_active' => true,
        ]);
    }
}