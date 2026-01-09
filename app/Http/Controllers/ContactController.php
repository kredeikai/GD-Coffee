<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required','string','max:255'],
            'email'   => ['required','email','max:255'],
            'message' => ['required','string','max:5000'],
        ]);

        Contact::create($data);

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
    public function index(Request $request)
    {
        $withTrashed = $request->query('trashed') === '1';

        if ($withTrashed) {
            $contacts = Contact::withTrashed()->orderByDesc('created_at')->paginate(15);
        } else {
            $contacts = Contact::orderByDesc('created_at')->paginate(15);
        }

        return view('admin.contacts.index', compact('contacts', 'withTrashed'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }
    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }
    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'name'    => ['required','string','max:255'],
            'email'   => ['required','email','max:255'],
            'message' => ['required','string','max:5000'],
        ]);

        $contact->update($data);

        return redirect()->route('contacts.index')->with('success', 'Pesan berhasil diperbarui.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Pesan berhasil dihapus (soft delete).');
    }

    public function restore($id)
    {
        $contact = Contact::withTrashed()->findOrFail($id);
        $contact->restore();

        return redirect()->route('contacts.index', ['trashed' => 1])->with('success', 'Pesan berhasil dikembalikan.');
    }
}
