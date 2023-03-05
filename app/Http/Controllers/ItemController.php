<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Psr\Http\Message\ResponseInterface;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Item::orderBy("created_at", "desc")->get();
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
        $newItem = new Item;
        $newItem->name = $request["name"];
        $newItem->save();

        return $newItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);
        if ($item === null) {
            abort(404);
        }
        return $item;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::find($id);
        if ($item === null) {
            abort(404);
        }
        $item->name = $request["name"];
        $item->completed = $request["completed"];
        $item->save();
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);
        if ($item === null) {
            abort(404);
        }
        $item->delete();
        return "Item deleted";
    }
}
