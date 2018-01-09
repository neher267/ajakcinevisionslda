@extends('web.layouts.master')
@section('content')
<div class="col-md-9 total-news">
    <div class="slider" style="background-color: #e4e4e4; padding: 0px;">
        @include('web.layouts.slider')
    </div>	
    <div class="posts">
        <div class="left-posts">

            <div class="world-news">
                @include('web.layouts.alapon')
            </div>
            <div class="latest-articles">
                @include('web.layouts.latest-article')
            </div>
            <div class="gallery">
                @include('web.layouts.gallery')
            </div>
            <div class="tech-news">
                @include('web.layouts.tech-news')
            </div>
        </div>
        <div class="right-posts">
            <div class="desk-grid">
                @include('web.layouts.from-the-desk')
            </div>
            <div class="editorial">
                @include('web.layouts.editorial')
            </div>
        </div>
        <div class="clearfix"></div>	
    </div>
</div>	
<div class="col-md-3 side-bar">
    <div class="videos">
        @foreach($trailers as $trailer)
        <div class="video-grid">
            <div class="video" >
                <img src="{{asset('public/'.$trailer->trailer_image)}}">
                <a target="_blank" href="<?php echo $trailer->video_url ?>"><i class="play"></i></a>
            </div>
            <div class="video-name">
                <a target="_blank" href="{{$trailer->video_url}}">{{$trailer->title}}</a>
            </div>
            <div class="clearfix"></div>
        </div>
        @endforeach
        <a class="more1" href="#">More  +</a>
        <div class="clearfix"></div>
    </div>

    <div class="popular" style="margin: 2em 0">
        @include('web.layouts.popular-news')
    </div>
    @include('web.layouts.featured-movie-review')
    @include('web.layouts.discount-add')
</div>
@endsection 
