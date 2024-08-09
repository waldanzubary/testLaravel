@extends('layouts.app')

@section('content')
<div class="container">
    <div class="titleaction flex justify-between">
        <h1 class="text-2xl font-bold mb-4">Transaction</h1>
        <a href="{{ route('sales.create') }}" class="btn btn-primary">Add Sale</a>
    </div>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->sale_date }}</td>
                <td>{{ $sale->customer->name }}</td>
                <td>Rp. {{ number_format($sale->total_price, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
