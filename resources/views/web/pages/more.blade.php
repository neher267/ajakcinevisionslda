@extends('web.layouts.master')
@section('content')

<div class="blog-main-content">		
    <div class="col-md-9 total-news">

        <div class="grids">
            <div class="grid box">
                <div class="w3l_banner_nav_right_banner3_btm">
                    @foreach($all_data as $data)
                    <?php
                    $link_1 = str_random(10);
                    $solt_1 = str_random(3);
                    $solt2_1 = str_random(2);
                    ?>
                    <div class="col-md-3 w3l_banner_nav_right_banner3_btml">
                        <div class="view">
                            <img src="{{asset('public/'.$data->image)}}" style="height: 170px;" alt="" />
                            <a href="{{url('/news-details/'.$link_1.'/'.$solt_1.$data->id.$solt2_1)}}" class="title"><?php echo html_entity_decode($data->news_title) ?></a>
                            <?php echo (strlen($data->short_description) > 300) ? substr($data->short_description, 0, 300) . '..' : html_entity_decode($data->short_description) . '..' ?>
                            <a href="{{url('/news-details/'.$link_1.'/'.$solt_1.$data->id.$solt2_1)}}">Read More</a>
                        </div>
                    </div>
                    @endforeach
                    <div class="clearfix"> </div>
                </div>
            </div>
            
            <div class="gallery">
                @include('web.layouts.gallery')
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>	

    <div class="col-md-3 side-bar">
        <div class="l_g_r">
            <div style="margin-bottom: 20px;">
                @include('web.layouts.featured-movie-review') 
            </div>
            <div class="posts">
                <h4>সাম্প্রতিক খবর</h4>
                @foreach($latest_news as $news)
                <?php
                $link = str_random(10);
                $solt = str_random(3);
                $solt2 = str_random(2);
                ?>
                <h6><a href="{{url('/news-details/'.$link.'/'.$solt.$news->id.$solt2)}}">
                        <?php echo html_entity_decode($news->news_title); ?></a></h6>
                @endforeach
            </div>

            <div class="posts">
                <h4>সব থেকে বেশি পড়া</h4>
                @foreach($populer_news as $news)
                <?php
                $link1 = str_random(10);
                $solt3 = str_random(3);
                $solt4 = str_random(2);
                ?>
                <h6><a href="{{url('/news-details/'.$link1.'/'.$solt3.$news->id.$solt4)}}">
                        <?php echo html_entity_decode($news->news_title); ?></a></h6>
                @endforeach
            </div>
            @include('web.layouts.discount-add')

        </div>
    </div>
    <div class="clearfix"></div>

</div>

@endsection
