<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Redirect based on role
        if ($user->role && $user->role->name === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role && $user->role->name === 'guru') {
            return redirect()->route('guru.dashboard');
        }
        
        // For Murid (Student) - show limited dashboard
        // Get all available courses
        $courses = Product::where('type', 'course')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Get user's purchased courses
        $myLearning = Transaction::where('user_id', $user->id)
            ->where('status', 'paid')
            ->with('product')
            ->orderBy('created_at', 'desc')
            ->get()
            ->pluck('product');
        
        return view('dashboard', compact('user', 'courses', 'myLearning'));
    }
    
    public function purchase(Product $product)
    {
        $user = Auth::user();
        
        // Check if already purchased
        $existingTransaction = Transaction::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->where('status', 'paid')
            ->first();
            
        if ($existingTransaction) {
            return redirect()->back()->with('error', 'You have already purchased this product.');
        }
        
        // Create transaction (mockup - set as paid)
        Transaction::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'status' => 'paid',
            'amount' => $product->price,
            'payment_method' => 'mock_payment',
            'transaction_id' => 'TXN_' . Str::random(12) . '_' . time(),
        ]);
        
        return redirect()->back()->with('success', 'Purchase successful! You can now access this product.');
    }
    
    public function showClass(Product $product)
    {
        $user = Auth::user();
        
        // Check if user has purchased this product
        $hasPurchased = Transaction::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->where('status', 'paid')
            ->exists();
            
        if (!$hasPurchased) {
            abort(403, 'You must purchase this course to access it.');
        }
        
        return view('student.class-detail', compact('product'));
    }
    
    public function previewCourse(Product $product)
    {
        return view('student.course-preview', compact('product'));
    }
}