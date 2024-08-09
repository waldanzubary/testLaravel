<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Item;
use App\Models\Customer;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        // Fetch sales with related customers
        $sales = Sale::with('customer')->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        // Fetch all customers and items for the create form
        $customers = Customer::all();
        $items = Item::all();
        return view('sales.create', compact('customers', 'items'));
    }

    public function store(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'sale_date' => 'required|date',
            'items.*.item_id' => 'required|exists:items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        // Create a new sale
        $sale = Sale::create([
            'customer_id' => $validated['customer_id'],
            'sale_date' => $validated['sale_date'],
            'total_price' => 0,
        ]);

        $totalPrice = 0;
        foreach ($validated['items'] as $saleItemData) {
            $item = Item::findOrFail($saleItemData['item_id']);
            $saleItem = new SaleItem([
                'item_id' => $item->id,
                'quantity' => $saleItemData['quantity'],
                'price' => $item->price * $saleItemData['quantity'],
            ]);
            $sale->items()->save($saleItem);
            $item->reduceStock($saleItemData['quantity']);
            $totalPrice += $saleItem->price;
        }

        // Update total price and save the sale
        $sale->total_price = $totalPrice;
        $sale->save();

        return redirect()->route('sales.index');
    }

    public function edit($id)
    {
        $sale = Sale::with('items.item')->findOrFail($id);
        $customers = Customer::all();
        $items = Item::all(); // Pastikan data item diambil

        return view('sales.edit', compact('sale', 'customers', 'items'));
    }





    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'sale_date' => 'required|date',
        'items.*.item_id' => 'required|exists:items,id',
        'items.*.quantity' => 'required|integer|min:1',
    ]);

    $sale = Sale::findOrFail($id);

    // Kembalikan stok item sebelum menghapus
    foreach ($sale->items as $saleItem) {
        $item = $saleItem->item;
        $item->stock += $saleItem->quantity;
        $item->save();
    }

    // Hapus item lama
    $sale->items()->delete();

    $totalPrice = 0;
    foreach ($validated['items'] as $saleItemData) {
        $item = Item::findOrFail($saleItemData['item_id']);
        $saleItem = new SaleItem([
            'item_id' => $item->id,
            'quantity' => $saleItemData['quantity'],
            'price' => $item->price * $saleItemData['quantity'],
        ]);
        $sale->items()->save($saleItem);

        // Kurangi stok item baru
        $item->reduceStock($saleItemData['quantity']);
        $totalPrice += $saleItem->price;
    }

    $sale->total_price = $totalPrice;
    $sale->customer_id = $validated['customer_id'];
    $sale->sale_date = $validated['sale_date'];
    $sale->save();

    return redirect()->route('sales.index');
}



    public function destroy($id)
    {
        // Find the sale and delete associated items and sale itself
        $sale = Sale::findOrFail($id);
        $sale->items()->delete();
        $sale->delete();

        return redirect()->route('sales.index');
    }






    public function reportForm()
{
    $customers = Customer::all();
    return view('sales.report', compact('customers'));
}

public function generateReport(Request $request)
{
    $validated = $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'customer_id' => 'nullable|exists:customers,id',
    ]);

    $query = Sale::whereBetween('sale_date', [$validated['start_date'], $validated['end_date']]);

    if ($validated['customer_id']) {
        $query->where('customer_id', $validated['customer_id']);
    }

    $sales = $query->with('customer', 'items.item')->get();

    $customers = Customer::all(); // Optional: to populate the filter form if needed
    return view('sales.report', compact('sales', 'customers', 'validated'));
}


}
