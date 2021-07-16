@extends('layouts.dashboard.main')
@section('title', $event->name)
@section('body')
<div class="row">
    <div class="col-md-10 offset-md-1">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0" style="text-transform: uppercase;">
                                {{ $event->name }}
                            </h6>
                            <div class="float-right">
                                0
                            </div>
                        </div>
                        <br>
                        <div>
                            <img src="{{ asset('Images/'.$event->image) }}" style="height:300px;width:100%" alt="">
                        </div>
                        <hr>
                        <div>
                            <p style="text-align:justify;">{{ $event->description }}</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0" style="text-transform: uppercase;">
                                Registered users for events
                            </h6>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="event">
                                <thead>
                                    <tr>
                                        <th></th>
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
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0" style="text-transform: uppercase;">
                                {{ $event->start_date->format('d-m-Y') }} - {{ $event->end_date->format('d-m-Y') }}
                            </h6>
                        </div>
                        <br>
                        <div class="form-inline">
                            <a href="{{ url()->previous() }}">
                                <button class="btn btn-outline-info mr-2">&nbsp;<<&nbsp;BACK</button> </a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

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