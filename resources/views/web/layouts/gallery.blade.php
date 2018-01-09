<div class="main-title-head">
    <h3>ছবি</h3>
    <a href="#">More  +</a>
    <div class="clearfix"></div>
</div>
<div class="gallery-images">
    <div class="course_demo1">
        <ul id="flexiselDemo1">	
            @foreach($gallery1 as $image)
            <li>
                <a href="#"><img src="{{asset('public/'.$image->image)}}" alt="{{$image->image_title}}" style="height: 200px;"/></a>						
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="course_demo1">
    <ul id="flexiselDemo">	
        @foreach($gallery2 as $image)
        <li>
            <a href="#"><img src="{{asset('public/'.$image->image)}}" alt="{{$image->image_title}}" style="height: 200px;"/></a>						
        </li>
        @endforeach	
    </ul>
</div>