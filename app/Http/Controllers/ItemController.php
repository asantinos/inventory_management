<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Box;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('items.index', [
            'items' => Item::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item): View
    {
        // $this->authorize('update', $item);

        return view('items.edit', [
            'item' => $item,
            'boxes' => Box::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        // $this->authorize('update', $item);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'picture' => 'nullable|string',
            'price' => 'nullable|numeric',
            'box_id' => 'nullable|exists:boxes,id',
        ]);

        $item->update($validated);

        return redirect(route('items.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect(route('items.index'));
    }
}
