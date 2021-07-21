<?php $categories = App\Models\Category::where('is_active', true)->get(); ?>
<header id="ekit-header">
    <div data-elementor-type="wp-post" data-elementor-id="4181" class="elementor elementor-4181"
        data-elementor-settings="[]">
        <div class="elementor-inner">
            <div class="elementor-section-wrap">
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-03b9815 top-bar bg-blue-dark elementor-hidden-phone elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="03b9815" data-element_type="section"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-868ffae"
                                data-id="868ffae" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-d867896 elementor-widget elementor-widget-vinazine-date"
                                            data-id="d867896" data-element_type="widget"
                                            data-widget_type="vinazine-date.default">
                                            <div class="elementor-widget-container">
                                                <div class="vinkmag-date">
                                                    <div class="ts-date-item">
                                                        <i class="fa fa-clock-o"></i>
                                                        <?php echo date('d-m-Y'); ?> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-477b0a8 text-right"
                                data-id="477b0a8" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-8aed12d ts-top-nav elementor-widget elementor-widget-wp-widget-nav_menu"
                                            data-id="8aed12d" data-element_type="widget"
                                            data-widget_type="wp-widget-nav_menu.default">
                                            <div class="elementor-widget-container">
                                                <div class="menu-top-menu-container">
                                                    <ul id="menu-top-menu" class="menu">
                                                        <li id="menu-item-4183"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-1242 current_page_item menu-item-4183">
                                                            <a href="{{ route('landing') }}"
                                                                aria-current="page">Home</a></li>
                                                        <li id="menu-item-4184"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4184">
                                                            <a href="{{ route('login') }}">Login</a></li>
                                                        <li id="menu-item-4185"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4185">
                                                            <a href="{{ route('register') }}">Register</a>
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
                </section>
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-8cf8de9 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="8cf8de9" data-element_type="section"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-e982870"
                                data-id="e982870" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-58a589d elementor-widget elementor-widget-vinazine-logo"
                                            data-id="58a589d" data-element_type="widget"
                                            data-widget_type="vinazine-logo.default">
                                            <div class="elementor-widget-container">
                                                <div class="vinkmag-widget-logo">
                                                    <a href="index.html">
<img src="{{ asset('logo/logo.png') }}" alt="CrownStars" styl="height: 30px;">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-2b6a657"
                                data-id="2b6a657" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-cf11db7 elementor-hidden-tablet elementor-hidden-phone elementor-widget elementor-widget-image"
                                            data-id="cf11db7" data-element_type="widget"
                                            data-widget_type="image.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-image">
                                                    {{-- <img width="730" height="90"
                                                        src="wp-content/uploads/sites/2/2018/10/banner3.jpg"
                                                        class="attachment-large size-large" alt="" loading="lazy"
                                                        srcset="https://demo.xpeedstudio.com/vinkmag/business/wp-content/uploads/sites/2/2018/10/banner3.jpg 730w, https://demo.xpeedstudio.com/vinkmag/business/wp-content/uploads/sites/2/2018/10/banner3-300x37.jpg 300w"
                                                        sizes="(max-width: 730px) 100vw, 730px" /> --}}
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
                    class="elementor-section elementor-top-section elementor-element elementor-element-d623670 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="d623670" data-element_type="section"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-dc15995"
                                data-id="dc15995" data-element_type="column"
                                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <section
                                            class="elementor-section elementor-inner-section elementor-element elementor-element-b5bbb81 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                            data-id="b5bbb81" data-element_type="section">
                                            <div class="elementor-container elementor-column-gap-default">
                                                <div class="elementor-row">
                                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-319c11b"
                                                        data-id="319c11b" data-element_type="column">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-element-3af7c7c elementor-widget elementor-widget-ekit-nav-menu"
                                                                    data-id="3af7c7c" data-element_type="widget"
                                                                    data-widget_type="ekit-nav-menu.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div id="ekit-megamenu-main-menu"
                                                                            class="ekit-menu-container ekit-menu-po-left">
                                                                            <ul id="main-menu"
                                                                                class="ekit-menu ekit-menu-simple ekit-menu-init">
                                                                                <li id="menu-item-4200"
                                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-1242 current_page_item menu-item-4200 nav-item active">
                                                                                    <a href="{{ route('landing') }}"
                                                                                        class="ekit-menu-nav-link active">Home</a>
                                                                                </li>
                                                                                @foreach ($categories as $category)
                                                                                <li id="menu-item-4097"
                                                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4097 nav-item">
<a href="/{{ strtolower($category->name) }}" class="ekit-menu-nav-link">{{ $category->name }}</a>
                                                                                </li>
                                                                                @endforeach
                                                                                <li id="menu-item-4097"
                                                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4097 nav-item">
                                                                                    <a href="{{ route('login') }}"
                                                                                        class="ekit-menu-nav-link">Login</a>
                                                                                </li>
                                                                                {{-- <li id="menu-item-4099"
                                                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4099 nav-item">
                                                                                    <a href="category/business/money/index.html"
                                                                                        class="ekit-menu-nav-link">Money</a>
                                                                                </li> --}}
                                                                                {{-- <li id="menu-item-4026"
                                                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4026 nav-item ekit-menu-dropdown">
                                                                                    <a href="#"
                                                                                        class="ekit-menu-nav-link ekit-menu-dropdown-toggle">Features</a>
                                                                                    <ul class="ekit-has-submenu">
                                                                                        <li id="menu-item-2913"
                                                                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2913 nav-item ekit-menu-dropdown">
                                                                                            <a href="#"
                                                                                                class=" dropdown-item">Category
                                                                                                Layout</a>
                                                                                            <ul
                                                                                                class="ekit-has-submenu">
                                                                                                <li id="menu-item-4189"
                                                                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4189 nav-item">
                                                                                                    <a href="category/business/market/index.html"
                                                                                                        class=" dropdown-item">Category
                                                                                                        Style 1</a>
                                                                                                <li id="menu-item-4190"
                                                                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4190 nav-item">
                                                                                                    <a href="category/business/money/index.html"
                                                                                                        class=" dropdown-item">Category
                                                                                                        Style 2</a>
                                                                                            </ul>
                                                                                        <li id="menu-item-2922"
                                                                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2922 nav-item ekit-menu-dropdown">
                                                                                            <a href="#"
                                                                                                class=" dropdown-item">Post
                                                                                                Formats</a>
                                                                                            <ul
                                                                                                class="ekit-has-submenu">
                                                                                                <li id="menu-item-4192"
                                                                                                    class="menu-item menu-item-type-post_type menu-item-object-post menu-item-4192 nav-item">
                                                                                                    <a href="2018/11/26/theyre-back-kennedy-much-darli-lecras-named-to-return/index.html"
                                                                                                        class=" dropdown-item">Post
                                                                                                        Style 1</a>
                                                                                                <li id="menu-item-4193"
                                                                                                    class="menu-item menu-item-type-post_type menu-item-object-post menu-item-4193 nav-item">
                                                                                                    <a href="2018/03/07/surfing-muizenberg-beach-around-cape-town/index.html"
                                                                                                        class=" dropdown-item">Post
                                                                                                        Style 2</a>
                                                                                            </ul>
                                                                                        <li id="menu-item-4043"
                                                                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4043 nav-item ekit-menu-dropdown">
                                                                                            <a href="#"
                                                                                                class=" dropdown-item">Pages</a>
                                                                                            <ul
                                                                                                class="ekit-has-submenu">
                                                                                                <li id="menu-item-3904"
                                                                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3904 nav-item">
                                                                                                    <a href="author/vinkmag/index.html"
                                                                                                        class=" dropdown-item">Author</a>
                                                                                                <li id="menu-item-2974"
                                                                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2974 nav-item">
                                                                                                    <a href="error-page.html"
                                                                                                        class=" dropdown-item">404</a>
                                                                                            </ul>
                                                                                    </ul>
                                                                                </li> --}}
</ul>
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
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</header>