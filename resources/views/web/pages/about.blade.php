@extends('web.layouts.master')
@section('content')
<link href="{{asset('public/web_resource/css/customize.css')}}" rel="stylesheet" type="text/css" media="all" />
<div class="about-section">
    <div class="about-us">
        <div class="col-md-7 about-left">
            <h3>A FEW WORDS ABOUT US</h3>
            <div class="abt_image">
                <img src="images/abt_pic.jpg" alt="" />
            </div>
            <h5>Lorem ipsum eos accusamu dolore massa lore fugharum quidemed rerum faciliseme iusto ssimos ducimus.</h5>
            <p>Ses praesentiumvoluptatum delenitimos atqcorrupti quos dolores et quas molestias exceuri occaecati cupiditate non prdent imilique.</p>
            <p>Sunt in culpaqui officia mos deserunt mollitia animid est laborum dolorum fuharumos.Ses praesentiumvoluptatum delenitimos atqcorrupti quos dolores et quas molestias exceuri occaecati cupiditate non prdent imiliqueunt in culpaqui officia mos deserunt mollitia animid est laborum dolorum fuharumosiemen quidemed. Rerumol facilisest et expedita distinc.</p>
            <p>Nam libero temprecum soluta nobis est eligendi optio cumquenihil perspic iatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit.</p>
        </div>
        <div class="col-md-5 about-right">
            <h3>WHAT WE OFFER</h3>
            <div class="offer">
                <h4>1</h4>
                <a href="#">LOREM IPSUM DOLOR SIT CONSECTETUER</a>
                <div class="clearfix"></div>
                <p>Ut enim ad minim veniam, quis nostrud exercitat ion ullamcode laboris nisi dolore massa ealiquipx eato commodo consectetuor massa perspiciatis unde omnis iste natus error sit.</p>
            </div>
            <div class="offer">
                <h4>2</h4>
                <a href="#">PRAESENT VESTIBULUM MOLESTIE LACUS</a>
                <div class="clearfix"></div>
                <p>Ut enim ad minim veniam, quis nostrud exercitat ion ullamcode laboris nisi dolore massa ealiquipx eato commodo consectetuor massa perspiciatis unde omnis iste natus error sit.</p>
            </div>
            <div class="offer">
                <h4>3</h4>
                <a href="#">SED UT PERSPICIATIS UNDE OMNIS ISTE</a>
                <div class="clearfix"></div>
                <p>Ut enim ad minim veniam, quis nostrud exercitat ion ullamcode laboris nisi dolore massa ealiquipx eato commodo consectetuor massa perspiciatis unde omnis iste natus error sit.</p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="team">
<!--        <h3>OUR TEAM</h3>-->
        @include('web.layouts.gallery')
    </div>
    @endsection 
