<div class="main-title-head">
    <h5>সব থেকে বেশি</h5> 
    <h4> পড়া</h4>
    <div class="clearfix"></div>
</div>		
<div class="popular-news">
    @foreach($populer_news as $news)
    <div class="popular-grid">
        <i>
            <?php
            echo date('D, F j, Y', strtotime($news->updated_at));
            ?>
        </i>
        <p>
            <?php
            echo html_entity_decode($news->news_title);
            $link = str_random(10);
            $solt = str_random(3);
            $solt2 = str_random(2);
            ?>
            <a href="{{url('/news-details/'.$link.'/'.$solt.$news->id.$solt2)}}">Read More</a>
        </p>
    </div>
    @endforeach
</div>