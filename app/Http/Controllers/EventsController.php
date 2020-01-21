<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class EventsController extends Controller
{
    private $items_per_page = 10;

    public function index(){
        $title = 'All events';
        $events = Events::filters()->allEvents()->paginate($this->items_per_page);
        return view('panel.events', compact('title', 'events'));
    }

    public function nextDays($days = 5){
        $title = 'All events in '.$days.' days';
        $events = Events::filters()->nextDays($days)->paginate($this->items_per_page);
        return view('panel.events', compact('title', 'events'));
    }

    public function today($days = 5){
        $title = 'Today events';
        $events = Events::filters()->today()->paginate($this->items_per_page);
        return view('panel.events', compact('title', 'events'));
    }

    public function add(){
        $title = 'Add Event';
        return view('panel.view_event', compact('title'));
    }

    public function edit($id_event){
        $title = 'Edit Event';

        $event = Events::where('id', $id_event)
                       ->where('id_user', Auth::user()->id)
                       ->first();
        return view('panel.view_event', compact('title', 'event'));
    }

    public function delete($id_event){
        $event = Events::where('id', $id_event)
            ->where('id_user', Auth::user()->id)
            ->first();
        $event->delete();

        return $id_event;
    }

    public function submit(Request $request, $id_event = null){
        $this->validate($request, [
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:150',
            'event_starts' => 'required|before_or_equal:event_ends|date_format:d/m/Y',
            'event_ends' => 'required|after_or_equal:event_starts|date_format:d/m/Y',
        ]);

        $event = Events::submit($request, $id_event);
        return redirect()->route('events_view', ['id_event' => $event->id]);

    }

    public function importCsv(Request $request){
        $this->validate($request, [
            'file_csv' => 'required|file'
        ]);

        $file = $request->file_csv;

        Excel::load($file, function($reader) {

            // reader methods
            $results = $reader->get();
            dd($results);
        });
    }

}
