<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Mail\ContactNotification;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $contacts = Contact::all([
            'id',
            'email',
            'firstname',
            'lastname',
            'street',
            'housenumber',
            'zip',
            'city'
        ]);
        return response()->json($contacts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // assuming german zip codes only
        $request->validate([
            'email' => 'required|email|unique:contacts',
            'firstname' => 'required',
            'lastname' => 'required',
            'zip' => 'nullable|regex:/\b\d{5}\b/'
        ]);

        $contact = Contact::create($request->post());

        Mail::to($contact->email)->send(new ContactNotification($contact));

        return response()->json([
            'message' => 'Contact created successfully',
            'contact' => $contact
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return JsonResponse
     */
    public function destroy(Contact $contact): JsonResponse
    {
        $contact->delete();
        return response()->json([
            'message' => 'Contact deleted successfully!'
        ]);
    }
}
