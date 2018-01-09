<h3>গান</h3>
@foreach($all_music as $music)
<?php
    $link = str_random(10);
    $solt = str_random(3);
    $solt2 = str_random(2);
    ?>
<div class="editor">
    <a href="{{url('/news-details/'.$link.'/'.$solt.$music->id.$solt2)}}"><img src="{{asset('public/'.$music->image)}}" alt="" /></a>
    <a href="{{url('/news-details/'.$link.'/'.$solt.$music->id.$solt2)}}">{{$music->news_title}}</a>
</div>
@endforeach

