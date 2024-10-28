<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $dashboard = Data::orderBy('last_update', 'desc')->paginate(10);
        return view('dashboard', compact('dashboard'));
    }

    public function create()
    {
        return view('data.create');
    }

    public function store(Request $categories)
    {
        $categories->validate(['category' => 'required', 'content' => 'required']);
        Data::create($categories->all());
        return redirect()->route('dashboard');
    }

    public function edit(Data $data)
    {
        return view('data.edit', compact('data'));
    }

    public function update(Request $request, Data $data)
    {
        $request->validate(['category' => 'required', 'content' => 'required']);
        $data->update($request->all());
        return redirect()->route('data.index');
    }

    public function destroy(Data $data)
    {
        $data->delete();
        return redirect()->route('data.index');
    }
}
