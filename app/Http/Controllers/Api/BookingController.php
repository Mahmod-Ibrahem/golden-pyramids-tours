<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingListResource;
use App\Http\Resources\BookingResource;
use App\Models\TourBooking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $SortField = request('sortField', 'created_at');
        $SortDirection = request('sortDirection', 'asc');
        $search = request('search');
        $perPage = request('perPage', 10);
        $bookings = TourBooking::query()->with('tour')->orderBy($SortField, $SortDirection);
        if ($search) {
            $bookings->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('phone', 'LIKE', "%$search%");
            });
        }
        return BookingListResource::collection($bookings->paginate($perPage));
    }

    public function show(string $id)
    {
        $booking = TourBooking::with('tour')->find($id);
        return $booking ? new BookingResource($booking) : response()->json(['message' => 'Booking not found'], 404);
    }

    public function update(Request $request, string $id)
    {
        $booking = TourBooking::find($id);
        return $booking ? $booking->update($request->all()) : response()->json(['message' => 'Booking not found'], 404);
    }

    public function destroy(string $id)
    {
        $booking = TourBooking::find($id);
        return $booking ? $booking->delete() : response()->json(['message' => 'Booking not found'], 404);
    }
}
