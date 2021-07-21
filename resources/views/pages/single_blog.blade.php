@extends('layouts.main')
@section('title', $blog->title)
@section('body')
<div id="content" class="post-layout-1 has-thumbnail">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('landing') }}">Home</a></li>
            <li><a href="/{{ strtolower($blog->category->name) }}">{{ $blog->category->name }}</a></li>
            <li><a
                    href="/{{ strtolower($blog->category->name) }}/{{ $blog->created_at->format('Y') }}/{{ $blog->created_at->format('m') }}/{{ $blog->slug }}">{{ $blog->title }}</a>
            </li>
        </ol>
        @if ($blog->image != null)
        <div class="single-big-img mb-30" style="background-image: url({{ asset('Images/'.$blog->image) }})"></div>
        @else
        <div class="single-big-img mb-30">
            <iframe src="{{ asset('Videos/'.$blog->video.'?autoplay=0?controls=1') }}" frameborder="0"
                width="100%"></iframe>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-9">
                <div class="single-post-wrapper">
                    <div class="ts-grid-box vinkmag-single content-wrapper">
                        <div class="entry-header">
                            <div class="category-name-list">
                                <a href="#" class="post-cat"
                                    style="color:#ffffff; background-color:#005689; border-left-color:#005689">
                                    {{ $blog->category->name }} </a>
                            </div>
                            <h1 class="post-title lg">{{ $blog->title }}</h1>
                            <ul class="post-meta-info">
                                <li class="author">
                                    <a href="#">
                                        <img alt='' src='{{ asset('crownstar/uploads/sites/2/2018/10/user2.png') }}'
                                            class='avatar avatar-96 photo' height='96' width='96' />
                                        Editor </a>
                                </li>
                                <li>
                                    <i class="fa fa-clock-o"></i>
                                    {{ $blog->created_at->format('d-m-Y') }}</li>
                                <li>
                                    <i class="fa fa-comments"></i>
                                    No Comments </li>
                                <li class="active">
                                    <i class="icon-fire"></i>
                                    12 </li>
                                <li class="social-share-post">
                                    <span class="share-post"><i class="fa fa-share"></i></span>
                                    <ul class="social-list version-2">
                                        <li><a class="facebook" href="#" target="_blank"><i
                                                    class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#" target="_blank"><i
                                                    class="fa fa-twitter"></i></a></li>
                                        <li><a class="linkedin" href="#" target="_blank"><i
                                                    class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <i class='fa fa-eye'></i>3 minute read </li>
                        </div>
                        <div class="post-content-area">
                            <article id="post-192"
                                class=" post-details post-192 post type-post status-publish format-standard has-post-thumbnail hentry category-money tag-business tag-money">
                                <div class="post-body clearfix">

                                    <div class="entry-content clearfix" style="text-align:justify;">
                                        <p>{{ $blog->body }}</p>
                                    </div>
                                </div>
                            </article>
                            <div class="tagcloud mb-30 post-tag-colud">
                                <strong>Tags</strong>:
                                @foreach ($blog->tags as $tag)
                                <a href="#" rel="tag">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                            <p>
                            </p>

                            <div class="author-box">
                                <img alt='' src='{{ asset('crownstar/uploads/sites/2/2018/10/user2.png') }}'
                                    class='avatar avatar-96 photo' height='96' width='96' loading='lazy' />
                                <div class="author-info">
                                    <h4 class="author-name">Editor</h4>
                                    <p></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            {{-- <div class="post-navigation clearfix">
                                <div class="post-previous float-left">
                                </div>
                                <div class="post-next float-right">
                                    <a
                                        href="../../../../2018/01/07/success-is-not-a-good-teacher-failure-makes-you-humble/index.html">
                                        <span>Read Next</span>
                                        <p>Success is not a good teacher failure makes you humble</p>
                                    </a>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                    <div id="comments" class="comments-form ts-grid-box">
                        <div id="respond" class="comment-respond">
                            <h3 id="reply-title" class="comment-reply-title">Leave a Comment <small><a rel="nofollow"
                                        id="cancel-comment-reply-link" href="index.html#respond"
                                        style="display:none;">Cancel Comment</a></small></h3>
                            <form action="h#" method="post" id="commentform" class="comment-form">
                                <p class="comment-notes"><span id="email-notes">Your email address will not be
                                        published.</span> Required fields are marked <span class="required">*</span></p>
                                <div class="comment-info row">
                                    <div class="col-md-6 pr-10"><input placeholder="Enter Name" id="author"
                                            class="form-control" name="author" type="text" value="" size="30"
                                            aria-required='true' /></div>
                                    <div class="col-md-6 pl-10">
                                        <input Placeholder="Enter Email" id="email" name="email" class="form-control"
                                            type="email" value="" size="30" aria-required='true' /></div>
                                    <div class="col-md-12"><input Placeholder="Enter Website" id="url" name="url"
                                            class="form-control" type="url" value="" size="30" /></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <textarea class="form-control" Placeholder="Enter Comments" id="comment"
                                            name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <p class="form-submit"><input name="submit" type="submit" id="submit"
                                        class="btn-comments btn btn-primary" value="Post Comment" /> <input
                                        type='hidden' name='comment_post_ID' value='192' id='comment_post_ID' />
                                    <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="ts-grid-box">
                        <h2 class="ts-title">Most Popular</h2>
                        <div class="popular-grid-slider owl-carousel">
                            @foreach ($others as $other)
                            <div class="item">
                                <a class="post-cat" href="#"
                                    style="color:#ffffff; background-color:#005689; border-left-color:#005689">
                                    {{ $other->category->name }} </a>
                                <div class="ts-post-thumb">
                                    <a href="#">
                                        @if($other->image != null)
                                        <img class="img-fluid" src="{{ asset('Images/'.$other->image) }}"
                                            alt="{{ $other->title }}">
                                        @else
                                        <img class="img-fluid" src="{{ asset('video_cover.jpeg') }}"
                                            alt="{{ $other->title }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="index.html">{{ $other->title }}</a>
                                    </h3>
                                    <span class="post-date-info">
                                        <i class="fa fa-clock-o"></i>
                                        {{ $other->created_at->format('d-m-Y') }} </span>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div id="sidebar-right" class="right-sidebar">
                    <div id="apsc_widget-2" class="widgets ts-grid-box widget_apsc_widget">
                        <h4 class="widget-title">Follow Us</h4>
                        <div class="apsc-icons-wrapper clearfix apsc-theme-2 ">
                            <div class="apsc-each-profile">
                                <a class="apsc-facebook-icon clearfix" href="https://facebook.com/" target="_blank">
                                    <div class="apsc-inner-block">
                                        <span class="social-icon"><i class="fab fa-facebook-f apsc-facebook"></i><span
                                                class="media-name">Facebook</span></span>
                                        <span class="apsc-count">12K</span><span class="apsc-media-type">Fans</span>
                                    </div>
                                </a>
                            </div>
                            <div class="apsc-each-profile">
                                <a class="apsc-twitter-icon clearfix" href="https://twitter.com/xpeedstudio"
                                    target="_blank">
                                    <div class="apsc-inner-block">
                                        <span class="social-icon"><i class="fab fa-twitter apsc-twitter"></i><span
                                                class="media-name">Twitter</span></span>
                                        <span class="apsc-count">0</span><span class="apsc-media-type">Followers</span>
                                    </div>
                                </a>
                            </div>
                            <div class="apsc-each-profile">
                            </div>
                            <div class="apsc-each-profile">
                                <a class="apsc-instagram-icon clearfix" href="https://instagram.com/xpeeder"
                                    target="_blank">
                                    <div class="apsc-inner-block">
                                        <span class="social-icon"><i class="apsc-instagram fab fa-instagram"></i><span
                                                class="media-name">Instagram</span></span>
                                        <span class="apsc-count">0</span><span class="apsc-media-type">Followers</span>
                                    </div>
                                </a>
                            </div>
                            <div class="apsc-each-profile">
                                <a class="apsc-youtube-icon clearfix"
                                    href="https://www.youtube.com/channel/UCJp-j8uvirVgez7TDAmfGYA" target="_blank">
                                    <div class="apsc-inner-block">
                                        <span class="social-icon"><i class="apsc-youtube fab fa-youtube"></i><span
                                                class="media-name">Youtube</span></span>
                                        <span class="apsc-count">843</span><span
                                            class="apsc-media-type">Subscriber</span>
                                    </div>
                                </a>
                            </div>
                            <div class="apsc-each-profile">
                                <a class="apsc-dribble-icon clearfix" href="https://dribbble.com/xpeedstudio"
                                    target="_blank">
                                    <div class="apsc-inner-block">
                                        <span class="social-icon"><i class="apsc-dribbble fab fa-dribbble"></i><span
                                                class="media-name">dribble</span></span>
                                        <span class="apsc-count"></span><span class="apsc-media-type">Followers</span>
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
                                    <a class="active" href="#home" aria-controls="home" role="tab" data-toggle="tab">
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
                                        <img class="d-flex sidebar-img" src="{{ asset('Images/'.$event->image) }}"
                                            alt="{{ $event->title }}">
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
                                        <img class="d-flex sidebar-img" src="{{ asset('Images/'.$data->image) }}"
                                            alt="{{ $data->title }}">
                                        @else
                                        <img class="d-flex sidebar-img" src="{{ asset('video_cover.jpeg') }}"
                                            alt="{{ $data->title }}">
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
                    {{-- <div id="media_image-2" class="widgets ts-grid-box widget_media_image"><a href="#"><img width="255"
                                height="353" src="../../../../wp-content/uploads/sites/2/2018/10/sidebar-banner4.jpg"
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
@endsection