@extends('Layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <!-- Content Row -->
    <div class="container mx-auto p-6">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                <div class="card bg-base-200 shadow-lg border border-base-300 rounded-lg">
                    <div class="card-header text-xl font-semibold p-4 border-b border-base-300">Tambah Data</div>
                    <div class="card-body p-6">
                        <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-control mb-5">
                                <label for="itemName" class="label">
                                    <span class="label-text font-medium">Item Name</span>
                                </label>
                                <input type="text" name="itemName" id="itemName" class="input input-bordered" placeholder="Item name" required>
                            </div>

                            <div class="form-control mb-5">
                                <label for="price" class="label">
                                    <span class="label-text font-medium">Price</span>
                                </label>
                                <input type="text" name="price" id="price" class="input input-bordered" placeholder="Price" required>
                            </div>

                            <div class="form-control mb-5">
                                <label for="stock" class="label">
                                    <span class="label-text font-medium">Stock</span>
                                </label>
                                <input type="text" name="stock" id="stock" class="input input-bordered" placeholder="Stock" required>
                            </div>



                            <div class="flex justify-end">
                                <button class="btn btn-primary" type="submit">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
