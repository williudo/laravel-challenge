@extends('template.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="display: contents">
                <div class="sidebar col-md-3">
                    <a class="btn @if(request()->path() == 'events') btn-primary @else btn-outline-primary @endif  btn-block link" href="{{route('events')}}">All events</a>
                    <a class="btn @if(request()->path() == 'events/next_days') btn-primary @else btn-outline-primary @endif btn-block link" href="{{route('events_next_days')}}">Events in next 5 days</a>
                    <a class="btn @if(request()->path() == 'events/today') btn-primary @else btn-outline-primary @endif btn-block link" href="{{route('events_today')}}">Today events</a>
                </div>
                <div class="content-data col-md-9">
                    <div class="col-md-12 event-list">
                        <div class="">
                            <span class="event-list-span"><i class="fa fa-calendar"></i> Event list</span>
                            <a style="float: right" class="btn btn-dark new-event" href="{{route('events_add')}}"><i class="fa fa-plus"></i> Add Event</a>
                        </div>
                        @if(isset($events))
                            @foreach($events as $e)
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
