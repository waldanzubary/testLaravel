<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function Warehouse()
    {
        $Item = Item::all();

        return view('Warehouse.index', ['Item'=> $Item]);
        // return view ('Warehouse.index');
    }


    public function CreateIndex()

    {
        return view ('Warehouse.ItemCreate');
    }


    public function store(Request $request)
{
    $validated = $request->validate([
        'itemName' => 'required|string|max:255',
        'price' => 'required|integer',
        'stock' => 'required|integer',

    ]);



    $item = new Item($validated);
    $item->setStatus(); // Set status based on stock
    $item->save();

    return redirect('Warehouse');
}


    public function edit($id)
{
    $item = Item::findOrFail($id);
    return view('warehouse.edit', compact('item'));
}

public function update(Request $request, $id)
{
    $item = Item::findOrFail($id);
    $item->itemName = $request->input('itemName');
    $item->stock = $request->input('stock');
    $item->price = $request->input('price');


    $item->setStatus(); // Update status based on stock
    $item->save();

    return redirect('Warehouse');
}


public function destroy($id)
{
    $item = Item::findOrFail($id);
    $item->delete();

    return redirect('Warehouse');
}
}
