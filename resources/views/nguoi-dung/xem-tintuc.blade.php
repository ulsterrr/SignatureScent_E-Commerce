@extends('layouts.webpage.webpage')
@section('title', 'Tài khoản')
@section('main-content')
<div id="content" class="blog-wrapper blog-single page-wrapper">
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
            <article id="post-76" class="post-76 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc">
                <div class="article-inner has-shadow box-shadow-1 box-shadow-2-hover">
                    <header class="entry-header">
                        <div class="entry-header-text entry-header-text-top text-left">
                            <h6 class="entry-category is-xsmall">
                                <a href="{{route('tintuc-view')}}" rel="category tag">Tin tức</a>
                            </h6>
                            <h1 class="entry-title">{{$tintuc->TieuDe}}</h1>
                            <div class="entry-divider is-divider small"></div>
                        </div>
                        <!-- .entry-header -->
                        <div class="entry-image relative">
                            <a href="">
                                <img width="800" height="590"  src="{{ asset('assets/images/tin_tuc/'. $tintuc->Anh1) }}"  /></a>
                        </div>
                        <!-- .entry-image -->
                    </header>
                    <!-- post-header -->
                    <div class="entry-content single-page">
                        <p>{!! nl2br($tintuc->PhuDe) !!}</p>
                        <p><img class="aligncenter wp-image-111 size-full" src="{{ asset('assets/images/tin_tuc/'. $tintuc->Anh2) }}" alt="" width="1200" height="630" /></p>
                        <p>{!! nl2br($tintuc->NoiDung) !!}</p>
                        <p><img class="aligncenter wp-image-62 size-large" src="{{ asset('assets/images/tin_tuc/'. $tintuc->Anh3) }}" alt="" width="1020" height="536" /></p>
                    </div>
                </div>
                <!-- .article-inner -->
            </article>
            <!-- #-76 -->
            <div id="comments" class="comments-area">
                <div id="respond" class="comment-respond">
                    <h3 id="reply-title" class="comment-reply-title">Trả lời <small><a rel="nofollow" id="cancel-comment-reply-link" href="/vanibeauty/lorem-ipsum-la-van-ban-gia/#respond" style="display:none;">Hủy</a></small></h3>
                    <form action="http://mauweb.monamedia.net/vanibeauty/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate>
                        <p class="comment-notes"><span id="email-notes">Email của bạn sẽ không được hiển thị công khai.</span> Các trường bắt buộc được đánh dấu <span class="required">*</span></p>
                        <p class="comment-form-comment"><label for="comment">Bình luận</label> <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p>
                        <p class="comment-form-author"><label for="author">Tên <span class="required">*</span></label> <input id="author" name="author" type="text" value="" size="30" maxlength="245" required='required' /></p>
                        <p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required='required' /></p>
                        <p class="comment-form-url"><label for="url">Trang web</label> <input id="url" name="url" type="url" value="" size="30" maxlength="200" /></p>
                        <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Phản hồi" /> <input type='hidden' name='comment_post_ID' value='76' id='comment_post_ID' />
                            <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                        </p>
                    </form>
                </div>
                <!-- #respond -->
            </div>
            <!-- #comments -->
        </div>

        <!-- .large-9 -->
    </div>
    <!-- .row -->
</div>
@endsection
