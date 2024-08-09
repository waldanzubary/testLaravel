@extends('Layouts.app')

@section('content')
<!-- Begin Page Content -->
<!-- Content Row -->
<div class="container mx-auto p-6">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="card bg-base-200 shadow-lg border border-base-300 rounded-lg">
                <div class="card-header text-xl font-semibold p-4 border-b border-base-300">Edit Item</div>
                <div class="card-body p-6">
                    <form action="{{ route('warehouse.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Item Name -->
                        <div class="form-control mb-5">
                            <label for="itemName" class="label">
                                <span class="label-text font-medium">Item Name</span>
                            </label>
                            <input type="text" id="itemName" name="itemName" class="input input-bordered" value="{{ $item->itemName }}" required>
                        </div>

                        <!-- Stock -->
                        <div class="form-control mb-5">
                            <label for="stock" class="label">
                                <span class="label-text font-medium">Stock</span>
                            </label>
                            <input type="number" id="stock" name="stock" class="input input-bordered" value="{{ $item->stock }}" required>
                        </div>

                        <!-- Price -->
                        <div class="form-control mb-5">
                            <label for="price" class="label">
                                <span class="label-text font-medium">Price</span>
                            </label>
                            <input type="text" id="price" name="price" class="input input-bordered" value="{{ $item->price }}" required>
                        </div>

                        <!-- Image -->
                        <div class="form-control mb-5">
                            


                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary">Update Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
