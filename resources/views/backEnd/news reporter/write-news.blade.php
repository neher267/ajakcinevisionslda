@extends('backEnd.layouts.panel-home')
@section('content')
    <div class="row-fluid sortable">
        <div class="box span12">
            @if (Session::has('message_success'))
            <div class="alert alert-success" role="alert">{{Session::get('message_success')}}</div>
            @endif
            
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add News</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{url('/write-news')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="category_name">Category</label>
                            <div class="controls">
                                <select name="category_id" id="category_name" data-rel="chosen" required>
                                    <option value="">Select Category</option>
                                    @foreach($all_categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach 
                               </select>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="news_title">News Title </label>
                            <div class="controls col-md-6">
                                <input type="text" name="news_title" class="span12 typeahead" id="news_title" placeholder="">                               
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="short_description">News Short Description </label>
                            <div class="controls">
                                <textarea name="short_description" class="cleditor" id="short_description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="description">News Description </label>
                            <div class="controls">
                                <textarea name="description" class="cleditor" id="description" rows="3"></textarea>
                            </div>
                        </div>
                        

                        <div class="control-group">
                            <label class="control-label" for="image">News Image</label>
                            <div class="controls">
                                <input name="image" class="input-file uniform_on" id="image" type="file">
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label" for="image_title">Image Title </label>
                            <div class="controls col-md-6">
                                <input type="text" name="image_title" class="span12 typeahead" id="news_title" placeholder="">                               
                            </div>
                        </div>
                                   
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

@endsection
