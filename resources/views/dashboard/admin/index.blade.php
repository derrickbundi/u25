@extends('layouts.dashboard.main')
@section('title', 'Dashboard')
@section('body')
<div class="row">
    <div class="col-md-8">
        <div class="row flex-grow">
            <div class="col-md-4 grid-margin stretc-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">
                                Blogs
                            </h6>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-12">
                                <h4 class="mb-2 mt-3">{{ $blogs }}</h4>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <i data-feather="pocket" class="icon-md"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretc-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">
                                Users
                            </h6>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-12">
                                <h4 class="mb-2 mt-3">{{ $users }}</h4>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <i data-feather="users" class="icon-md"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretc-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">
                                Events
                            </h6>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-12">
                                <h4 class="mb-2 mt-3">{{ $events->count() }}</h4>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <i data-feather="activity" class="icon-md"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">
                                Registered users for events
                            </h6>
                            <form action="" method="POST" class="form-inline">
                            <select name="event_id" style="height: 42px;">
                            <option selected data-default disabled>Select Event</option>
                            @foreach ($events as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            </select>
                            <select name="event_id" style="height: 42px;" class="ml-2">
                                <option selected data-default disabled>Select Type</option>
                                <option value="1">SMS</option>
                                <option value="2">Email</option>
                            </select>
                            <button type="submit" class="btn btn-outline-success ml-2" style="height: 42px;">
                                Send <i data-feather="arrow-right" class="icon-md"></i>
                            </button>
                        </form>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="event">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Event Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Id No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        @foreach($events as $event)
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">
                        {{ $event->start_date->format('d-m-Y') }} - {{ $event->end_date->format('d-m-Y') }}
                    </h6>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-12">
                        <img src="{{ asset('Images/'.$event->image) }}" alt="" style="width: 100%;height:150px;">
                        <hr>
                        <div class="form-inline">
                            <button class="btn btn-outline-info mr-2">
                                <i data-feather="arrow-up-right" class="icon-md"></i>0
                            </button>
                            @if($event->is_active == false)
                            <form action="{{ route('dashboard.approve_event',$event->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-danger mr-2" type="submit">not approved</button>
                            </form>
                            @else
                            <form action="{{ route('dashboard.hold_event',$event->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-success mr-2" type="submit">approved</button>
                            </form>
                            @endif
                            <a href="{{ route('dashboard.view_event',base64_encode($event->id)) }}">
                                <button class="btn btn-outline-success">
                                    <i data-feather="eye" class="icon-md"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @endforeach
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#event').DataTable({
        "drawCallback": function(settings) {
        feather.replace()
        }
        })
    });
</script>
@endsection