@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Contact for {{ $customer->name }}</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('contacts.update', [$customer->id, $contact->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $contact->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $contact->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $contact->phone }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Contact</button>
                </form>
            </div>
        </div>
    </div>
@endsection
