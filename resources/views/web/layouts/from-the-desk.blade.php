<h3>শুটিং চলছে</h3>

@foreach($shutting_chochce as $data)
<?php
$link = str_random(10);
$solt = str_random(3);
$solt2 = str_random(2);
?>
<div class="desk">
    <a href="{{url('/news-details/'.$link.'/'.$solt.$data->id.$solt2)}}" class="title">
        <a href="{{url('/news-details/'.$link.'/'.$solt.$data->id.$solt2)}}" class="title"><?php echo html_entity_decode($data->news_title) ?></a>
    </a>
    <p>
        <?php echo (strlen($data->short_description) > 300) ? substr($data->short_description, 0, 300) . '...' : html_entity_decode($data->short_description) . '...' ?>
    </p>
    <p><a href="{{url('/news-details/'.$link.'/'.$solt.$data->id.$solt2)}}">Read More</a><span>3 hours ago</span></p>
</div>
@endforeach

<a class="more" href="#">More  +</a>