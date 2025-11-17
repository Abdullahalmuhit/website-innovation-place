<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        $contact->update(['is_read' => true]);
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy($id )
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact deleted successfully');
    }

    public function markAsRead($id )
    {
        $contact = Contact::find($id);
        $contact->update(['is_read' => true]);
        return back()->with('success', 'Marked as read');
    }
}
