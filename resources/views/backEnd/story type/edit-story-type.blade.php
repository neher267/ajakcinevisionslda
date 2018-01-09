@extends('admin.layout.admin_dashboard')

@section('content')
<div class="row-fluid sortable">
    <div class="box span12">

        @if (Session::has('message_delete'))
        <div class="alert alert-danger" role="alert">{{Session::get('message_delete')}}</div>
        @endif
        @if (Session::has('message_success'))
        <div class="alert alert-success" role="alert">{{Session::get('message_success')}}</div>
        @endif

        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Food</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{url('/admin/food/update/'.$food->f_id)}}" method="post" name="update_food" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="f_name">Food Name </label>
                            <div class="controls">
                                <input type="text" name="f_name" class="span6 typeahead" value="{{$food->f_name}}" id="f_name" placeholder="">                               
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="category_name">Food Category Select</label>
                            <div class="controls">
                                <select name="category_name" id="id_category_name" data-rel="chosen">
                                    <option value="">--------Select Catrgory-------</option>
                                    <option value="Bangla">Bangla</option>
                                    <option value="India">India</option>
                                    <option value="Traditional">Traditional</option>
                                    <option value="Tribal">Tribal</option>
                                    <option value="Drinks">Drinks</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="f_image">Food Image</label>
                            <div class="controls">
                                <input name="f_image" src="{{url($food->f_image)}}" class="input-file uniform_on" id="f_image" type="file">
                            </div>
                        </div>          
                         <div class="control-group">
                            <label class="control-label" for="f_price">Food Price</label>
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <span class="add-on">TK</span><input name="f_price" id="f_price" value="{{$food->f_price}}" size="16" type="number"><span class="add-on">.00</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="description">Food Description </label>
                            <div class="controls">
                                <textarea name="description" class="cleditor" id="description" rows="3">{{$food->description}}</textarea>
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
    document.forms['update_food'].elements['id_category_name'].value="<?php echo $food->category_name; ?>";
</script>

@endsection
