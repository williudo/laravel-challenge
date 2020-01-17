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
                            <span class="event-list-span"><i class="fa fa-calendar"></i> Event Form</span>
                        </div>
                        <form method="post" action="{{route('events_create')}}">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label class="control-label" for="title">Title</label>
                                        <input id="title" name="title" maxlength="50" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label class="control-label" for="description">Description</label>
                                        <input id="description" maxlength="150" name="description" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="control-label" for="event_starts">Event starts</label>
                                        <input id="event_starts" maxlength="10" name="event_starts" type="text" class="form-control datetimepicker">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="control-label" for="event_ends">Event ends</label>
                                        <input id="event_ends" maxlength="10" name="event_ends" type="text" class="form-control datetimepicker">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
