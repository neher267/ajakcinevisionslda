@extends('web.layouts.master')
@section('content')

<div class="col-md-9 total-news">
    <div class="slider">
        @include('web.layouts.slider')
    </div>	
    <div class="posts">
        <div class="mright-posts">
            <div class="desk-grid">
                @include('web.layouts.from-the-desk')
            </div>
            <div class="editorial">
                @include('web.layouts.editorial')
            </div>
        </div>
        <div class="mleft-posts">
            <div class="mlatest-articles">
                @include('web.layouts.latest-article')
            </div>
            <div class="world-news">
                @include('web.layouts.alapon')
            </div>
            <div class="gallery">
                @include('web.layouts.gallery')
            </div>
            <div class="tech-news">
                @include('web.layouts.tech-news')
            </div>
        </div>
        <div class="clearfix"></div>	
    </div>
</div>	
<div class="col-md-3 side-bar">
    <div class="might">
        <h4 style="width: 100%">পছন্দের</h4>
        @foreach($popular_movies as $movie)
        <div class="might-grid">
            <div class="grid-might">
                <a href="#"><img src="{{asset('public/'.$movie->trailer_image)}}" class="img-responsive" alt=""> </a>
            </div>
            <div class="might-top">
                <a target="_blank" href="{{$movie->video_url}}">{{$movie->title}}<i> </i></a>
                <p>
                    <?php echo (strlen($movie->summary_of_story) > 50) ? substr($movie->summary_of_story, 0, 50) : html_entity_decode($movie->summary_of_story)?>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
        @endforeach
    </div>
    <div class="popular mpopular">
        @include('web.layouts.popular-news')
    </div>
    @include('web.layouts.featured-movie-review')
    <div class="subscribe-now">
        <div class="discount">
            <a href="#">
                <div class="save">
                    <p>Save</p>
                    <p>upto</p>
                </div>
                <div class="percent">
                    <h2>50%</h2>
                </div>
                <div class="clearfix"></div>
        </div>						
        <h3 class="sn">subscribe now</h3>
        </a>
    </div>
</div>	
<div class="clearfix"></div>
@endsection 