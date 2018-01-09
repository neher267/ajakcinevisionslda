<div class="main-title-head">
    <h3>বিভিদ</h3>
    <form method="post" action="{{url('/more')}}"  id="more1">
        {{ csrf_field() }}
        
        <input type="hidden" name="category_id" value="{{$bivido[0]->category_id}}">
        <a href="#" onclick="document.getElementById('more1').submit()"> More  +</a>
    </form>
    <div class="clearfix"></div>
</div>	
<div class="tech-news-grids">
    <?php
    $size = sizeof($bivido); 
    $link = str_random(10);
    $solt = str_random(3);
    $solt2 = str_random(2);
    ?>
    <div class="left-tech-news">
        @if($size>0)
        <div class="tech-news-grid span_66">
            <a href="{{url('/news-details/'.$link.'/'.$solt.$bivido[0]->id.$solt2)}}" class="title"><?php echo html_entity_decode($bivido[0]->news_title) ?></a>
            <p>
                <?php echo (strlen($bivido[0]->short_description) > 250) ? substr($bivido[0]->short_description, 0, 250) . '...' : html_entity_decode($bivido[0]->short_description) . '...' ?>
            </p>
            <p>by<a href="#">John Doe </a>  |  29 comments</p>
        </div>
        @endif
        @if($size>=3)
        <div class="tech-news-grid">
            <a href="{{url('/news-details/'.$link.'/'.$solt.$bivido[2]->id.$solt2)}}" class="title"><?php echo html_entity_decode($bivido[2]->news_title) ?></a>
            <p>
                <?php echo (strlen($bivido[2]->short_description) > 300) ? substr($bivido[2]->short_description, 0, 300) . '...' : html_entity_decode($bivido[2]->short_description) . '...' ?>
            </p>
            <p>by<a href="#">John Doe </a>  |  29 comments</p>
        </div>
        @endif
    </div>
    <div class="right-tech-news">
        @if($size>=2)
        <div class="tech-news-grid span_66">
            <a href="{{url('/news-details/'.$link.'/'.$solt.$bivido[1]->id.$solt2)}}" class="title"><?php echo html_entity_decode($bivido[1]->news_title) ?></a>
            <p>
                <?php echo (strlen($bivido[1]->short_description) > 300) ? substr($bivido[1]->short_description, 0, 300) . '...' : html_entity_decode($bivido[1]->short_description) . '...' ?>
            </p>
            <p>by<a href="#">John Doe </a>  |  29 comments</p>
        </div>
        @endif
        @if($size>3)
        <div class="tech-news-grid">
            <a href="{{url('/news-details/'.$link.'/'.$solt.$bivido[3]->id.$solt2)}}" class="title"><?php echo html_entity_decode($bivido[3]->news_title) ?></a>
            <p>
                <?php echo (strlen($bivido[3]->short_description) > 300) ? substr($bivido[3]->short_description, 0, 300) . '...' : html_entity_decode($bivido[3]->short_description) . '...' ?>
            </p>
            <p>by<a href="#">John Doe </a>  |  29 comments</p>
        </div>
        @endif
    </div>
    <div class="clearfix"></div>
</div>