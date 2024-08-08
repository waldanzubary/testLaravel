@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="card bg-base-200 shadow-lg border border-base-300 rounded-lg">
                <div class="card-header text-xl font-semibold p-4 border-b border-base-300">Add New Customer</div>
                <div class="card-body p-6">
                    <form action="{{ route('customers.store') }}" method="POST">
                        @csrf

                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-error mb-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Name -->
                        <div class="form-control mb-5">
                            <label for="name" class="label">
                                <span class="label-text font-medium">Name</span>
                            </label>
                            <input type="text" id="name" name="name" class="input input-bordered" value="{{ old('name') }}" required>
                        </div>

                        <!-- Email -->
                        <div class="form-control mb-5">
                            <label for="email" class="label">
                                <span class="label-text font-medium">Email</span>
                            </label>
                            <input type="email" id="email" name="email" class="input input-bordered" value="{{ old('email') }}" required>
                        </div>

                        <!-- Phone -->
                        <div class="form-control mb-5">
                            <label for="phone" class="label">
                                <span class="label-text font-medium">Phone</span>
                            </label>
                            <input type="text" id="phone" name="phone" class="input input-bordered" value="{{ old('phone') }}" required>
                        </div>

                        <!-- Address -->
                        <div class="form-control mb-5">
                            <label for="address" class="label">
                                <span class="label-text font-medium">Address</span>
                            </label>
                            <textarea id="address" name="address" class="textarea textarea-bordered" required>{{ old('address') }}</textarea>
                        </div>

                        <!-- Continent -->
                        <div class="form-control mb-5">
                            <label for="continent" class="label">
                                <span class="label-text font-medium">Continent</span>
                            </label>
                            <select id="continent" name="continent" class="select select-bordered" required>
                                <option value="" disabled selected>Select Continent</option>
                                <option value="Asia" {{ old('continent') == 'Asia' ? 'selected' : '' }}>Asia</option>
                                <option value="Africa" {{ old('continent') == 'Africa' ? 'selected' : '' }}>Africa</option>
                                <option value="North America" {{ old('continent') == 'North America' ? 'selected' : '' }}>North America</option>
                                <option value="South America" {{ old('continent') == 'South America' ? 'selected' : '' }}>South America</option>
                                <option value="Antarctica" {{ old('continent') == 'Antarctica' ? 'selected' : '' }}>Antarctica</option>
                                <option value="Europe" {{ old('continent') == 'Europe' ? 'selected' : '' }}>Europe</option>
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary">Add Customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
