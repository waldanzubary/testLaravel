@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add Contact for {{ $customer->name }}</h1>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <form action="{{ route('contacts.store', $customer->id) }}" method="POST">
                    @csrf

                    <div class="form-control mb-4">
                        <label for="name" class="label">
                            <span class="label-text">Name</span>
                        </label>
                        <input type="text" id="name" name="name" class="input input-bordered w-full" required>
                    </div>

                    <div class="form-control mb-4">
                        <label for="email" class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" id="email" name="email" class="input input-bordered w-full" required>
                    </div>

                    <div class="form-control mb-4">
                        <label for="phone" class="label">
                            <span class="label-text">Phone</span>
                        </label>
                        <input type="text" id="phone" name="phone" class="input input-bordered w-full" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-full">Save Contact</button>
                </form>
            </div>
        </div>
    </div>
@endsection
