@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="card bg-base-200 shadow-lg border border-base-300 rounded-lg">
                <div class="card-header text-xl font-semibold p-4 border-b border-base-300">
                    Customer Details
                </div>
                <div class="card-body p-6">
                    <h5 class="card-title text-2xl font-bold mb-4">{{ $customer->name }}</h5>
                    <p class="card-text mb-2"><strong>Email:</strong> {{ $customer->email }}</p>
                    <p class="card-text mb-2"><strong>Phone:</strong> {{ $customer->phone }}</p>
                    <p class="card-text mb-4"><strong>Address:</strong> {{ $customer->address }}</p>
                    <a href="{{ route('customers.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
