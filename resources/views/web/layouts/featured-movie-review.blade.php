<div class="featured">
    <h3 style="width: 100%">মুভি রিভিউ </h3>

    <ul>
        @foreach($movie_reviews as $review)
        <?php
        $link = str_random(10);
        $solt = str_random(3);
        $solt2 = str_random(2);
        ?>
        <li style="height: 99px;">
            <a href="{{url('/review/'.$link.'/'.$solt.$review->id.$solt2)}}"><img style="height: 70px; margin-bottom: 3px;" src="{{asset('public/'.$review->image)}}" alt="" /></a>
            <a style=" text-decoration: none; display: inline;" href="{{url('/review/'.$link.'/'.$solt.$review->id.$solt2)}}">
                <span style="color: black;"><?php echo (strlen($review->news_title) > 30) ? substr($review->news_title, 0, 30).'..': html_entity_decode($review->news_title).'..'?></span>  
            </a>
            
        </li>
        @endforeach

        <div class="clearfix"></div>
    </ul>
</div>
<div class="clearfix"></div>