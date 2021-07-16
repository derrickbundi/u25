@extends('layouts.dashboard.main')
@section('title', 'Add Blog')
<link rel="stylesheet" type="text/css" href="{{asset('/datetime/jquery.datetimepicker.css')}}" />
<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('select/css/select2.min.css') }}" type="text/css">
@section('body')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <form action="{{ route('post_blog') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" name="title" style="height:42px;" value="{{ old('title') }}"
                                required class="form-control">
                            <small class="text-danger">{{$errors->first('title')}}</small>
                        </div>
                    </div>
                    <br>
                    <div class="row">                        
                        <div class="col-md-12 {{$errors->has('schedule_date') ? 'has-error' : ''}}">
                            <label>Schedule Diplay Time (Optional)</label>
                            <input type="text" name="schedule_date" style="height:42px;" value="{{ old('schedule_date') }}" class="form-control" id="depart1">
                            <small class="text-danger">{{$errors->first('schedule_date')}}</small>
                        </div>
                    </div>
                    <br>
                    <div class="row"> 
                        <div class="col-md-6">
                            <label>Select Image</label>
                            <input type="file" name="image" style="height:42px;" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Select Video</label>
                            <input type="file" name="video" style="height:42px;" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Select Category</label>
                            <select class="form-control" style="height: 42px;" name="category_id">
                                <option selected data-default disabled>Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Select Tag</label>
                            <select name="tags[]" class="select2 select2-multiple form-control" style="height: 42px;" multiple="">
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
                            <textarea name="description" required></textarea>
                            <small class="text-danger">{{$errors->first('description')}}</small>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success btn-block" type="submit" style="height: 42px;">ADD
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
{{-- <script src="{{asset('select/js/select2.full.min.js')}}" type="text/javascript"> --}}
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
<script>
    $(document).ready(function() {
        $(".select2").select2()
    })          
</script>
@endsection