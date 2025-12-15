<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function index()
    {
        $guruProducts = Product::where('user_id', Auth::id())
            ->where('type', 'course')
            ->latest()
            ->get();

        $stats = [
            'total_courses' => $guruProducts->count(),
            'active_courses' => $guruProducts->where('is_active', true)->count(),
            'total_students' => Transaction::whereHas('product', function($query) {
                $query->where('user_id', Auth::id());
            })->where('status', 'paid')->count(),
            'total_revenue' => Transaction::whereHas('product', function($query) {
                $query->where('user_id', Auth::id());
            })->where('status', 'paid')->sum('amount'),
        ];

        return view('guru.dashboard', compact('guruProducts', 'stats'));
    }

    public function create()
    {
        return view('guru.create-course');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\-\.\,\!]+$/',
            'description' => 'required|string|max:5000|regex:/^[a-zA-Z0-9\s\-\.\,\!\?\(\)\[\]\{\}\/\n\r]+$/',
            'price' => 'required|numeric|min:0|max:99999.99',
            'type' => 'required|in:course',
            'start_date' => 'nullable|date|after:today',
            'image_url' => 'nullable|url|max:2048',
            'zoom_link' => 'nullable|url|max:2048|regex:/^https:\/\/(zoom\.us|meet\.google\.com|teams\.microsoft\.com)/',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'image_url' => $request->image_url,
            'zoom_link' => $request->zoom_link,
            'user_id' => Auth::id(),
            'is_active' => true,
        ]);

        return redirect()->route('guru.dashboard')->with('success', 'Course created successfully!');
    }

    public function edit(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        return view('guru.edit-course', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\-\.\,\!]+$/',
            'description' => 'required|string|max:5000|regex:/^[a-zA-Z0-9\s\-\.\,\!\?\(\)\[\]\{\}\/\n\r]+$/',
            'price' => 'required|numeric|min:0|max:99999.99',
            'type' => 'required|in:course',
            'start_date' => 'nullable|date|after:today',
            'image_url' => 'nullable|url|max:2048',
            'zoom_link' => 'nullable|url|max:2048|regex:/^https:\/\/(zoom\.us|meet\.google\.com|teams\.microsoft\.com)/',
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'image_url' => $request->image_url,
            'zoom_link' => $request->zoom_link,
        ]);

        return redirect()->route('guru.dashboard')->with('success', 'Course updated successfully!');
    }

    public function show(Product $product)
    {
        if ($product->user_id !== Auth::id() && Auth::user()->role->name !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        // Get enrolled students for this course
        $enrolledStudents = Transaction::where('product_id', $product->id)
            ->where('status', 'paid')
            ->with('user')
            ->get()
            ->pluck('user');

        return view('guru.show-course', compact('product', 'enrolledStudents'));
    }

    public function updateZoom(Request $request, Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        $request->validate([
            'zoom_link' => 'nullable|url',
        ]);

        $product->update([
            'zoom_link' => $request->zoom_link,
        ]);

        return redirect()->route('guru.show', $product->id)->with('success', 'Zoom link updated successfully!');
    }

    public function destroy(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        $product->delete();

        return redirect()->route('guru.dashboard')->with('success', 'Course deleted successfully!');
    }
}