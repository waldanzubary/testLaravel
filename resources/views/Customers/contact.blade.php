@extends('layouts.app')

@section('content')

<style>
    .titleaction{
        display: flex;
        justify-content: space-between
}
</style>

    <div class="container">
        <div class="titleaction">
        <h1 class="text-2xl font-bold mb-4">List Customers Contacts</h1>

    </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-3">
                <p>{{ $message }}</p>
            </div>
        @endif

        <form method="GET" action="{{ route('customers.contact') }}" class="mb-4">
            <div class="form-control mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="input input-bordered w-full mt-5" placeholder="Search by name or email" value="{{ request()->get('search') }}">
                </div>
            </div>
        </form>

        <table class="table w-full mt-3">
            <thead>
                <tr>
                    <th class="text-left">Name</th>
                    <th class="text-left">Email</th>
                    <th class="text-left">Phone</th>
                    <th class="text-left">Address</th>
                    <th class="text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr class="customer-row">
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>
                            {{-- <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> --}}
                            <a href="customers/{{ $customer->id }}/contacts" class="btn btn-info">Contact</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
