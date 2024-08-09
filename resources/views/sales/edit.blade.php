@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-6">Edit Sale</h1>

    <form action="{{ route('sales.update', $sale->id) }}" method="POST" id="saleForm">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="customer_id" class="block text-gray-700 font-medium">Customer</label>
            <select id="customer_id" name="customer_id" class="select select-bordered w-full mt-1" required>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $sale->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="sale_date" class="block font-medium">Sale Date</label>
            <input type="date" id="sale_date" name="sale_date" value="{{ $sale->sale_date->format('Y-m-d') }}" class="input input-bordered w-full mt-1" required>
        </div>

        <div class="mb-4">
            <label for="total_price" class="block text-gray-700 font-medium">Total Price</label>
            <input type="number" id="total_price" name="total_price" value="{{ $sale->total_price }}" class="input input-bordered w-full mt-1" readonly>
        </div>

        <div class="mb-4">
            <h2 class="text-lg font-semibold">Items</h2>
            <div id="items-container">
                @foreach ($sale->items as $index => $saleItem)
                    <div class="item-row flex mb-4 p-4 rounded-md" data-index="{{ $index }}">
                        <div class="w-1/2 mr-2">
                            <select name="items[{{ $index }}][item_id]" class="select select-bordered w-full mt-1" required>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}" {{ $saleItem->item_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->itemName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-1/4 mr-2">
                            <input type="number" name="items[{{ $index }}][quantity]" value="{{ $saleItem->quantity }}" class="input input-bordered w-full mt-1 quantity-input" required>
                        </div>
                        <div class="w-1/4 mr-2">
                            <input type="number" name="items[{{ $index }}][price]" value="{{ $saleItem->price }}" class="input input-bordered w-full mt-1 price-input bg-base-300" readonly>
                        </div>
                        <button type="button" onclick="removeItemRow(this)" class="btn btn-error mt-1 ml-2">Remove</button>
                    </div>
                @endforeach
            </div>
            <div class="form-control">
                 <button type="button" onclick="addItemRow()" class="btn btn-primary mt-4">Add Item</button>
            </div>

        </div>

        <button type="submit" class="btn btn-success">Update Sale</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const itemsContainer = document.getElementById('items-container');
        const totalPriceInput = document.getElementById('total_price');

        function calculateTotalPrice() {
            let totalPrice = 0;
            const itemRows = itemsContainer.getElementsByClassName('item-row');
            Array.from(itemRows).forEach(row => {
                const quantity = row.querySelector('.quantity-input').value;
                const price = row.querySelector('.price-input').value;
                totalPrice += quantity * price;
            });
            totalPriceInput.value = totalPrice.toFixed(2); // Membulatkan ke 2 desimal
        }

        itemsContainer.addEventListener('input', function(event) {
            if (event.target.classList.contains('quantity-input') || event.target.classList.contains('price-input')) {
                calculateTotalPrice();
            }
        });

        calculateTotalPrice(); // Kalkulasi harga total pada saat halaman dimuat

        window.addItemRow = function() {
            const index = itemsContainer.children.length;
            const newItemRow = `
                <div class="item-row flex mb-4 p-4 rounded-md" data-index="${index}">
                    <div class="w-1/2 mr-2">
                        <select name="items[${index}][item_id]" class="select select-bordered w-full mt-1" required>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->itemName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/4 mr-2">
                        <input type="number" name="items[${index}][quantity]" class="input input-bordered w-full mt-1 quantity-input" required>
                    </div>
                    <div class="w-1/4 mr-2">
                        <input type="number" name="items[${index}][price]" class="input input-bordered w-full mt-1 price-input" required>
                    </div>
                    <button type="button" onclick="removeItemRow(this)" class="btn btn-error mt-1 ml-2">Remove</button>
                </div>
            `;
            itemsContainer.insertAdjacentHTML('beforeend', newItemRow);
        };

        window.removeItemRow = function(button) {
            const row = button.closest('.item-row');
            row.remove();
            calculateTotalPrice(); // Recalculate after removing an item
        };
    });
</script>
@endsection
