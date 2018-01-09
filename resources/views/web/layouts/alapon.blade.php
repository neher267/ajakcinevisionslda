<div class="main-title-head">
    <h3>আলাপন</h3>
    <form method="post" action="{{url('/more')}}"  id="more">
        {{ csrf_field() }}
        
        <input type="hidden" name="category_id" value="{{$all_alapon[0]->category_id}}">
        <a href="#" onclick="document.getElementById('more').submit()"> More  +</a>
    </form>
    <div class="clearfix"></div>
</div>
<div class="world-news-grids">

    @foreach($all_alapon as $alapon)
    <?php
    $link = str_random(10);
    $solt = str_random(3);
    $solt2 = str_random(2);
    ?>
    <div class="world-news-grid" style="float: left">
        <img src="{{asset('public/'.$alapon->image)}}" style="height: 170px;" alt="" />
        <a href="{{url('/news-details/'.$link.'/'.$solt.$alapon->id.$solt2)}}" class="title"><?php echo html_entity_decode($alapon->news_title) ?></a>
        <?php echo (strlen($alapon->short_description) > 300) ? substr($alapon->short_description, 0, 300) . '...' : html_entity_decode($alapon->short_description) . '...' ?>
        <a href="{{url('/news-details/'.$link.'/'.$solt.$alapon->id.$solt2)}}">Read More</a>
    </div>
    @endforeach
    <div class="clearfix"></div>
</div>