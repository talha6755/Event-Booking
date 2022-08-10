<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id ?? "1";

        $allEvents = Event::where("user_id", $user_id)->with(["categories", "users"])->get();

        return response()->json([
            "status" => "200",
            "message" => "All Events",
            "data" =>  $allEvents,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            "category_id" => "required",
            "event_name" => "required",
            "event_address"=> "required",
            "no_of_attendres" => "required",
            "price" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "start_time" => "required",
            "end_time" => "required",
            "publication_status" => "required",
            "cover_image" => "required",
            "description" => "required",
        ]);

        $user_id = Auth::user()->id ?? "1"; // to update only the user who is logged in from users

        $insertevent = Event::create([

            "user_id" => $user_id,
            "category_id" => $request->category_id,
            "event_name" => $request->event_name,
            "event_address" => $request->event_address,
            "no_of_attendres" => $request->no_of_attendres,
            "price" => $request->price,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "start_time" => $request->start_time,
            "end_time" => $request->end_time,
            "publication_status" => $request->publication_status,
            "cover_image" => $request->cover_image,
            "description" => $request->description,

        ]);

        return response()->json([
            "status" => "200",
            "message" => "Events Saved Successfully",
            "data" =>  $insertevent,
        ]);
    }

    public function edit($id)
    {
        $editevent = Event::find($id);

        return response()->json([
            "status" => "200",
            "message" => " Selected Event Edited Successfully",
            "data" =>  $editevent,
        ]);
    }

    public function update(Request $request)
    {
        $updateevent = Event::find($request->id);
        $updateevent ->event_name=$request->event_name;
        $updateevent->update();

        return response()->json([
            "status" => "200",
            "message" => "Selected Event Updated Successfuly"
        ]);

    }

    public function destroy($id){

        $event = Event::find($id);
        $event->delete();

        return response()->json([
            "status" => "200",
            "message" => "Selected Event Deleted Successfuly",
        ]);
   }

}


