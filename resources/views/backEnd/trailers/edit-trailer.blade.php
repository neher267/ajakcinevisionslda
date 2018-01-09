@extends('backEnd.layouts.panel-home')
@section('content')
    <div class="row-fluid sortable">
        <div class="box span12">
            @if (Session::has('message_success'))
            <div class="alert alert-success" role="alert">{{Session::get('message_success')}}</div>
            @endif
            
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Trailer</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{url('/edit-trailer')}}" method="post" enctype="multipart/form-data" name="update_trailar">
                    {!! csrf_field() !!}
                    <fieldset>
                        
                        <div class="control-group">
                            <label class="control-label" for="title">Trailer Title </label>
                            <div class="controls col-md-6">
                                <input type="text" name="title" class="span7 typeahead" id="title" value="{{$trailer->title}}" required>                               
                                <input type="hidden" name="id" value="{{$trailer->id}}">                               
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="category_name">Category</label>
                            <div class="controls">
                                <select name="category_id" id="category_name" data-rel="chosen" style="width: 185px;"  required>
                                    <option value="">Select Category</option>
                                    @foreach($all_categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach 
                               </select>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="story_type_id">Story Type</label>
                            <div class="controls">
                                <select name="story_type_id" id="story_type_id" data-rel="chosen" style="width: 185px;"  required>
                                    <option value="">Select Type</option>
                                    @foreach($story_types as $type)
                                    <option value="{{$type->id}}">{{$type->story_type_name}}</option>
                                    @endforeach 
                               </select>
                            </div>
                        </div>
                        
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="summary_of_story">Summary of the story </label>
                            <div class="controls">
                                <textarea name="summary_of_story" class="cleditor" id="summary_of_story" rows="3">{{$trailer->summary_of_story}}</textarea>
                            </div>
                        </div>
                        
                        
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="cast">Cast</label>
                            <div class="controls">
                                <textarea name="cast" class="span7" id="cast" rows="3" required>{{$trailer->cast}}</textarea>
                            </div>
                        </div>
                        
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="shooting_location">Shooting Location</label>
                            <div class="controls">
                                <textarea name="shooting_location" class="span7" id="cast" rows="3">{{$trailer->shooting_location}}</textarea>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="script_writer">Script Writer</label>
                            <div class="controls col-md-6">
                                <input type="text" name="script_writer" class="span7 typeahead" id="script_writer" value="{{$trailer->script_writer}}" required>                               
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="producer_name">Producer Name</label>
                            <div class="controls col-md-6">
                                <input type="text" name="producer_name" class="span7 typeahead" id="producer_name"  value="{{$trailer->producer_name}}" required>                               
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="director_name">Director Name</label>
                            <div class="controls col-md-6">
                                <input type="text" name="director_name" class="span7 typeahead" id="director_name" value="{{$trailer->director_name}}" required>                               
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="released_on">Released on</label>
                            <div class="controls col-md-6">
                                <input type="text" name="released_on" class="span7 typeahead" value="{{$trailer->released_on}}" id="released_on">                               
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="released_no_of_hall">Released No of hall</label>
                            <div class="controls col-md-6">
                                <input type="text" name="released_no_of_hall" class="span7 typeahead" id="released_no_of_hall" value="{{$trailer->released_no_of_hall}}">                               
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="telecast_chanel">Telecast chanel</label>
                            <div class="controls col-md-6">
                                <input type="text" name="telecast_chanel" class="span7 typeahead" id="telecast_chanel" value="{{$trailer->telecast_chanel}}">                               
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="on_air_time">On air time</label>
                            <div class="controls col-md-6">
                                <input type="text" name="on_air_time" class="span7 typeahead" id="on_air_time" value="{{$trailer->on_air_time}}">                               
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="video_url">video url</label>
                            <div class="controls col-md-6">
                                <input type="text" name="video_url" class="span7 typeahead" id="video_url"  required value="{{$trailer->video_url}}">                               
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="trailer_image">Trailer Image</label>
                            <span class="input-addon-group">
                                <img style="height: 100px; width: 100px" src="{{asset('public/'.$trailer->trailer_image)}}">
                            </span>
                            <div class="controls">
                                <input name="trailer_image" class="input-file uniform_on" id="trailer_image" type="file">
                            </div>
                        </div> 
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->
    
    <script type="text/javascript">
    document.forms['update_trailar'].elements['category_id'].value="<?php echo $trailer->category_id; ?>";
    document.forms['update_trailar'].elements['story_type_id'].value="<?php echo $trailer->story_type_id; ?>";
    
</script>

@endsection
