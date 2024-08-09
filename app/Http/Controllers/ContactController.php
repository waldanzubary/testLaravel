<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $contacts = $customer->contacts;
        return view('contacts.index', compact('customer', 'contacts'));
    }

    public function create($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        return view('contacts.create', compact('customer'));
    }

    public function store(Request $request, $customerId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $customer = Customer::findOrFail($customerId);

        $contact = new Contact($request->all());
        $contact->customer_id = $customer->id;
        $contact->save();

        return redirect()->route('contacts.index', $customer->id)->with('success', 'Contact created successfully.');
    }

    public function edit($customerId, $contactId)
    {
        $customer = Customer::findOrFail($customerId);
        $contact = $customer->contacts()->findOrFail($contactId);
        return view('contacts.edit', compact('customer', 'contact'));
    }

    public function update(Request $request, $customerId, $contactId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $customer = Customer::findOrFail($customerId);
        $contact = $customer->contacts()->findOrFail($contactId);
        $contact->update($request->all());

        return redirect()->route('contacts.index', $customer->id)->with('success', 'Contact updated successfully.');
    }

    public function destroy($customerId, $contactId)
    {
        $customer = Customer::findOrFail($customerId);
        $contact = $customer->contacts()->findOrFail($contactId);
        $contact->delete();

        return redirect()->route('contacts.index', $customer->id)->with('success', 'Contact deleted successfully.');
    }


    public function contact(Request $request)
{
    $query = Customer::query();

    
    $search = $request->input('search');

    if ($search) {

        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }

    $customers = $query->get();

    return view('customers.contact', compact('customers'));
}
}
