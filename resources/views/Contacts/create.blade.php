@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Contact for {{ $customer->name }}</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('contacts.store', $customer->id) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Contact</button>
                </form>
            </div>
        </div>
    </div>
@endsection
