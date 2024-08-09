@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">List of Contacts for {{ $customer->name }}</h1>

        <a href="{{ route('contacts.create', $customer->id) }}" class="btn btn-primary mb-4">Add Contact</a>

        <div class="overflow-x-auto">
            <table class="table table-auto w-full bg-base-100 border border-base-300 rounded-lg shadow-lg">
                <thead>
                    <tr>
                        <th class="p-4 text-left">Name</th>
                        <th class="p-4 text-left">Email</th>
                        <th class="p-4 text-left">Phone</th>
                        <th class="p-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($contacts->isEmpty())
                        <tr>
                            <td colspan="4" class="p-4 text-center">No contacts found.</td>
                        </tr>
                    @else
                        @foreach($contacts as $contact)
                            <tr>
                                <td class="p-4">{{ $contact->name }}</td>
                                <td class="p-4">{{ $contact->email }}</td>
                                <td class="p-4">{{ $contact->phone }}</td>
                                <td class="p-4 flex space-x-2">
                                    <a href="{{ route('contacts.edit', [$customer->id, $contact->id]) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('contacts.destroy', [$customer->id, $contact->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
