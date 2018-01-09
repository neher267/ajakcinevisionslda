
<div class="conference-slider">
    <ul class="conference-rslide" id="conference-slider">
        @foreach($trailers as $trailer)
        <li>
            <img class="col-md-3" src="{{asset('public/'.$trailer->trailer_image)}}" style="width: 100%; height: 350px;" alt="">
            <div class="breaking-news-title">
                <a target="_blank" href="{{$trailer->video_url}}">{{$trailer->title}}</a>
            </div>
        </li>

        @endforeach
    </ul>
    <ul id="slider3-pager">
        @foreach($trailers as $trailer)
        <li><a href="#"><img src="{{asset('public/'.$trailer->trailer_image)}}" style="width: 100%; max-height: 72px;" alt=""></a></li>
        @endforeach
    </ul>

</div> 