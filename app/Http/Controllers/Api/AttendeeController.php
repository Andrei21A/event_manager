<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttendeeResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AttendeeController extends Controller
{

    use CanLoadRelationships;

    private array $relations = ['user'];

    public function index(Event $event)
    {
        $attendees = $this->loadRelationships($event->attendees()->latest());
        return AttendeeResource::collection(
            $attendees->paginate()
        );
    }

    public function store(Request $request, Event $event)
    {
        $attendee = $this->loadRelationships($event->attendees()->create(
            [
                'user_id' => $request->user()->id
            ]
        ));

        return new AttendeeResource($attendee);
    }


    public function show(Event $event, Attendee $attendee)
    {
        return new AttendeeResource($this->loadRelationships($attendee));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, Attendee $attendee)
    {
        if (Gate::denies('delete-attendee', $attendee)) {
            abort(403, 'You are not authorized to delete this attendee');
        }
        $attendee->delete();

        return response(status: 204);
    }
}
