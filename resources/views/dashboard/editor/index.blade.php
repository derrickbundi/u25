@extends('layouts.dashboard.main')
@section('title', 'Dashboard')
@section('body')
<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">
                                Registered users for events
                            </h6>
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
                            <button class="btn btn-outline-danger mr-2" type="button">not approved</button>
                            @else
                            <button class="btn btn-outline-success mr-2" type="button">approved</button>
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