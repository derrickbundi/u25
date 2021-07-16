@extends('layouts.dashboard.main')
@section('title', 'SMS')
@section('body')
<div class="row">
    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <h6 class="card-title mb-0">
                        SMS
                    </h6>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Code</th>
                                <th>Body</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($smses as $sms)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <button class="btn btn-outline-success" data-toggle="modal"
                                        data-target="#edit_sms_{{ $sms->id }}">
                                        <i data-feather="edit" class="icon-sm"></i>
                                    </button>
                                </td>
                                <td>{{ $sms->code }}</td>
                                <td>{{ $sms->body }}</td>
                            </tr>
                            <div class="modal close_modal" id="edit_sms_{{ $sms->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="border-radius:0px;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"
                                                style="text-transform: uppercase;">
                                                SMS Code | {{ $sms->code }}
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('dashboard.edit_sms', base64_encode($sms->id)) }}"
                                                method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                                        <textarea name="body" rows="7"
                                                            style="width: 100%;">{{ $sms->body }}</textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-success btn-block"
                                                    style="height: 42px;">EDIT</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
@endsection