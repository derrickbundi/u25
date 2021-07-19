@extends('layouts.main')
@section('title', 'Home')
@section('body')
<div data-elementor-type="wp-post" data-elementor-id="1242" class="elementor elementor-1242 elementor-bc-flex-widget"
    data-elementor-settings="[]">
    <div class="elementor-inner">
        <div class="elementor-section-wrap">
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-0c0f031 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="0c0f031" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-2748e3f"
                            data-id="2748e3f" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-354bb78 thumbnail-height elementor-widget elementor-widget-vinazine-post-list"
                                        data-id="354bb78" data-element_type="widget"
                                        data-widget_type="vinazine-post-list.default">
                                        <div class="elementor-widget-container">
                                            <div class="ts-grid-item-2  ts-list-post-box ts-grid-content">
                                                <div class="item grid-md ">
                                                    <div class="ts-post-thumb">
                                                        <a href="#">
                                                            <img class="img-fluid"
                                                                src="{{ asset('Images/'.$active->image) }}"
                                                                alt="{{ $active->title }}" style="height: 375px;">
                                                        </a>
                                                    </div>
                                                    <div class="post-content">
                                                        <a class="post-cat" href="#"
                                                            style="color:#ffffff; background-color:#005689; border-left-color:#005689">
                                                            {{ @$active->category->name }} </a>
                                                        <h3 class="post-title">
                                                            <a href="#">{{ $active->title }}</a>
                                                        </h3>
                                                        <ul class="post-meta-info">
                                                            <li>
                                                                <i
                                                                    class="fa fa-clock-o"></i>{{ $active->created_at->format('d-m-Y') }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-ab7acfc"
                            data-id="ab7acfc" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-1088c55 elementor-widget elementor-widget-vinazine-post-grid"
                                        data-id="1088c55" data-element_type="widget"
                                        data-widget_type="vinazine-post-grid.default">
                                        <div class="elementor-widget-container">
                                            <div class="grid-item grid-md grid-no-desc">
                                                <div
                                                    class="ts-grid-box ts-grid-content ts-grid-content-1 post-1263 post type-post status-publish format-video has-post-thumbnail hentry category-gold category-money category-stock tag-business post_format-post-format-video">
                                                    <div class="post-content">
                                                        <a class="post-cat" href="#"
                                                            style="color:#ffffff; background-color:#005689; border-left-color:#005689">
                                                            Event </a>
                                                        <h3 class="post-title">
                                                            <a href="#">{{ $event->name }}</a>
                                                        </h3>
                                                        <p>{{ $event->body }}</p>
                                                        <ul class="post-meta-info">
                                                            <li>
                                                                <span class="post-date-info">
                                                                    <i class="fa fa-clock-o"></i>
                                                                    {{ $event->start_date->format('d-m-Y') }}
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="featured-post">
                                                        <a href="#" class="item link-img"
                                                            style="background-image:url({{ asset('Images/'.$event->image) }})">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-2f18934"
                            data-id="2f18934" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-5061c2c elementor-widget elementor-widget-vinazine-post-list-tab"
                                        data-id="5061c2c" data-element_type="widget"
                                        data-widget_type="vinazine-post-list-tab.default">
                                        <div class="elementor-widget-container">
                                            <div class="post-list-item widgets  ">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li role="presentation">
                                                        <a class="active" href="#home" aria-controls="home" role="tab"
                                                            data-toggle="tab">
                                                            <i class="fa fa-clock-o"></i>
                                                            RECENT </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="#profile" aria-controls="profile" role="tab"
                                                            data-toggle="tab">
                                                            <i class="fa fa-heart"></i>
                                                            EVENTS </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div role="tabpanel"
                                                        class="tab-pane active ts-grid-box post-tab-list" id="home">
                                                        @foreach ($blogs as $blog)
                                                        <div class="post-content media">
                                                            <img class="d-flex sidebar-img"
                                                                src="{{ asset('Images/'.$blog->image) }}"
                                                                alt="{{ $blog->title }}">
                                                            <div class="media-body">
                                                                <span class="post-tag">
                                                                    <a href="#" style="color:#005689">
                                                                        {{ $blog->category->name }} </a>
                                                                </span>
                                                                <h4 class="post-title">
                                                                    <a href="#">{{ substr($blog->body,0,28) }}...</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        {{-- <div class="post-content media">
                                                            <img class="d-flex sidebar-img"
                                                                src="{{ asset('crownstar/uploads/sites/2/2018/10/business_1.jpg') }}"
                                                        alt="They’re back! Kennedy much Darli LeCras named to return">
                                                        <div class="media-body">
                                                            <span class="post-tag">
                                                                <a href="category/business/market/index.html"
                                                                    style="color:#005689">
                                                                    Market </a>
                                                            </span>
                                                            <h4 class="post-title">
                                                                <a
                                                                    href="2018/11/26/theyre-back-kennedy-much-darli-lecras-named-to-return/index.html">They’re
                                                                    back! Kennedy much...</a>
                                                            </h4>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div role="tabpanel" class="tab-pane ts-grid-box post-tab-list"
                                                    id="profile">
                                                    @foreach ($events as $event)
                                                    <div class="post-content media">
                                                        <img class="d-flex sidebar-img"
                                                            src="{{ asset('Images/'.$event->image) }}"
                                                            alt="{{ $event->name }}">
                                                        <div class="media-body">
                                                            <span class="post-tag">
                                                                <a href="#" style="color:#005689">
                                                                    {{ @$event->category->name }} </a>
                                                            </span>
                                                            <h4 class="post-title">
                                                                <a href="#">{{ substr($event->body,0,20) }}...</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-7b6cfe5 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="7b6cfe5" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">
                    <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-6c51dba"
                        data-id="6c51dba" data-element_type="column">
                        <div class="elementor-column-wrap elementor-element-populated">
                            <div class="elementor-widget-wrap">
                                <div class="elementor-element elementor-element-42ee970 elementor-widget elementor-widget-vinazine-block-title"
                                    data-id="42ee970" data-element_type="widget"
                                    data-widget_type="vinazine-block-title.default">
                                    <div class="elementor-widget-container">
                                        <div class="title-area">
                                            <div class="ts-grid-box ts-category-title">
                                                <h2 class="ts-title block-title-style6">
                                                    <span class="title-before"></span>
                                                    Entrepreneurship <span class="title-after"></span>
                                                    <div class="clearfix"></div>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <section
                                    class="elementor-section elementor-inner-section elementor-element elementor-element-e126596 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="e126596" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            @foreach ($entre as $ent)
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-de51df6"
                                                data-id="de51df6" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-0c83d37 elementor-widget elementor-widget-vinazine-post-grid"
                                                            data-id="0c83d37" data-element_type="widget"
                                                            data-widget_type="vinazine-post-grid.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="grid-item grid-sm grid-no-desc">
                                                                    <div
                                                                        class="ts-overlay-style featured-post post-1256 post type-post status-publish format-video has-post-thumbnail hentry category-market post_format-post-format-video">
                                                                        @if($ent->image != null)
                                                                        <div class="item"
                                                                            style="background-image:url({{ asset('Images/'.$ent->image) }})">
                                                                            @else
                                                                            <div class="item"
                                                                                style="background-image:url({{ asset('video_cover.jpeg') }})">
                                                                                @endif

                                                                                <div class="gradient-overlay"></div>
                                                                                <a class="img-link" href="#"></a>
                                                                                <div class="overlay-post-content">
                                                                                    <div class="post-content">
                                                                                        <a class="post-cat" href="#"
                                                                                            style="color:#ffffff; background-color:#005689; border-left-color:#005689">
                                                                                            Entrepreneurship </a>
                                                                                        <h3 class="post-title">
                                                                                            <a href="#">{{$ent->title}}
                                                                                            </a>
                                                                                        </h3>
                                                                                        <ul class="post-meta-info">
                                                                                            <li>
                                                                                                <i
                                                                                                    class="fa fa-clock-o"></i>{{$ent->created_at->format('d-m-Y')}}
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                </section>
                                <section
                                    class="elementor-section elementor-inner-section elementor-element elementor-element-fdc85d0 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="fdc85d0" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-ddce8be"
                                                data-id="ddce8be" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-0f403c3 elementor-widget elementor-widget-vinazine-post-list"
                                                            data-id="0f403c3" data-element_type="widget"
                                                            data-widget_type="vinazine-post-list.default">
                                                            <div class="elementor-widget-container">
                                                                <div
                                                                    class="ts-grid-item-2  ts-list-post-box ts-grid-content">
                                                                    <div class="item grid-sm ">
                                                                        <div class="ts-post-thumb">
                                                                            <a href="#">
                                                                                <img class="img-fluid"
                                                                                    src="wp-content/uploads/sites/2/2018/10/tech1.jpg"
                                                                                    alt="Success is not a good teacher failure makes you humble">
                                                                            </a>
                                                                        </div>
                                                                        <div class="post-content">
                                                                            <a class="post-cat"
                                                                                href="category/business/index.html"
                                                                                style="color:#ffffff; background-color:#005689; border-left-color:#005689">
                                                                                Business </a>
                                                                            <h3 class="post-title">
                                                                                <a href="#">Success
                                                                                    is not a good teacher
                                                                                    failure makes...</a>
                                                                            </h3>
                                                                            <ul class="post-meta-info">
                                                                                <li>
                                                                                    <i class="fa fa-clock-o"></i>January
                                                                                    7, 2018 </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-7e41675"
                                                data-id="7e41675" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-cee01c8 elementor-widget elementor-widget-vinazine-post-list"
                                                            data-id="cee01c8" data-element_type="widget"
                                                            data-widget_type="vinazine-post-list.default">
                                                            <div class="elementor-widget-container">
                                                                <div
                                                                    class="ts-grid-item-2  ts-list-post-box ts-grid-content">
                                                                    <div class="item grid-sm ">
                                                                        <div class="ts-post-thumb">
                                                                            <a href="#">
                                                                                <img class="img-fluid"
                                                                                    src="wp-content/uploads/sites/2/2018/10/business_3.jpg"
                                                                                    alt="Tourism booming  most Dubai is international tourist">
                                                                            </a>
                                                                        </div>
                                                                        <div class="post-content">
                                                                            <a class="post-cat" href="#"
                                                                                style="color:#ffffff; background-color:#005689; border-left-color:#005689">
                                                                                Money </a>
                                                                            <h3 class="post-title">
                                                                                <a href="#">Tourism
                                                                                    booming most Dubai is
                                                                                    international...</a>
                                                                            </h3>
                                                                            <ul class="post-meta-info">
                                                                                <li>
                                                                                    <i class="fa fa-clock-o"></i>January
                                                                                    1, 2019 </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-b196ac5"
                                                data-id="b196ac5" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-21f11f9 elementor-widget elementor-widget-vinazine-post-list"
                                                            data-id="21f11f9" data-element_type="widget"
                                                            data-widget_type="vinazine-post-list.default">
                                                            <div class="elementor-widget-container">
                                                                <div
                                                                    class="ts-grid-item-2  ts-list-post-box ts-grid-content">
                                                                    <div class="item grid-sm ">
                                                                        <div class="ts-post-thumb">
                                                                            <a href="#">
                                                                                <img class="img-fluid"
                                                                                    src="wp-content/uploads/sites/2/2018/10/business_4.jpg"
                                                                                    alt="Hurricane Florence a ride Hurricane Man">
                                                                            </a>
                                                                        </div>
                                                                        <div class="post-content">
                                                                            <a class="post-cat" href="#"
                                                                                style="color:#ffffff; background-color:#005689; border-left-color:#005689">
                                                                                Gold </a>
                                                                            <h3 class="post-title">
                                                                                <a href="#">Hurricane
                                                                                    Florence a ride Hurricane
                                                                                    Man</a>
                                                                            </h3>
                                                                            <ul class="post-meta-info">
                                                                                <li>
                                                                                    <i
                                                                                        class="fa fa-clock-o"></i>November
                                                                                    26, 2018 </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-deb6818"
                        data-id="deb6818" data-element_type="column">
                        <div class="elementor-column-wrap elementor-element-populated">
                            <div class="elementor-widget-wrap">
                                <div class="elementor-element elementor-element-3b506a9 elementor-widget elementor-widget-vinazine-post-grid"
                                    data-id="3b506a9" data-element_type="widget"
                                    data-widget_type="vinazine-post-grid.default">
                                    <div class="elementor-widget-container">
                                        <div class="grid-item grid-md grid-no-desc">
                                            <div
                                                class="ts-grid-box ts-col-box grid-only-text post-1260 post type-post status-publish format-video has-post-thumbnail hentry category-money tag-business post_format-post-format-video">
                                                <div class="item">
                                                    <a class="post-cat" href="#"
                                                        style="color:#ffffff; background-color:#005689; border-left-color:#005689">
                                                        Money </a>
                                                    <div class="post-content">
                                                        <h3 class="post-title">
                                                            <a
                                                                href="2019/01/01/tourism-in-dubai-is-booming-international-tourist-most-visited-place/index.html">Tourism
                                                                booming most Dubai is international tourist</a>
                                                        </h3>
                                                        <p>
                                                            Black farmers in the US’s South— faced with
                                                            continued failure their efforts to run successful
                                                            farms their launched a lawsuit claiming that “white
                                                            racism” is to blame for their inability to
                                                            the&hellip; </p>
                                                        <ul class="post-meta-info">
                                                            <li>
                                                                <span class="post-date-info">
                                                                    <i class="fa fa-clock-o"></i> January 1,
                                                                    2019 </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-9e30c54 elementor-hidden-tablet elementor-hidden-phone elementor-widget elementor-widget-image"
                                    data-id="9e30c54" data-element_type="widget" data-widget_type="image.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-image">
                                            {{-- <img width="255" height="343"
                                                src="wp-content/uploads/sites/2/2018/10/sidebar-banner2.jpg"
                                                class="attachment-large size-large" alt="" loading="lazy"
                                                srcset="https://demo.xpeedstudio.com/vinkmag/business/wp-content/uploads/sites/2/2018/10/sidebar-banner2.jpg 255w, https://demo.xpeedstudio.com/vinkmag/business/wp-content/uploads/sites/2/2018/10/sidebar-banner2-223x300.jpg 223w"
                                                sizes="(max-width: 255px) 100vw, 255px" /> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-0134b9b elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="0134b9b" data-element_type="section"
            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2956fc1"
                        data-id="2956fc1" data-element_type="column">
                        <div class="elementor-column-wrap elementor-element-populated">
                            <div class="elementor-widget-wrap">
                                <div class="elementor-element elementor-element-342a9c4 elementor-widget elementor-widget-vinazine-block-title"
                                    data-id="342a9c4" data-element_type="widget"
                                    data-widget_type="vinazine-block-title.default">
                                    <div class="elementor-widget-container">
                                        <div class="title-area">
                                            <h2 class="ts-title block-title-style1 float-left">
                                                <span class="title-before"></span>
                                                Watch Talents </h2>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <section
                                    class="elementor-section elementor-inner-section elementor-element elementor-element-1e5d056 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="1e5d056" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            @foreach ($talents as $talent)
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-5f05057"
                                                data-id="5f05057" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-0db4b4c elementor-widget elementor-widget-vinazine-post-grid"
                                                            data-id="0db4b4c" data-element_type="widget"
                                                            data-widget_type="vinazine-post-grid.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="grid-item grid-sm grid-no-desc">
                                                                    <div
                                                                        class="ts-overlay-style featured-post post-1263 post type-post status-publish format-video has-post-thumbnail hentry category-gold category-money category-stock tag-business post_format-post-format-video">
                                                                        <div class="item"
                                                                            style="background-image:url({{ asset('video_cover.jpeg') }})">
                                                                            <div class="gradient-overlay"></div>
                                                                            <a class="img-link" href="#"></a>
                                                                            <div class="overlay-post-content">
                                                                                <div class="post-content">
                                                                                    <a class="post-cat" href="#"
                                                                                        style="color:#ffffff; background-color:#005689; border-left-color:#005689">
                                                                                        {{ $talent->category->name }}
                                                                                    </a>
                                                                                    <h3 class="post-title">
                                                                                        <a href="#">{{ $talent->title }}
                                                                                        </a>
                                                                                    </h3>
                                                                                    <ul class="post-meta-info">
                                                                                        <li>
                                                                                            <i
                                                                                                class="fa fa-clock-o"></i>{{$talent->created_at->format('d-m-Y')}}
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <section
            class="elementor-section elementor-top-section elementor-element elementor-element-675b661 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="675b661" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6ab7744"
                        data-id="6ab7744" data-element_type="column">
                        <div class="elementor-column-wrap elementor-element-populated">
                            <div class="elementor-widget-wrap">
                                <div class="elementor-element elementor-element-2bbfb09 elementor-hidden-tablet elementor-hidden-phone elementor-widget elementor-widget-image"
                                    data-id="2bbfb09" data-element_type="widget" data-widget_type="image.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-image">
                                            <img width="970" height="120"
                                                src="wp-content/uploads/sites/2/2018/10/banner4.png"
                                                class="attachment-full size-full" alt="" loading="lazy"
                                                srcset="https://demo.xpeedstudio.com/vinkmag/business/wp-content/uploads/sites/2/2018/10/banner4.png 970w, https://demo.xpeedstudio.com/vinkmag/business/wp-content/uploads/sites/2/2018/10/banner4-300x37.png 300w, https://demo.xpeedstudio.com/vinkmag/business/wp-content/uploads/sites/2/2018/10/banner4-768x95.png 768w"
                                                sizes="(max-width: 970px) 100vw, 970px" /> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-ec997e2 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="ec997e2" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">
                    @foreach ($categories as $category)
                    <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-d862aed"
                        data-id="d862aed" data-element_type="column">
                        <div class="elementor-column-wrap elementor-element-populated">
                            <div class="elementor-widget-wrap">
                                <div class="elementor-element elementor-element-f7b1c0e elementor-widget elementor-widget-vinazine-post-list"
                                    data-id="f7b1c0e" data-element_type="widget"
                                    data-widget_type="vinazine-post-list.default">
                                    <div class="elementor-widget-container">
                                        <div class="ts-grid-item-2  ts-list-post-box ts-grid-content">
                                            <div class="item grid-sm ">
                                                <div class="ts-post-thumb">
                                                    <a href="#">
                                                        <img class="img-fluid"
                                                            src="{{ asset('Images/'.@$category->home_blogs[0]->image) }}"
                                                            alt="{{ @$category->home_blogs[0]->title }}">
                                                    </a>
                                                </div>
                                                <div class="post-content">
                                                    <a class="post-cat" href="#"
                                                        style="color:#ffffff; background-color:#005689; border-left-color:#005689">
                                                        {{ $category->name }} </a>
                                                    <h3 class="post-title">
                                                        <a href="#">{{ @$category->home_blogs[0]->title }}</a>
                                                    </h3>
                                                    <ul class="post-meta-info">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>
                                                            {{ @$category->home_blogs[0]->created_at->format('d-m-Y') }}


                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @foreach ($category->home_blogs as $blog)
                                            <div class="item">
                                                <div class="post-content">
                                                    <h4 class="post-title">
                                                        <a href="#">{{ $blog->title }}</a>
                                                    </h4>
                                                    <span>
                                                        <i class="fa fa-clock-o"></i>
                                                        {{ $blog->created_at->format('d-m-Y') }} </span>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
</div>
@endsection