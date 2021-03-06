<?php

namespace App\Services;

use App\Http\Requests\UpdateEvent;
use App\Models\Event;
use Illuminate\Http\Request;

class EventService
{
    /**
     * This is used during the creation of a new event
     *
     * @param Request $request
     * @return Event
     */
    public function processNewEvent(Request $request)
    {
        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->start_time = $request->start_time;
        $event->end_date = $request->end_date;
        $event->end_time = $request->end_time;

        $event->save();

        return $event;
    }

    public function getAll()
    {
        return Event::all();
    }

    public function getBySlug($slug)
    {
        return Event::whereSlug($slug)->first();
    }

    public function patchEvent(UpdateEvent $request, $slug)
    {
        $event = $this->getBySlug($slug);

        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->start_time = $request->start_time;
        $event->end_date = $request->end_date;
        $event->end_time = $request->end_time;

        $event->save();

        return $event;
    }
}