@extends('template.template')
@section('load_assets')
    <script src="{{url('js/events.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection
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
                    <div class="" style="display: inline-block; margin-top: 10px;">
                        <div class="col-md-12" >
                            <div class="portlet-body form">
                                <form method="get" action="{{url()->current()}}">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" id="title" value="{{request('title')}}" class="form-control title" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input type="text" name="description" id="description" value="{{request('description')}}" class="form-control description" />
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="event_starts_at">Events starts</label>
                                                    <input type="text" name="event_starts_at" id="event_starts_at" value="{{request('event_starts_at')}}" class="form-control event_starts_at datepicker" />
                                                </div>
                                            </div><div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="event_ends_at">Event ends</label>
                                                    <input type="text" name="event_ends_at" id="event_ends_at" value="{{request('event_ends_at')}}" class="form-control event_ends_at datepicker" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 btn-same-line">
                                                <button type="submit" class="btn btn-success" title="Search">
                                                    <i class="fa fa fa-search" style="padding-right: 5px;"></i>Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="event-list">
                        <div style="margin-bottom: 10px; display: flow-root">
                            {{csrf_field()}}
                            <span class="event-list-span"><i class="fa fa-calendar"></i> Event list</span>
                            <a style="float: right;margin-right:5px;" class="btn btn-dark new-event" href="{{route('events_add')}}"><i class="fa fa-plus"></i> Add Event</a>
                            <span style="float: right;margin-right:5px;" class="btn btn-primary btn-file import-event">
                                <i class="fa fa-file-excel"></i> Import CSV <input data-href="{{route('import_csv')}}" name="file_csv" id="file_csv" type="file">
                            </span>
                        </div>
                        <div class="portlet-body">
                            <div class="table-div">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <caption>
                                        <span>Total: {{$events->total()}}</span>
                                    </caption>
                                    <thead>
                                    <tr>
                                        <th class="" width="">Title</th>
                                        <th class="text-center" width="">Description</th>
                                        <th class="text-center" width="">Event starts</th>
                                        <th class="text-center" width="">Event ends</th>
                                        <th class="text-center" width="">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($events as $event)
                                        <tr>
                                            <td>{{$event['title']}}</td>
                                            <td class="text-center">{{$event['description']}}</td>
                                            <td class="text-center">{{$event['event_starts_at']}}</td>
                                            <td class="text-center">{{$event['event_ends_at']}}</td>
                                            <td class="text-center">
                                                <button data-href="{{route('events_view', ['id_event' => $event['id']])}}" class="bt_edit btn-primary btn-sm" title="Edit"><i class="fa fa-pencil-alt"></i></button>
                                                <button data-href="{{route('events_delete', ['id_event' => $event['id']])}}" data-id-event="{{$event['id']}}" class="bt_delete btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {{$events->appends(request()->input())->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
