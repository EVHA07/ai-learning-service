<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_products' => Product::count(),
            'total_transactions' => Transaction::count(),
            'total_revenue' => Transaction::where('status', 'paid')->sum('amount'),
            'admin_users' => User::whereHas('role', function($query) {
                $query->where('name', 'admin');
            })->count(),
            'guru_users' => User::whereHas('role', function($query) {
                $query->where('name', 'guru');
            })->count(),
            'murid_users' => User::whereHas('role', function($query) {
                $query->where('name', 'murid');
            })->count(),
        ];

        $recentTransactions = Transaction::with(['user', 'product'])
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentTransactions'));
    }

    public function users()
    {
        $users = User::with('role')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function products()
    {
        $products = Product::with('user')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function transactions()
    {
        $transactions = Transaction::with(['user', 'product'])
            ->latest()
            ->paginate(10);
        return view('admin.transactions.index', compact('transactions'));
    }
}
