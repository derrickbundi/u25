@extends('layouts.dashboard.main')
@section('title', $blog->title)
@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <h6 class="card-title mb-0" style="text-transform: uppercase;">
                        {{ $blog->category->name }}
                    </h6>
                    <div class="float-right">
                        @foreach ($blog->tags as $tag)
                            <span class="badge badge-success">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
                <br>
                <div>
                    @if($blog->image != null)
                    <img src="{{ asset('Images/'.$blog->image) }}" alt="" style="width: 100%;height:300px;">
                    @else
                    <iframe src="{{ asset('Videos/'.$blog->video.'?autoplay=0?controls=1') }}" style="width: 100%;height:250px;" frameborder="0"></iframe>
                    {{-- <video src="{{ asset('Videos/'.$blog->video) }}" style="width:100%; height:200px;"></video> --}}
                    @endif
                </div>
                <hr>
                <div>
                    <h5>Blog Description</h5>
                    <p style="text-align:justify;">{{ $blog->body }}</p>
                </div>
                <hr>
                <div class="form-inline">
                    <!-- action button -->
                    <a href="{{ url()->previous() }}">
                        <button class="btn btn-outline-info mr-2">&nbsp;<<&nbsp;GO BACK</button>
                    </a>
                    @can('admin-show')
                    @if($blog->verified == true)
                    <form action="{{ route('blog_unverify',base64_encode($blog->id)) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-warning mr-2">
                            Deactivate
                        </button>
                    </form>
                    @else
                    <form action="{{ route('blog_verify',base64_encode($blog->id)) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-success mr-2">
                            Activate
                        </button>
                    </form>
                    @endif
                    @endcan
                    @can('editor-show')
                    @if($blog->verified == true)
                    <span class="btn btn-success mr-2">active</span>
                    @else
                    <span class="btn btn-warning mr-2">not activated</span>
                    @endif
                    @endcan                    
                    <form action="#">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger mr-2">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection