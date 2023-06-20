@extends('layouts.webpage.webpage')
@section('title', 'Tin tức')
@section('main-content')
<div id="content" class="blog-wrapper blog-archive page-wrapper">
    <header class="archive-page-header">
        <div class="row">
            <div class="large-12 text-center col">
                <h1 class="page-title is-large uppercase">
                    <span>Tin tức</span>
                </h1>
            </div>
        </div>
    </header>
    <!-- .page-header -->
    <div class="row row-large row-divided ">
        <div class="post-sidebar large-3 col">
            <div id="secondary" class="widget-area " role="complementary">
                <aside id="search-2" class="widget widget_search">
                    <form method="get" class="searchform" action="http://mauweb.monamedia.net/vanibeauty/" role="search">
                        <div class="flex-row relative">
                            <div class="flex-col flex-grow">
                                <input type="search" class="search-field mb-0" name="s" value="" id="s" placeholder="Tìm kiếm&hellip;" />
                            </div>
                            <!-- .flex-col -->
                            <div class="flex-col">
                                <button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
                                    <i class="icon-search"></i> </button>
                            </div>
                            <!-- .flex-col -->
                        </div>
                        <!-- .flex-row -->
                        <div class="live-search-results text-left z-top"></div>
                    </form>
                </aside>

                <aside id="flatsome_recent_posts-4" class="widget flatsome_recent_posts"> <span class="widget-title "><span>Bài viết mới</span></span>
                    <div class="is-divider small"></div>
                    <ul>
                        @foreach ($tt as $data )
                        <li class="recent-blog-posts-li">
                            <div class="flex-row recent-blog-posts align-top pt-half pb-half">
                                <div class="flex-col flex-grow">
                                    <a href='{{route('xemtintuc-view',['id'=>$data->id])}}' >{{$data->TieuDe}}</a>
                                    <span class="post_comments op-7 block is-xsmall"><a href="http://mauweb.monamedia.net/vanibeauty/lorem-ipsum-la-van-ban-gia/#respond"></a></span>
                                </div>
                            </div>
                            <!-- .flex-row -->
                        </li>
                        @endforeach
                    </ul>
                </aside>

            </div>
            <!-- #secondary -->
        </div>
        <!-- .post-sidebar -->

        <div class="large-9 col medium-col-first">
            <div id="row-772685900" class="row large-columns-3 medium-columns- small-columns-1 has-shadow row-box-shadow-1 row-box-shadow-2-hover row-masonry" data-packery-options='{"itemSelector": ".col", "gutter": 0, "presentageWidth" : true}'>
                @foreach ($tt as $data )
                <div class="col post-item">
                    <div class="col-inner">
                        <a href='{{route('xemtintuc-view',['id'=>$data->id])}}' class="plain">
                            <div class="box box-text-bottom box-blog-post has-hover">
                                <div class="box-image">
                                    <div class="image-cover" style="padding-top:56%;">
                                        <img width="300" height="203" src="{{ asset('assets/images/tin_tuc/'. $data->Anh1)}}"  />
                                    </div>
                                </div>
                                <!-- .box-image -->
                                <div class="box-text text-left">
                                    <div class="box-text-inner blog-post-inner">
                                        <h5 class="post-title is-large ">{{$data->TieuDe}}</h5>
                                        <div class="is-divider"></div>
                                        <p class="from_the_blog_excerpt ">{{$data->PhuDe}}</p>
                                    </div>
                                    <!-- .box-text-inner -->
                                </div>
                                <!-- .box-text -->
                            </div>
                            <!-- .box -->
                        </a>
                        <!-- .link -->
                    </div>

                    <!-- .col-inner -->
                </div>
                @endforeach
            </div>

        </div>
        <!-- .large-9 -->
    </div>
    <!-- .row -->
</div>
@endsection
