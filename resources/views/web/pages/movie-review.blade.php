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
                @foreach($visitor_reviews as $review)
                <div style="width: 100%; margin-top: 10px;">
                    <h4>Review by Neher {{$review->review_by}} </h4><p><?php
                                echo date('D, F j, Y', strtotime($news->created_at));
                                ?></p>
                    <p style="  color: black;"><?php echo html_entity_decode($review->review); ?></p>
                    <hr/>
                    <a href="#" style="text-decoration: none"><i style="margin: 0px 5px;" class="fa fa-thumbs-o-up" aria-hidden="true"></i>Like</a>
                </div>
                @endforeach
            </div>

            <div class="clearfix"> </div>
        </div>

        <div class="content-form">
            @if(!Sentinel::check())
            <h3>Leave your review please sine in your account</h3>

            <form action="{{url('/login')}}" method="POST">
                {{ csrf_field() }}
                
                @if(Session('error'))
                <div class="alert alert-danger">
                    {{ Session('error') }}
                </div>
                @endif 
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="example@example.com" required style="width: 40%">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password" required style="width: 40%">
                    </div>
                </div>
                <div class="action_btns">
                    <input type="submit" value="Login" class="btn btn-success" style="color: #fff; font-weight: 600; ">
                </div>
            </form>
            @else 
            <h3>Leave your review</h3>

            <form action="{{url('/add-review')}}" method="POST">
                {{ csrf_field() }}
                
                @if(Session('success'))
                <div class="alert alert-danger">
                    {{ Session('success') }}
                </div>
                @endif 
                 <div class="form-group">
                     <textarea class="form-control" name="review" required></textarea>
                     <input type="hidden" name="news_id" value="{{$news->id}}">
                </div>
                <div class="action_btns">
                    <input type="submit" value="Send" class="btn btn-success" style="color: #fff; font-weight: 600; ">
                </div>
            </form>
            @endif
            
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
