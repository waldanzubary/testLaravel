@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Add Sale</h1>

    <form action="{{ route('sales.store') }}" method="POST" class="bg-base-100 p-6 rounded-lg shadow-md">
        @csrf

        <div class="form-control mb-4">
            <label for="customer_id" class="label">
                <span class="label-text">Customer</span>
            </label>
            <select name="customer_id" id="customer_id" class="select select-bordered w-full">
                @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-control mb-4">
            <label for="sale_date" class="label">
                <span class="label-text">Sale Date</span>
            </label>
            <input type="date" name="sale_date" id="sale_date" class="input input-bordered w-full">
        </div>

        <div class="form-control mb-4">
            <label for="items" class="label">
                <span class="label-text">Items</span>
            </label>
            <div id="items-container">
                <div class="flex items-center mb-4  p-4 rounded-lg">
                    <div class="flex-1 mr-2">
                        <select name="items[0][item_id]" class="select select-bordered w-full">
                            @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->itemName }} - Rp. {{ number_format($item->price, 0, ',', '.') }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-1 mr-2">
                        <input type="number" name="items[0][quantity]" class="input input-bordered w-full" placeholder="Quantity">
                    </div>
                    <div class="flex-none">
                        <button type="button" class="btn btn-error remove-item">Remove</button>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary mt-4" id="add-item">Add Item</button>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<script>
    document.getElementById('add-item').addEventListener('click', function() {
        let itemsContainer = document.getElementById('items-container');
        let index = itemsContainer.children.length;
        let newItem = `
            <div class="flex items-center mb-4  p-4 rounded-lg">
                <div class="flex-1 mr-2">
                    <select name="items[${index}][item_id]" class="select select-bordered w-full">
                        @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->itemName }} - Rp. {{ number_format($item->price, 0, ',', '.') }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1 mr-2">
                    <input type="number" name="items[${index}][quantity]" class="input input-bordered w-full" placeholder="Quantity">
                </div>
                <div class="flex-none">
                    <button type="button" class="btn btn-error remove-item">Remove</button>
                </div>
            </div>
        `;
        itemsContainer.insertAdjacentHTML('beforeend', newItem);
    });

    document.getElementById('items-container').addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-item')) {
            event.target.closest('.flex').remove();
        }
    });
</script>
@endsection
