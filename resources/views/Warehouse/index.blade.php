@extends('Layouts.app')

@section('content')
<!-- Begin Page Content -->
<!-- Page Heading -->
{{-- <div class="flex align-items-center justify-end mb-4"> --}}


    <div class="titleaction flex justify-between">
        <h1 class="text-2xl font-bold mb-4">Transaction</h1>
        <a href="Warehouse/create" class="btn btn-primary ">
            <i class="fa fa-book fa-sm"></i> Create Item
        </a>
    </div>




<!-- Content Row -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 mt-5 gap-6">
    @foreach ($Item as $item)
    <div class="card  bg-base-300  shadow-lg rounded-lg overflow-hidden ">

        <div class="card-body p-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">{{ $item->itemName }}</h2>
                <span id="status-{{ $item->id }}" class="badge badge-status">{{ $item->status }}</span>
            </div>


            <p class="text-gray-400">Stock: <span id="stock-{{ $item->id }}" class="font-bold">{{ $item->stock }}</span></p>
            <p class="text-gray-400">Price: Rp. {{ $item->price }}</p>

            <div class="card-actions flex justify-end gap-2 mt-4">
                <a href="/warehouse/{{ $item->id }}/edit" class="btn btn-warning btn-sm text-gray-900">Edit</a>
                <form action="/warehouse/{{ $item->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error btn-sm text-gray-100">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal">
    <div class="modal-box">
        <h2 class="text-lg font-bold">Ready to Leave?</h2>
        <p>Select "Logout" below if you are ready to end your current session.</p>
        <div class="modal-action">
            <button class="btn" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
    </div>
</div>

<!-- JavaScript for Dynamic Badge Color -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.badge-status').forEach(function (badge) {
            if (badge.textContent.trim() === 'outStock') {
                badge.classList.add('bg-red-500', 'text-white');
                badge.classList.remove('bg-green-500');
            } else {
                badge.classList.add('bg-green-500', 'text-white');
                badge.classList.remove('bg-red-500');
            }
        });
    });
</script>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('js/book.js') }}"></script>
@endsection
