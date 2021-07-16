@extends('layouts.dashboard.main')
@section('title', 'Edit Blog')
@section('body')
<link rel="stylesheet" type="text/css" href="{{asset('/datetime/jquery.datetimepicker.css')}}" />
<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
<div class="row">
    <div class="col-md-10 offset-md-1">
        <form action="{{ route('post_edit_blog',base64_encode($blog->id)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <legend>
                        <h6 style="text-transform: uppercase;">Blog Information</h6>
                    </legend>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 {{$errors->has('title') ? 'has-error' : ''}}">
                            <label>Blog Title *</label>
                            <input type="text" name="title" style="height:42px;" value="{{ $blog->title }}" required
                                class="form-control">
                            <small class="text-danger">{{$errors->first('title')}}</small>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 {{$errors->has('schedule_date') ? 'has-error' : ''}}">
                            <label>Schedule Diplay Time (Optional)</label>
                            <input type="text" name="schedule_date" style="height:42px;"
                                value="{{ $blog->schedule_date }}" class="form-control" id="depart1">
                            <small class="text-danger">{{$errors->first('schedule_date')}}</small>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Select Image [<b>{{ $blog->image }}</b>]</label>
                            <input type="file" name="image" style="height:42px;" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Select Video [<b>{{ $blog->video }}</b>]</label>
                            <input type="file" name="video" style="height:42px;" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Select Category [<b>{{ $blog->category->name }}</b>]</label>
                            <select class="form-control" style="height: 42px;" name="category_id" required>
                                <option selected data-default disabled>Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Select Tag [ @foreach($blog->tags as $tag) <span class="badge badge-success">{{ $tag->name }}</span> @endforeach ]</label>
                            <select name="tags[]" class="form-control" style="height: 42px;">
                                <option selected data-default disabled>Select Tag</option>
                                @foreach ($tags as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 {{$errors->has('description') ? 'has-error' : ''}}">
                            <label>Blog Description*</label>
                            <textarea name="description" required>{{ $blog->body }}</textarea>
                            <small class="text-danger">{{$errors->first('description')}}</small>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success btn-block" type="submit" style="height: 42px;">EDIT
                                BLOG</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        menubar: false,
        plugins: 'link code',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
</script>
<script>
    $(document).ready(function () {
        $('#depart1').datetimepicker({
            timepicker: false,
            datepicker: true,
            format: 'Y-m-d'
        })
    })
</script>
@endsection