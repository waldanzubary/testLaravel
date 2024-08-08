@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="card bg-base-200 shadow-lg border border-base-300 rounded-lg">
                <div class="card-header text-xl font-semibold p-4 border-b border-base-300">Edit Customer</div>
                <div class="card-body p-6">
                    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="form-control mb-5">
                            <label for="name" class="label">
                                <span class="label-text font-medium">Name</span>
                            </label>
                            <input type="text" id="name" name="name" class="input input-bordered" value="{{ $customer->name }}" required>
                        </div>

                        <!-- Email -->
                        <div class="form-control mb-5">
                            <label for="email" class="label">
                                <span class="label-text font-medium">Email</span>
                            </label>
                            <input type="email" id="email" name="email" class="input input-bordered" value="{{ $customer->email }}" required>
                        </div>

                        <!-- Phone -->
                        <div class="form-control mb-5">
                            <label for="phone" class="label">
                                <span class="label-text font-medium">Phone</span>
                            </label>
                            <input type="text" id="phone" name="phone" class="input input-bordered" value="{{ $customer->phone }}" required>
                        </div>

                        <!-- Address -->
                        <div class="form-control mb-5">
                            <label for="address" class="label">
                                <span class="label-text font-medium">Address</span>
                            </label>
                            <textarea id="address" name="address" class="textarea textarea-bordered" required>{{ $customer->address }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary">Update Customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
