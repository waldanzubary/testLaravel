@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Sales Report</h1>

    <form action="{{ route('sales.report') }}" method="POST" class="bg-base-100 p-6 rounded-lg shadow-md">
        @csrf
        <div class="form-control mb-4">
            <label for="start_date" class="label">
                <span class="label-text">Start Date</span>
            </label>
            <input type="date" name="start_date" id="start_date" class="input input-bordered w-full" value="{{ old('start_date', $validated['start_date'] ?? '') }}" required>
        </div>
        <div class="form-control mb-4">
            <label for="end_date" class="label">
                <span class="label-text">End Date</span>
            </label>
            <input type="date" name="end_date" id="end_date" class="input input-bordered w-full" value="{{ old('end_date', $validated['end_date'] ?? '') }}" required>
        </div>
        <div class="form-control mb-6">
            <label for="customer_id" class="label">
                <span class="label-text">Customer</span>
            </label>
            <select name="customer_id" id="customer_id" class="select select-bordered w-full">
                <option value="">All Customers</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ (isset($validated['customer_id']) && $validated['customer_id'] == $customer->id) ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>

    @if (isset($sales))
        <h2 class="text-2xl font-bold mt-8 mb-4">Report Results</h2>
        <table class="table table-zebra w-full mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Sale Date</th>
                    <th>Total Price</th>
                    <th>Items</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->customer->name }}</td>
                        <td>{{ $sale->sale_date->format('Y-m-d') }}</td>
                        <td>{{ number_format($sale->total_price, 2) }}</td>
                        <td>
                            @foreach ($sale->items as $item)
                                <div>{{ $item->item->name }} ({{ $item->quantity }} x {{ number_format($item->price / $item->quantity, 2) }})</div>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
