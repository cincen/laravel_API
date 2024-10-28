<?php

use App\Models\Data;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Data::all();
        $categories = $data->pluck('category')->unique();
        $categoryCounts = $categories->map(function ($category) use ($data) {
            return $data->where('category', $category)->count();
        });

        $dates = $data->pluck('last_update')->unique();
        $dateCounts = $dates->map(function ($date) use ($data) {
            return $data->whereDate('last_update', $date)->count();
        });

        return view('dashboard', compact('categoryCounts', 'dateCounts'));
    }
}