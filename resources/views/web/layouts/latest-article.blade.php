<div class="main-title-head">
    <h3>সাম্প্রতিক খবর</h3>
    <a href="#">More  +</a>
    <div class="clearfix"></div>
</div>

<div class="world-news-grids">
    @foreach($latest_news as $news)
    <?php
    $link = str_random(10);
    $solt = str_random(3);
    $solt2 = str_random(2);
    ?>
    <div class="world-news-grid">
        <img src="{{asset('public/'.$news->image)}}" style="height: 170px;" alt="" />
        <a href="{{url('/news-details/'.$link.'/'.$solt.$news->id.$solt2)}}" class="title"><?php echo html_entity_decode($news->news_title) ?></a>
        <?php echo (strlen($news->short_description) > 400) ? substr($news->short_description, 0, 400) . '...' : html_entity_decode($news->short_description) . '...' ?>
        <a href="{{url('/news-details/'.$link.'/'.$solt.$news->id.$solt2)}}">Read More</a>
    </div>

    @endforeach
    <div class="clearfix"></div>
</div>
