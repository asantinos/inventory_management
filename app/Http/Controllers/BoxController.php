<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('boxes.index', [
            'boxes' => Box::all(),
            'items' => Item::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('boxes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        Box::create($validated);

        return redirect(route('boxes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box): View
    {
        return view('boxes.show', [
            'box' => $box,
            'items' => $box->items,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $box): View
    {
        return view('boxes.edit', [
            'box' => $box,
            'items' => Item::all(),
            'unassignedItems' => Item::whereNull('box_id')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Box $box)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $box->update($validated);

        return redirect(route('boxes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
    {
        $box->delete();

        return redirect(route('boxes.index'));
    }
}
