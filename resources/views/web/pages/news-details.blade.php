@extends('web.layouts.master')
@section('content')

<div class="blog-main-content">		
    <div class="col-md-9 total-news">

        <div class="grids">
            <div class="grid box">
                <div class="grid-header">
                    <a class="gotosingle" href="#"><?php echo html_entity_decode($news->news_title); ?></a>
                    <ul>
                        <li><span>Post by<a href="#"> {{$news->first_name.' '.$news->last_name}}</a> on 
                                <?php
                                echo date('D, F j, Y', strtotime($news->updated_at));
                                ?>
                            </span></li>
                        <li><a href="#">5 comments</a></li>
                    </ul>
                </div>
                <div class="singlepage">
                    <a href="#"><img class="img-responsive" style="display: inline; width: auto; height: auto;" src="{{asset('public/'.$news->image)}}" />
                    </a>
                    <p style="color: black;"><?php echo html_entity_decode($news->image_title) ?></p>

                    <p style="float: left;"><?php echo html_entity_decode($news->description); ?></p>
                    <div class="clearfix"> </div>
                </div>
                <div class="comments">
                    <ul>
                        <li><a href="#"><img src="{{asset('public/web_resource/images/views.png')}}" title="view" /></a></li>
                        <li style="float: left;"><a href="#"><img src="{{asset('public/web_resource/images/likes.png')}}" title="likes" /></a></li>
                    </ul>
                </div>
            </div>

            <div class="clearfix"> </div>
        </div>

        <ul class="comment-list">
            <h5 class="post-author_head">Written by {{$news->first_name.' '.$news->last_name}}</h5>
            <li><img src="{{asset('public/web_resource/images/avatar.png')}}" class="img-responsive" alt="">
                <div class="desc">
                    <p>View all posts by: <a href="#" title="Posts by admin" rel="author">{{$news->first_name.' '.$news->last_name}}</a></p>
                </div>
                <div class="clearfix"></div>
            </li>
        </ul>
        <div class="content-form">
            <h3>Leave a comment</h3>
            <form>
                <input type="text" placeholder="Name" required/>
                <input type="text" placeholder="Email" required/>
                <input type="text" placeholder="Phone" required/>
                <textarea placeholder="Message"></textarea>
                <input type="submit" value="SEND"/>
            </form>
        </div>
    </div>	

    <div class="col-md-3 side-bar">
        <div class="l_g_r">
            <div style="margin-bottom: 20px;">
                @include('web.layouts.featured-movie-review') 
            </div>
            <div class="posts">
                <h4>সাম্প্রতিক খবর</h4>
                @foreach($latest_news as $news)
                <?php
                $link = str_random(10);
                $solt = str_random(3);
                $solt2 = str_random(2);
                ?>
                <h6><a href="{{url('/news-details/'.$link.'/'.$solt.$news->id.$solt2)}}">
                        <?php echo html_entity_decode($news->news_title); ?></a></h6>
                @endforeach
            </div>

            <div class="posts">
                <h4>সব থেকে বেশি পড়া</h4>
                @foreach($populer_news as $news)
                <?php
                $link1 = str_random(10);
                $solt3 = str_random(3);
                $solt4 = str_random(2);
                ?>
                <h6><a href="{{url('/news-details/'.$link1.'/'.$solt3.$news->id.$solt4)}}">
                        <?php echo html_entity_decode($news->news_title); ?></a></h6>
                @endforeach
            </div>
            @include('web.layouts.discount-add')

        </div>
    </div>
    <div class="clearfix"></div>

</div>

@endsection
