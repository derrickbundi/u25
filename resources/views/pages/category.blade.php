@extends('layouts.main')
@section('title', $cat->name)
@section('body')
<section class="block-wrapper mt-15 category-layout-5">
    <div class="container">
        <div class="mb-30">
            <div class="ts-grid-box">
                <ol class="ts-breadcrumb">
<li><a href="{{ route('landing') }}">Home</a></li>
<li><a href="/{{ strtolower($cat->name) }}">{{ $cat->name }}</a></li>
</ol>
<div class="clearfix entry-cat-header">
    <h2 class="ts-title float-left">
Category: <span>{{ $cat->name }}</span> </h2>
</div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
@forelse ($blogs as $blog)
<div class="col-md-6 mb-30">
    <div
        class="grid-md post-1260 post type-post status-publish format-video has-post-thumbnail hentry category-money tag-business post_format-post-format-video">
        <div
class="item post-content-box post-1260 post type-post status-publish format-video has-post-thumbnail hentry category-money tag-business post_format-post-format-video">
            <div class="ts-post-thumb">
<a
href="#">
                    @if($blog->image != null)
                    <img src="{{ asset('Images/'.$blog->image) }}" alt="{{ $blog->title }}">
                    @else<img src="{{ asset('video_cover.jpeg') }}" alt="{{ $blog->title }}">
                    @endif
                </a>
            </div>
<div class="post-content">
<a class="post-cat no-bg" href="index.html" style="color:#005689">
                    {{ @$blog->tags[0]->name }} </a>
<h3 class="post-title">
                    <a
href="#">{{ $blog->title }}</a>
                </h3>
<span class="post-date-info">
                    <i class="fa fa-clock-o"></i>{{ $blog->created_at->format('d-m-Y') }} </span>
                </div>
                </div>
                </div>
                </div>
@empty
<div class="col-lg-12">
    <p class="text-center">Oops, no blog found in this category.</p>
</div>
@endforelse
                    <div class="col-lg-12 mb-30">
</div>
                </div>
                <div class="ts-pagination text-center mb-20">
{{ $blogs->links() }}
{{-- <ul class="pagination">
                        <li class="active"><a href="index.html">1</a></li>
                        <li><a href="page/2/index.html">2</a></li>
                        <li><a href="page/2/index.html"><i class="fa fa-long-arrow-right"></i></a></li>
</ul> --}}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="right-sidebar">
                    <div id="sidebar-right" class="right-sidebar">
                        <div id="apsc_widget-2" class="widgets ts-grid-box widget_apsc_widget">
                            <h4 class="widget-title">Follow Us</h4>
                            <div class="apsc-icons-wrapper clearfix apsc-theme-2 ">
                                <div class="apsc-each-profile">
                                    <a class="apsc-facebook-icon clearfix" href="https://facebook.com/" target="_blank">
                                        <div class="apsc-inner-block">
                                            <span class="social-icon"><i
                                                    class="fab fa-facebook-f apsc-facebook"></i><span
                                                    class="media-name">Facebook</span></span>
                                            <span class="apsc-count">12K</span><span class="apsc-media-type">Fans</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="apsc-each-profile">
<a class="apsc-twitter-icon clearfix" href="#"
                                        target="_blank">
                                        <div class="apsc-inner-block">
                                            <span class="social-icon"><i class="fab fa-twitter apsc-twitter"></i><span
                                                    class="media-name">Twitter</span></span>
                                            <span class="apsc-count">0</span><span
                                                class="apsc-media-type">Followers</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="apsc-each-profile">
                                </div>
                                <div class="apsc-each-profile">
<a class="apsc-instagram-icon clearfix" href="#"
                                        target="_blank">
                                        <div class="apsc-inner-block">
                                            <span class="social-icon"><i
                                                    class="apsc-instagram fab fa-instagram"></i><span
                                                    class="media-name">Instagram</span></span>
                                            <span class="apsc-count">0</span><span
                                                class="apsc-media-type">Followers</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="apsc-each-profile">
                                    <a class="apsc-youtube-icon clearfix"
href="#" target="_blank">
                                        <div class="apsc-inner-block">
                                            <span class="social-icon"><i class="apsc-youtube fab fa-youtube"></i><span
                                                    class="media-name">Youtube</span></span>
                                            <span class="apsc-count">843</span><span
                                                class="apsc-media-type">Subscriber</span>
                                        </div>
                                    </a>
</div>
                            </div>
                        </div>
                        <div id="vinkmag_latest_post_tab_widget-2"
                            class="widgets ts-grid-box vinkmag_latest_post_tab_widget">
                            <div class="post-list-item widgets grid-no-shadow">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation">
                                        <a class="active" href="#home" aria-controls="home" role="tab"
                                            data-toggle="tab">
                                            <i class="fa fa-clock-o"></i>
EVENTS </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                                            <i class="fa fa-heart"></i>
                                            RECENT </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active ts-grid-box post-tab-list" id="home">
@foreach ($events as $event)
                                        <div class="post-content media">
<img class="d-flex sidebar-img" src="{{ asset('Images/'.$event->image) }}" alt="{{ $event->title }}">
<div class="media-body">
    <span class="post-tag">
<a href="#" style="color:#005689">
    {{ $event->category->name }} </a>
</span>
<h4 class="post-title">
<a href="#">{{ $event->title }}</a>
</h4>
</div>
</div>
@endforeach
                                    </div>
                                    <div role="tabpanel" class="tab-pane ts-grid-box post-tab-list" id="profile">
@forelse ($four as $data)
<div class="post-content media">
@if($data->image != null)
<img class="d-flex sidebar-img" src="{{ asset('Images/'.$data->image) }}" alt="{{ $data->title }}">
@else
<img class="d-flex sidebar-img" src="{{ asset('video_cover.jpeg') }}" alt="{{ $item->title }}">
@endif
<div class="media-body">
    <span class="post-tag">
<a href="#" style="color:#005689">{{ $data->category->name }}</a>
</span>
<h4 class="post-title">
<a href="#">{{$data->title}}</a>
</h4>
</div>
</div>
@empty
<p>Oops, no recent blog found.</p>
@endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
{{-- <div id="media_image-2" class="widgets ts-grid-box widget_media_image"><a href="#"><img
                                    width="255" height="353"
                                    src="../../wp-content/uploads/sites/2/2018/10/sidebar-banner4.jpg"
                                    class="image wp-image-21  attachment-full size-full" alt="" loading="lazy"
                                    style="max-width: 100%; height: auto;"
                                    srcset="https://demo.xpeedstudio.com/vinkmag/business/wp-content/uploads/sites/2/2018/10/sidebar-banner4.jpg 255w, https://demo.xpeedstudio.com/vinkmag/business/wp-content/uploads/sites/2/2018/10/sidebar-banner4-217x300.jpg 217w"
sizes="(max-width: 255px) 100vw, 255px" /></a></div> --}}
                        <div id="vinkmag-category-list-2" class="widgets ts-grid-box vinkmag-category-list">
                            <h4 class="widget-title"> Categories</h4>
                            <div class="widgets_category">
                                <ul class="category-list">
@foreach ($categories as $cec)
<li class="active-ca"><a href="/{{ strtolower($cec->name) }}">{{ $cec->name }}</a><span
                                            style="color:#ffffff;background-color:#005689;border-left-color:#005689"
class="post-count">{{ $cec->blogs_count }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection