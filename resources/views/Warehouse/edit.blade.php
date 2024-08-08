@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Sale</h1>
    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="customer_id">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control" required>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $sale->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="sale_date">Sale Date</label>
            <input type="date" name="sale_date" id="sale_date" class="form-control" value="{{ $sale->sale_date->format('Y-m-d') }}" required>
        </div>
        <div id="items-container">
            @foreach ($sale->items as $index => $saleItem)
                <div class="item-row">
                    <div class="form-group">
                        <label for="items[{{ $index }}][item_id]">Item</label>
                        <select name="items[{{ $index }}][item_id]" class="form-control" required>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}" {{ $saleItem->item_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="items[{{ $index }}][quantity]">Quantity</label>
                        <input type="number" name="items[{{ $index }}][quantity]" class="form-control" value="{{ $saleItem->quantity }}" min="1" required>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" id="add-item" class="btn btn-secondary">Add Item</button>
        <button type="submit" class="btn btn-primary">Update Sale</button>
    </form>
</div>

<script>
document.getElementById('add-item').addEventListener('click', function() {
    var container = document.getElementById('items-container');
    var index = container.getElementsByClassName('item-row').length;
    var newRow = document.createElement('div');
    newRow.classList.add('item-row');
    newRow.innerHTML = `
        <div class="form-group">
            <label for="items[${index}][item_id]">Item</label>
            <select name="items[${index}][item_id]" class="form-control" required>
                <option value="">Select an Item</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="items[${index}][quantity]">Quantity</label>
            <input type="number" name="items[${index}][quantity]" class="form-control" min="1" required>
        </div>
    `;
    container.appendChild(newRow);
});
</script>
@endsection
