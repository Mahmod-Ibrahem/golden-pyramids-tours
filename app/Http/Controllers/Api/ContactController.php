<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactLeadRequest;
use App\Http\Resources\ContactLeadsResource;
use App\Models\ContactLead;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $SortField = request('sortField', 'created_at');
        $SortDirection = request('sortDirection', 'asc');
        $search = request('search');
        $perPage = request('perPage', 10);
        $contactLeads = ContactLead::query()->orderBy($SortField, $SortDirection);
        if ($search) {
            $contactLeads->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%");
            });
        }
        return ContactLeadsResource::collection($contactLeads->paginate($perPage));
    }

    public function show(string $id)
    {
        $contactLead = ContactLead::find($id);
        return $contactLead ? new ContactLeadsResource($contactLead) : response()->json(['message' => 'Contact Lead not found'], 404);
    }

    public function update(ContactLeadRequest $request, string $id)
    {
        $contactLead = ContactLead::find($id);
        return $contactLead ? $contactLead->update($request->validated()) : response()->json(['message' => 'Contact Lead not found'], 404);
    }

    public function destroy(string $id)
    {
        $contactLead = ContactLead::find($id);
        return $contactLead ? $contactLead->delete() : response()->json(['message' => 'Contact Lead not found'], 404);
    }
}
