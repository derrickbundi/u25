@extends('layouts.dashboard.main')
@section('title', 'Blogs')
@section('body')
<link rel="stylesheet" type="text/css" href="{{asset('/datetime/jquery.datetimepicker.css')}}" />
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('add_blog') }}">
                    <button class="btn btn-success float-right" style="margin:2px;">
                        ADD BLOG <i data-feather="plus" class="icon-sm"></i>
                    </button>
                </a>
                <button class="btn btn-success float-right" style="margin:2px;" data-toggle="modal" data-target="#add_event">
                    <i data-feather="plus" class="icon-sm"></i>&nbsp;ADD EVENT
                </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">
                                Blogs ({{ $blogs->count() }})
                            </h6>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="seasons">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Date Added</th>
                                        <th>Status</th>
                                        <th>View</th>
                                        @can('admin-show')
                                        <th>Action</th>
                                        @endcan
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $item)
@php
if($item->active == true):
$color = 'beige';
else:
$color = '';
endif
@endphp
<tr style="background-color: {{ $color }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($item->image != null)
                                                <img src="{{ asset('Images/'.$item->image) }}" alt="">
                                                @else
                                                <img src="{{ asset('video_cover.jpeg') }}" alt="">
                                                @endif
                                            </td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ substr($item->body,0,15) }}...</td>
                                            <td>{{ @$item->category->name }}</td>
                                            <td>{{ $item->created_at->format('m-d-Y') }}</td>
                                            <td>
                                                @if($item->verified == true)
<span class="badge badge-success">verified</span>
                                                @else
<span class="badge badge-warning">no verified</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('view_blog', base64_encode($item->id)) }}">
                                                    <button class="btn btn-outline-info form-inline"><i data-feather="eye" class="icon-md"></i></button>
                                                </a> 
                                                <a href="{{ route('blog_edit',base64_encode($item->id)) }}">
                                                    <button class="btn btn-outline-success form-inline"><i data-feather="edit" class="icon-md"></i></button>
                                                </a>                                         
                                            </td>        
                                            @can('admin-show')                                    
                                            <td>                                                
                                                @if($item->verified == true)
                                                <form action="{{ route('blog_unverify',base64_encode($item->id)) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-warning"><i data-feather="lock" class="icon-md"></i></button>
                                                </form>
                                                @else
                                                <form action="{{ route('blog_verify',base64_encode($item->id)) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-success"><i data-feather="unlock" class="icon-md"></i></button>
                                                </form>
                                                @endif                                                
                                            </td>
                                            @endcan
<td>
<form action="{{ route('dashboard.make_active',$item->id) }}" method="POST">
                                                    @csrf
<button type="submit" class="btn btn-outline-warning"><i data-feather="loader" class="icon-md"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal -->
<div class="modal close_modal" id="add_event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:0px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-transform: uppercase;">
                    Add Event
                </h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.add_event') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label>Event Name*</label>
                            <input type="text" name="name" {{ $errors->cood->has('name') ? 'has-error' : '' }} required
                                style="height:42px;" class="form-control" placeholder="Event Name*">
                            <small class="text-danger">{{$errors->cood->first('name')}}</small>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Event Image</label>
                            <input type="file" name="image" style="height:42px;" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
<div class="col-md-12">
    <label>Select Category</label>
    <select class="form-control" style="height: 42px;" name="category">
        <option selected data-default disabled>Select Category</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
</div>
<br>
<div class="row">
                        <div class="col-md-6 {{$errors->has('start_date') ? 'has-error' : ''}}">
                            <label>Start Date *</label>
                            <input type="text" name="start_date" style="height:42px;" value="{{ old('start_date') }}" class="form-control"
                                id="start_date">
                            <small class="text-danger">{{$errors->first('start_date')}}</small>
                        </div>
                        <div class="col-md-6 {{$errors->has('end_date') ? 'has-error' : ''}}">
                            <label>End Date (Optional)</label>
                            <input type="text" name="end_date" style="height:42px;" value="{{ old('end_date') }}" class="form-control"
                                id="end_date">
                            <small class="text-danger">{{$errors->first('end_date')}}</small>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 {{$errors->has('description') ? 'has-error' : ''}}">
                            <label>Event Description</label>
                            <textarea name="description" required style="width:100%;" rows="4"></textarea>
                            <small class="text-danger">{{$errors->first('description')}}</small>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success btn-block"
                        style="height: 42px;text-transform:uppercase;">Add Event</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#seasons').DataTable({
        "drawCallback": function(settings) {
        feather.replace()
        }
        })
    });
</script>
<script>
    $(document).ready(function () {
        $('#start_date').datetimepicker({
            timepicker: true,
            datepicker: true,
        })
        $('#end_date').datetimepicker({
        timepicker: true,
        datepicker: true,
        })
    })
</script>
@endsection