<?php

namespace App\Services;

use App\Models\Flight;
use App\Models\Pilot;

class BookingService
{
    /**
     * This method will attempt to make a booking for a pilot
     *
     * @param Pilot $pilot
     * @param Flight $flight
     * @return bool If booking was successful will return true
     */
    public function bookFlight(Pilot $pilot, Flight $flight)
    {
        if ($flight->isBooked()) {
            return false;
        }

        if ($pilot->bookings()->save($flight)) {
            return true;
        }

        return false;
    }
}